<?php
// CONEXIN A BASE DE DATOS 
require_once("../../../database/connection.php");
$database = new Database();
$connection = $database->conectar();
date_default_timezone_set('America/Bogota');

// REGISTRO DE DOCUMENTOS
if (isset($_POST["MM_registerDocument"]) && $_POST["MM_registerDocument"] == "formRegisterDocument") {
    // ASIGNACION VALORES DE DATOS
    $idProceso = $_POST['idProceso'];
    $idProcedimiento = $_POST['idProcedimiento'];
    $idResponsable = $_POST['idResponsable'];
    $nombreDocumento = $_POST['nombreDocumento'];
    $codigo = $_POST['codigo'];
    $version = $_POST['version'];
    $tipoDocumento = $_POST['tipoDocumento'];
    // RECIBIMOS EL ARCHIVO 
    $nombreDocumentoMagnetico = $_FILES['documento']["name"];

    // Consulta para verificar si el documento ya existe
    $documentData = $connection->prepare("SELECT * FROM documentos WHERE nombre_documento = :nombreDocumento OR nombre_documento_magnetico = :nombreDocumentoMagnetico OR codigo = :codigo");
    $documentData->bindParam(':nombreDocumento', $nombreDocumento);
    $documentData->bindParam(':nombreDocumentoMagnetico', $nombreDocumentoMagnetico);
    $documentData->bindParam(':codigo', $codigo);
    $documentData->execute();
    $validationDocument = $documentData->fetch(PDO::FETCH_ASSOC);
    if ($validationDocument) {
        showErrorAndRedirect("Los datos ingresados ya están registrados.", "../views/crear-documento.php");
    } elseif (isEmpty([$idProceso, $idProcedimiento, $nombreDocumento, $codigo, $version, $tipoDocumento, $nombreDocumentoMagnetico])) {
        showErrorAndRedirect("Existen datos vacíos en el formulario, debes ingresar todos los datos.", "../views/crear-documento.php");
    } else {
        // traemos los directorios de procesos y procedimientos
        $getProccessAndProcedure = $connection->prepare("SELECT * FROM procedimiento INNER JOIN proceso ON procedimiento.id_proceso = proceso.id_proceso WHERE procedimiento.id_procedimiento ='$idProcedimiento'");
        $getProccessAndProcedure->execute();
        $proccessAndProcedure = $getProccessAndProcedure->fetch(PDO::FETCH_ASSOC);
        if ($proccessAndProcedure) {
            // Verifica si se ha enviado un archivo y si no hay errores al subirlo
            if (isFileUploaded($_FILES['documento'])) {
                $permitidos = array(
                    "application/pdf", // PDF
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.document", // Word
                    "application/vnd.openxmlformats-officedocument.presentationml.presentation", // PowerPoint
                    "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", // Excel
                    "application/vnd.ms-excel", // Excel (formato anterior)
                    "text/csv" // CSV
                );
                $limite_KB = 12000;

                if (isFileValid($_FILES["documento"], $permitidos, $limite_KB)) {
                    $ruta = "../documentos/" . $proccessAndProcedure['nombre_directorio_proceso'] . '/' . $proccessAndProcedure['nombre_directorio_procedimiento'] . '/';
                    $documento = $ruta . $_FILES['documento']["name"];
                    createDirectoryIfNotExists($ruta);

                    if (!file_exists($documento)) {
                        $resultado = moveUploadedFile($_FILES["documento"], $documento);
                        if ($resultado) {
                            // Inserta los datos en la base de datos
                            $registerDocument = $connection->prepare("INSERT INTO documentos(id_procedimiento,nombre_documento,nombre_documento_magnetico, tipo_documento, codigo, version, id_responsable, fecha_elaboracion) VALUES(:idProcedimiento, :nombreDocumento, :nombreDocumentoMagnetico, :tipoDocumento, :codigo, :version, :idResponsable, NOW())");
                            $registerDocument->bindParam(':idProcedimiento', $idProcedimiento);
                            $registerDocument->bindParam(':nombreDocumento', $nombreDocumento);
                            $registerDocument->bindParam(':nombreDocumentoMagnetico', $nombreDocumentoMagnetico);
                            $registerDocument->bindParam(':codigo', $codigo);
                            $registerDocument->bindParam(':tipoDocumento', $tipoDocumento);
                            $registerDocument->bindParam(':version', $version);
                            $registerDocument->bindParam(':idResponsable', $idResponsable);
                            $registerDocument->execute();
                            if ($registerDocument) {
                                showSuccessAndRedirect("Los datos han sido registrados correctamente.", "../views/lista-documentos.php");
                            } else {
                                showErrorAndRedirect("Error al cargar al momento de registrar los datos.", "../views/crear-documento.php");
                            }
                        } else {
                            showErrorAndRedirect("Error al momento de cargar el archivo.", "../views/lista-documentos.php");
                        }
                    }
                } else {
                    showErrorAndRedirect("Error al momento de cargar el archivo, asegúrate de que sea de tipo PDF, WORD o formatos de excel y que su tamaño sea menor o igual a 10 MB.", "../views/crear-documento.php");
                }
            } else {
                showErrorAndRedirect("Error al cargar el documento. Asegúrate de seleccionar un archivo valido.", "../views/crear-documento.php");
            }
        }
    }
}


