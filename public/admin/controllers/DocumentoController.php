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
                $limite_KB = 10000;

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
                            }
                        } else {
                            showErrorAndRedirect("Error al momento de cargar la imagen del avatar.", "../views/lista-documentos.php");
                        }
                    }
                } else {
                    showErrorAndRedirect("Error al momento de cargar el archivo, asegúrate de que sea de tipo PDF, WORD o formatos de excel y que su tamaño sea menor o igual a 1 MB.", "../views/crear-documento.php");
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
    $idProceso = $_POST['idProceso'];
    $idProcedimiento = $_POST['idProcedimiento'];
    $idResponsable = $_POST['idResponsable'];
    $nombreDocumento = $_POST['nombreDocumento'];
    $codigo = $_POST['codigo'];
    $version = $_POST['version'];
    $tipoDocumento = $_POST['tipoDocumento'];

    // Consulta para verificar si el documento ya existe
    $documentData = $connection->prepare("SELECT * FROM documentos WHERE nombre_documento = :nombreDocumento OR nombre_documento_magnetico = :nombreDocumentoMagnetico OR codigo = :codigo AND id_documento = :id_document");
    $documentData->bindParam(':nombreDocumento', $nombreDocumento);
    $documentData->bindParam(':nombreDocumentoMagnetico', $nombreDocumentoMagnetico);
    $documentData->bindParam(':codigo', $codigo);
    $documentData->bindParam(':id_document', $idDocument);
    $documentData->execute();
    $validationDocument = $documentData->fetch(PDO::FETCH_ASSOC);

    if ($validationDocument) {
        showErrorAndRedirect("Los datos ingresados ya están registrados.", "../views/crear-documento.php");
    } elseif (isEmpty([$idProceso, $idProcedimiento, $nombreDocumento, $codigo, $tipoDocumento])) {
        showErrorAndRedirect("Existen datos vacíos en el formulario, debes ingresar todos los datos.", "");
    } else {
        // Actualzacion de datos en la base de datos
        $registerDocument = $connection->prepare("UPDATE documentos SET id_procedimiento = :idProcedimiento, nombre_documento = :nombreDocumento, tipo_documento = :tipoDocumento,codigo = :codigo,version = :version, id_responsable = :idResponsable WHERE id_documento = :idDocumento");
        $registerDocument->bindParam(':idProcedimiento', $idProcedimiento);
        $registerDocument->bindParam(':nombreDocumento', $nombreDocumento);
        $registerDocument->bindParam(':tipoDocumento', $tipoDocumento);
        $registerDocument->bindParam(':codigo', $codigo);
        $registerDocument->bindParam(':version', $version);
        $registerDocument->bindParam(':idResponsable', $idResponsable);
        $registerDocument->execute();
        if ($registerDocument) {
            showSuccessAndRedirect("Los datos han sido actualizados correctamente.", "../views/lista-documentos.php");
        } else {
            showSuccessAndRedirect("Error al momento de actualizar los datos.", "../views/actualizar-documento.php");
        }
    }
}

function showErrorAndRedirect($message, $location)
{
    echo "<script>alert('$message');</script>";
    echo "<script>window.location=('$location');</script>";
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