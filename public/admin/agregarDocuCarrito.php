<?php
session_start();
require_once("../../database/connection.php");
require_once("../../controller/validarSesion.php");
$db = new Database();
$connection = $db->conectar();
// MODULO PARA AGREGAR SOLO DOCUMENTOS

if ((isset($_POST["addDocuments"])) && ($_POST["addDocuments"] == "formDocuments")) {
    $codigo = $_POST["codigo"];
    $sentencia = $connection->prepare("SELECT * FROM documentos WHERE codigo = ? LIMIT 1;");
    $sentencia->execute([$codigo]);
    $documento = $sentencia->fetch(PDO::FETCH_OBJ);

    # Si no existe, salimos y lo indicamos
    if (!$documento) {
        header("Location: ./vender_documento.php?documents=4");
        exit;
    }

    # Si no hay existencia...
    if ($documento->cantidad < 1) {
        header("Location: ./vender_documento.php?documents=5");
        exit;
    }

    # Verificar si el documento ya está en el carrito
    $documentoExistente = false;
    foreach ($_SESSION["carrito_venta"] as $documentoEnCarrito) {
        if ($documentoEnCarrito->codigo === $codigo) {
            $documentoExistente = true;
            break;
        }
    }

    # Si no existe, lo agregamos al carrito
    if (!$documentoExistente) {
        $documento->cantidad = 1;
        $documento->total = $documento->precio;
        array_push($_SESSION["carrito_venta"], $documento);
        $_SESSION["documentValidation"] = true; // Variable de sesión para indicar que se agregó el documento
    } else {
        $_SESSION["documentValidation"] = false; // Variable de sesión para indicar que el documento ya fue agregado
    }
    header("Location: ./vender_documento.php");
    exit;
}