// ACTUALIZACION DE DOCUMENTOS 
if (isset($_POST["MM_updateDocument"]) && $_POST["MM_updateDocument"] == "formUpdateDocument") {
    // ASIGNACION VALORES DE DATOS
    $idDocument = $_POST['idDocument'];
    $idProceso = $_POST['idProceso'];
    $idProcedimiento = $_POST['idProcedimiento'];
    $idResponsable = $_POST['idResponsable'];
    $nombreDocumento = $_POST['nombreDocumento'];
    $codigo = $_POST['codigo'];
    $version = $_POST['version'];
    $tipoDocumento = $_POST['tipoDocumento'];

    // Consulta para verificar si el documento ya existe
    $documentData = $connection->prepare("SELECT * FROM documentos WHERE (nombre_documento = ? OR codigo = ?) AND id_documento != ?");
    $documentData->execute([$nombreDocumento, $codigo, $idDocument]);
    $documentData->execute();
    $register_validation = $documentData->fetchAll();
    if ($register_validation) {
        showErrorAndRedirect("Los datos ingresados ya están registrados.", "../views/actualizar-documento.php?id_document-edit=" . $idDocument);
    } elseif (isEmpty([$idProceso, $idProcedimiento, $nombreDocumento, $codigo, $tipoDocumento, $idDocument])) {
        showErrorAndRedirect("Existen datos vacíos en el formulario, debes ingresar todos los datos.",  "../views/actualizar-documento.php?id_document-edit=" . $idDocument);
    } else {
        // Actualzacion de datos en la base de datos
        $registerDocument = $connection->prepare("UPDATE documentos SET id_procedimiento = :idProcedimiento, nombre_documento = :nombreDocumento, tipo_documento = :tipoDocumento,codigo = :codigo,version = :version, id_responsable = :idResponsable WHERE id_documento = :idDocumento");
        $registerDocument->bindParam(':idProcedimiento', $idProcedimiento);
        $registerDocument->bindParam(':nombreDocumento', $nombreDocumento);
        $registerDocument->bindParam(':tipoDocumento', $tipoDocumento);
        $registerDocument->bindParam(':codigo', $codigo);
        $registerDocument->bindParam(':version', $version);
        $registerDocument->bindParam(':idResponsable', $idResponsable);
        $registerDocument->bindParam(':idDocumento', $idDocument);
        $registerDocument->execute();
        if ($registerDocument) {
            showSuccessAndRedirect("Los datos han sido actualizados correctamente.", "../views/lista-documentos.php");
        } else {
            showSuccessAndRedirect("Error al momento de actualizar los datos.", "../views/actualizar-documento.php?id_document-edit=" . $idDocument);
        }
    }
}

// METODO DE CUARENTENA

