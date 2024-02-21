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
    $nombreDocumento = $_POST['nombreDocumento'];
    $codigo = $_POST['codigo'];
    $tipoDocumento = $_POST['tipoDocumento'];

    // RECIBIMOS EL ARCHIVO 
    $nombreDocumentoMagnetico = $_FILES['documento']["name"];


    // Consulta para verificar si el avatar ya existe
    $documentData = $connection->prepare("SELECT * FROM documentos WHERE Nombre_Documento = :nombreDocumento OR Nombre_Documento_Magnetico = :nombreDocumentoMagnetico OR Codigo = :codigo");
    $documentData->bindParam(':nombreDocumento', $nombreDocumento);
    $documentData->bindParam(':nombreDocumentoMagnetico', $nombreDocumentoMagnetico);
    $documentData->bindParam(':codigo', $codigo);
    $documentData->execute();
    $validationDocument = $documentData->fetch(PDO::FETCH_ASSOC);

    if ($validationDocument) {
        showErrorAndRedirect("Los datos ingresados ya están registrados.", "../views/crear-documento.php");
    } elseif (isEmpty([$idProceso, $idProcedimiento, $nombreDocumento, $codigo, $tipoDocumento])) {
        showErrorAndRedirect("Existen datos vacíos en el formulario, debes ingresar todos los datos.", "");
    } else {
        // Verifica si se ha enviado un archivo y si no hay errores al subirlo
        if (isFileUploaded($_FILES['documento'])) {
            $permitidos = array("file/pdf", "file/word", "file/csv");
            $limite_KB = 1000;

            if (isFileValid($_FILES["documento"], $permitidos, $limite_KB)) {

                $ruta = "../documents/" . $idProceso . '/' . $idProcedimiento . '/../views/crear-documento.php';
                $documento = $ruta . $_FILES['documento']["name"];
                createDirectoryIfNotExists($ruta);

                if (!file_exists($documento)) {
                    $resultado = moveUploadedFile($_FILES["documento"], $documento);

                    if ($resultado) {
                        // Inserta los datos en la base de datos
                        $registerAvatar = $connection->prepare("INSERT INTO documentos(Id_Procedimiento,Nombre_Documento,Nombre_Documento_Magnetico, Tipo_Documento, Codigo, Version, Id_Responsable, Fecha_Elaboracion) VALUES(:idProcedimiento, :nombreDocumento, :nombreDocumentoMagnetico, :tipoDocumento, :codigo, :version, :id_responsable, NOW())");
                        $registerAvatar->bindParam(':serialAvatar', $idProcedimiento);
                        $registerAvatar->bindParam(':nombreDocumento', $nombreDocumento);
                        $registerAvatar->bindParam(':nombreDocumentoMagnetico', $nombreDocumentoMagnetico);
                        $registerAvatar->bindParam(':codigo', $codigo);
                        $registerAvatar->bindParam(':tipoDocumento', $tipoDocumento);
                        $registerAvatar->execute();

                        showSuccessAndRedirect("Los datos han sido registrados correctamente.", "../views/crear-documento.php");
                    } else {
                        showErrorAndRedirect("Error al momento de cargar la imagen del avatar.", "../views/crear-documento.php");
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
