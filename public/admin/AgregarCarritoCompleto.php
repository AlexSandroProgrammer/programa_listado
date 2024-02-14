<?php
session_start();
require_once("../../database/connection.php");
require_once("../../controller/validarSesion.php");
$db = new Database();
$connection = $db->conectar();

if (!isset($_POST["codigo"]) == "formreg") {
    return;
}

// MODULO PARA AGREGAR SOLO PRODUCTOS AL CARRITO

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formreg")) {

    $codigo = $_POST["codigo"];
    $sentencia = $connection->prepare("SELECT * FROM productos INNER JOIN marca WHERE codigo = ? AND productos.id_marca = marca.id_marca LIMIT 1");
    $sentencia->execute([$codigo]);
    $producto = $sentencia->fetch(PDO::FETCH_OBJ);
    # Si no existe, salimos y lo indicamos
    if (!$producto) {
        header("Location: ./vender_completo.php?status=4");
        exit;
    }
    # Si no hay existencia...
    if ($producto->cantidad < 5) {
        header("Location: ./vender_completo.php?status=5");
        exit;
    }
    # Buscar producto dentro del cartito
    $indice = false;
    for ($i = 0; $i < count($_SESSION["productCart"]); $i++) {
        if ($_SESSION["productCart"][$i]->codigo === $codigo) {
            $indice = $i;
            break;
        }
    }
    # Si no existe, lo agregamos como nuevo
    if ($indice === false) {
        $producto->cantidad = 1;
        $producto->total = $producto->precio;
        array_push($_SESSION["productCart"], $producto);
        header("Location: ./vender_completo.php?status=6");
        exit;
    } else {
        # Si ya existe, se agrega la cantidad
        # Pero espera, tal vez ya no haya
        $cantidadExistente = $_SESSION["productCart"][$indice]->existencia;
        # si al sumarle uno supera lo que existe, no se agrega
        if ($cantidadExistente + 0 > $producto->producto) {
            header("Location: ./vender_completo.php?status=5");
            exit;
        }
        $_SESSION["productCart"][$indice]->cantidad++;
        $_SESSION["productCart"][$indice]->total = $_SESSION["productCart"][$indice]->cantidad * $_SESSION["productCart"][$indice]->precio;
    }
    header("Location: ./vender_completo.php");
}

// MODULO PARA AGREGAR SOLO DOCUMENTOS

if ((isset($_POST["addDocuments"])) && ($_POST["addDocuments"] == "formDocuments")) {
    $codigo = $_POST["codigo"];
    $sentencia = $connection->prepare("SELECT * FROM documentos WHERE codigo = ? LIMIT 1;");
    $sentencia->execute([$codigo]);
    $documento = $sentencia->fetch(PDO::FETCH_OBJ);

    # Si no existe, salimos y lo indicamos
    if (!$documento) {
        header("Location: ./vender_completo.php?documents=4");
        exit;
    }

    # Si no hay existencia...
    if ($documento->cantidad < 1) {
        header("Location: ./vender_completo.php?documents=5");
        exit;
    }

    # Verificar si el documento ya está en el carrito
    $documentoExistente = false;
    foreach ($_SESSION["documentCart"] as $documentoEnCarrito) {
        if ($documentoEnCarrito->codigo === $codigo) {
            $documentoExistente = true;
            break;
        }
    }

    # Si no existe, lo agregamos al carrito
    if (!$documentoExistente) {
        $documento->cantidad = 1;
        $documento->total = $documento->precio;
        array_push($_SESSION["documentCart"], $documento);
        $_SESSION["documentAdded"] = true; // Variable de sesión para indicar que se agregó el documento
    } else {
        $_SESSION["documentAdded"] = false; // Variable de sesión para indicar que el documento ya fue agregado
    }
    header("Location: ./vender_completo.php");
    exit;
}



// MODULO PARA AGREGAR SOLO SERVICIOS

if ((isset($_POST["addServices"])) && ($_POST["addServices"] == "formServices")) {

    $codigo = $_POST["codigo"];
    $sentencia = $connection->prepare("SELECT * FROM services WHERE code_service = ? LIMIT 1;");
    $sentencia->execute([$codigo]);
    $servicio = $sentencia->fetch(PDO::FETCH_OBJ);

    # Si no existe, salimos y lo indicamos
    if (!$servicio) {
        header("Location: ./vender_completo.php?services=4");
        exit;
    }

    # Si no hay existencia...
    if ($servicio->cantidad < 1) {
        header("Location: ./vender_completo.php?services=5");
        exit;
    }

    # Verificar si el documento ya está en el carrito
    $servicioExistente = false;
    foreach ($_SESSION["serviceCart"] as $servicioEnCarrito) {
        if ($servicioEnCarrito->code_service === $codigo) {
            $servicioExistente = true;
            break;
        }
    }

    # Si no existe, lo agregamos al carrito
    if (!$servicioExistente) {
        $servicio->cantidad = 1;
        $servicio->total = $servicio->costo_service;
        array_push($_SESSION["serviceCart"], $servicio);
        $_SESSION["serviceAdded"] = true; // Variable de sesión para indicar que se agregó el servicio
    } else {
        $_SESSION["serviceAdded"] = false; // Variable de sesión para indicar que el servicio ya fue agregado
    }
    header("Location: ./vender_completo.php");
    exit;
}