if (isset($_POST["MM_archiveDocument"]) && $_POST["MM_archiveDocument"] == "formArchiveDocument") {
    // ASIGNACION VALORES DE DATOS
    $id_document = $_POST['idDocument'];
    $id_procedimiento = $_POST['id_procedimiento'];
    $codigo = $_POST['codigo'];
    $version = $_POST['version'];
    $nombreDocumento = $_POST['nombreDocumento'];
    $nombreDocumentoMagneticoOld = $_POST['nombreDocumentoMagnetico'];


    // RECIBIMOS EL ARCHIVO 
    $nombreDocumentoMagnetico = $_FILES['documento']["name"];
    // Consulta para verificar si el documento ya existe
    $archiveDocument = $connection->prepare("SELECT * FROM documentos WHERE nombre_documento_magnetico = :nombreDocumentoMagnetico OR codigo = :codigo OR nombre_documento = :nombreDocumento AND id_documento != :id_document");
    $archiveDocument->bindParam(':codigo', $codigo);
    $archiveDocument->bindParam(':nombreDocumento', $nombreDocumento);
    $archiveDocument->bindParam(':nombreDocumentoMagnetico', $nombreDocumentoMagnetico);
    $archiveDocument->bindParam(':id_document', $id_document);
    $archiveDocument->execute();
    $validationDocument = $archiveDocument->fetch(PDO::FETCH_ASSOC);

    if ($validationDocument) {
        showErrorAndRedirect("Los datos ingresados ya están registrados.", "../views/archivo-documento.php?id_archive_document=" . $id_document);
    } elseif (isEmpty([$codigo, $version, $nombreDocumentoMagnetico])) {
        showErrorAndRedirect("Existen datos vacíos en el formulario, debes ingresar todos los datos.", "../views/archivo-documento.php?id_archive_document=" . $id_document);
    } else {
        // traemos los directorios de procesos y procedimientos
        $getProccessAndProcedure = $connection->prepare("SELECT * FROM procedimiento INNER JOIN proceso ON procedimiento.id_proceso = proceso.id_proceso WHERE procedimiento.id_procedimiento ='$id_procedimiento'");
        $getProccessAndProcedure->execute();
        $proccessAndProcedure = $getProccessAndProcedure->fetch(PDO::FETCH_ASSOC);

        if ($proccessAndProcedure) {
            // Verifica si se ha enviado un archivo y si no hay errores al subirlo
            if (isFileUploaded($_FILES['documento'])) {
                $permitidos = array(
                    "application/pdf", // PDF
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.document", // Word
                    "application/vnd.openxmlformats-officedocument.presentationml.presentation", // PowerPoint
                    "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", // Excel
                    "application/vnd.ms-excel", // Excel (formato anterior)
                    "text/csv" // CSV
                );
                $limite_KB = 12000;
                if (isFileValid($_FILES["documento"], $permitidos, $limite_KB)) {

                    // ruta antigua del procedimiento
                    $ruta = "../documentos/" . $proccessAndProcedure['nombre_directorio_proceso'] . '/' . $proccessAndProcedure['nombre_directorio_procedimiento'] . "/";

                    $documento = $ruta . $_FILES['documento']["name"];

                    createDirectoryIfNotExists($ruta);
                    if (!file_exists($documento)) {
                        $resultado = moveUploadedFile($_FILES["documento"], $documento);
                        if ($resultado) {
                            // nos traemos los datos del documento antiguo
                            $selectDocument = $connection->prepare("SELECT * FROM documentos WHERE id_documento = :id_document");
                            $selectDocument->bindParam(':id_document', $id_document);
                            $selectDocument->execute();
                            $documentSelection = $selectDocument->fetch(PDO::FETCH_ASSOC);
                            if ($selectDocument) {
                                // Insertar los datos en la base de datos
                                $registerDocument = $connection->prepare("INSERT INTO trigger_cuarentena(nombre_documento, nombre_documento_magnetico, tipo_documento, codigo_version, version, id_responsable,id_procedimiento,id_document, fecha_cuarentena) VALUES(:nombre_documento, :nombreDocumentoMagnetico, :tipoDocumento, :codigo, :version, :idResponsable, :idProcedimiento, :idDocument, NOW())");

                                // Verificar y asignar valores adecuadamente
                                $nombre_documentoTrigger = ($documentSelection['nombre_documento']);
                                $tipoDocumentoTrigger = ($documentSelection['tipo_documento']);
                                $codigoTrigger = ($documentSelection['codigo']);
                                $versionTrigger = ($documentSelection['version']);
                                $idResponsableTrigger = ($documentSelection['id_responsable']);
                                $idProcedimientoTrigger = ($documentSelection['id_procedimiento']);


                                $registerDocument->bindParam(':nombre_documento', $nombre_documentoTrigger);
                                $registerDocument->bindParam(':nombreDocumentoMagnetico', $nombreDocumentoMagneticoOld);
                                $registerDocument->bindParam(':tipoDocumento', $tipoDocumentoTrigger);
                                $registerDocument->bindParam(':codigo', $codigoTrigger);
                                $registerDocument->bindParam(':version', $versionTrigger);
                                $registerDocument->bindParam(':idResponsable', $idResponsableTrigger);
                                $registerDocument->bindParam(':idProcedimiento', $idProcedimientoTrigger);
                                $registerDocument->bindParam(':idDocument', $id_document);
                                $registerDocument->execute();
                                if ($registerDocument) {
                                    $updateDocument = $connection->prepare("UPDATE documentos SET nombre_documento = :nombreDocumento, nombre_documento_magnetico = :nombreDocumentoMagnetico, codigo = :codigo, version = :version WHERE id_documento = :idDocument");
                                    $updateDocument->bindParam(':nombreDocumento', $nombreDocumento);
                                    $updateDocument->bindParam(':nombreDocumentoMagnetico', $nombreDocumentoMagnetico);
                                    $updateDocument->bindParam(':codigo', $codigo);
                                    $updateDocument->bindParam(':version', $version);
                                    $updateDocument->bindParam(':idDocument', $id_document);
                                    $updateDocument->execute();
                                    if ($updateDocument) {
                                        showSuccessAndRedirect("Se ha actualizado correctamente los datos", "../views/lista-documentos.php");
                                    } else {
                                        showErrorAndRedirect("Error al momento de cargar el archivo.", "../views/archivar-documento.php?id_archive_document=" . $id_document);
                                    }
                                } else {
                                    showErrorAndRedirect("Error al momento de archivar el archivo en cuarentena.", "../views/archivar-documento.php?id_archive_document=" . $id_document);
                                }
                            } else {
                                showErrorAndRedirect("Error al momento de actualizar los datos.", "../views/archivar-documento.php?id_archive_document=" . $id_document);
                            }
                        } else {
                            showErrorAndRedirect("Error al momento de cargar el archivo.", "../views/archivar-documento.php?id_archive_document=" . $id_document);
                        }
                    } else {
                        showErrorAndRedirect("Error al momento de cargar el archivo.", "../views/archivar-documento.php?id_archive_document=" . $id_document);
                    }
                } else {
                    showErrorAndRedirect("Error al momento de cargar el archivo, asegúrate de que sea de tipo PDF, WORD o formatos de excel y que su tamaño sea menor o igual a 10 MB.", "../views/crear-documento.php?id_archive_document=" . $id_document);
                }
            } else {
                showErrorAndRedirect("Error al cargar el documento. Asegúrate de seleccionar un archivo valido.", "../views/crear-documento.php?id_archive_document=" . $id_document);
            }
        }
    }
}


// SUBIR NUEVAMENTE EL ARCHIVO EN CUARENTENA
if (isset($_GET["id_upload_document"])) {
    // ASIGNACION VALORES DE DATOS
    $idDocument = $_GET['id_upload_document'];

    // Consulta para verificar si el documento ya existe
    $documentData = $connection->prepare("SELECT * FROM trigger_cuarentena WHERE id_document_cuarentena = :id_cuarentena");
    $documentData->bindParam(':id_cuarentena', $idDocument);
    $documentData->execute();
    $upload_validation = $documentData->fetch(PDO::FETCH_ASSOC);
    if (empty($upload_validation)) {
        showErrorAndRedirect("Error al momento de subir nuevamente el archivo..",  "../views/lista_documentos.php");
    } else {
        $nombreDocumento = ($upload_validation['nombre_documento']);
        $codigo = ($upload_validation['codigo_version']);
        $version = ($upload_validation['version']);
        $idKeyDocument = ($upload_validation['id_document']);
        $nombreDocumentoMagnetico = ($upload_validation['nombre_documento_magnetico']);

        // nos traemos los datos del documento que esta registrado actualmente
        $listDocuments = $connection->prepare("SELECT 
        documentos.*, 
        procedimiento.*, 
        proceso.*
        FROM 
        documentos
        INNER JOIN 
        procedimiento ON documentos.id_procedimiento = procedimiento.id_procedimiento
        INNER JOIN 
        proceso ON procedimiento.id_proceso = proceso.id_proceso WHERE documentos.id_documento = '$idKeyDocument'");
        $listDocuments->execute();
        $documents = $listDocuments->fetch(PDO::FETCH_ASSOC);

        if ($documents) {
            $ruta = "../documentos/" . $documents['nombre_directorio_proceso'] . '/' . $documents['nombre_directorio_procedimiento'] . '/';
            $nombreDocumentoAntiguo = $documents['nombre_documento_magnetico'];

            $archiveDelete = $ruta . $nombreDocumentoAntiguo;
            if (file_exists($archiveDelete)) {
                if (unlink($archiveDelete)) {
                    // Actualzacion de datos en la base de datos
                    $registerDocument = $connection->prepare("UPDATE documentos SET nombre_documento = :nombreDocumento,nombre_documento_magnetico = :nombreDocumentoMagnetico, codigo = :codigo,version = :version WHERE id_documento = :idDocumento");
                    $registerDocument->bindParam(':nombreDocumento', $nombreDocumento);
                    $registerDocument->bindParam(':nombreDocumentoMagnetico', $nombreDocumentoMagnetico);
                    $registerDocument->bindParam(':codigo', $codigo);
                    $registerDocument->bindParam(':version', $version);
                    $registerDocument->bindParam(':idDocumento', $idKeyDocument);
                    $registerDocument->execute();
                    if ($registerDocument) {
                        showSuccessAndRedirect("Los datos han sido actualizados correctamente.", "../views/lista-documentos.php");
                    } else {
                        showSuccessAndRedirect("Error al momento de actualizar los datos.", "../views/actualizar-documento.php?id_document-edit=" . $idDocument);
                    }
                } else {
                    showErrorAndRedirect("Error al momento de cargar nuevamente el archivo.", "../views/cuarentena.php");
                }
            } else {
                showErrorAndRedirect("Error al momento de cargar nuevamente el archivo.", "../views/cuarentena.php");
            }
            // elminamos el archivo concantenando el nombre del archivo
        } else {
            showErrorAndRedirect("Error al momento de cargar nuevamente el archivo.", "../views/cuarentena.php");
        }
    }
}


function showErrorAndRedirect($message, $location)
{
    echo "<script>alert('$message');</script>";
    echo "<script>window.location = '$location';</script>";
}


function isEmpty($fields)
{
    foreach ($fields as $field) {
        if (empty($field)) {
            return true;
        }
    }
    return false;
}

function isFileUploaded($file)
{
    return isset($file) && $file['error'] === 0;
}

function isFileValid($file, $allowedTypes, $maxSizeKB)
{
    return in_array($file["type"], $allowedTypes) && $file["size"] <= $maxSizeKB * 1024;
}

function createDirectoryIfNotExists($directory)
{
    if (!file_exists($directory)) {
        mkdir($directory);
    }
}

function moveUploadedFile($file, $destination)
{
    return move_uploaded_file($file["tmp_name"], $destination);
}

function showSuccessAndRedirect($message, $location)
{
    echo "<script>alert('$message');</script>";
    echo "<script>window.location = '$location';</script>";
}