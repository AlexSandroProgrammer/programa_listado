<?php
session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection=$db->conectar();

require_once("../../controller/validarSesion.php");

if (isset($_POST['btncerrar'])) {
	session_destroy();
	header("Location:../../index.php");
}


// MODULO PARA AGREGAR SOLO SERVICIOS

if ((isset($_POST["addServices"])) && ($_POST["addServices"] == "formServices")) {

    $codigo = $_POST["codigo"];
    $sentencia = $connection->prepare("SELECT * FROM services WHERE code_service = ? LIMIT 1;");
    $sentencia->execute([$codigo]);
    $servicio = $sentencia->fetch(PDO::FETCH_OBJ);

    # Si no existe, salimos y lo indicamos
    if (!$servicio) {
        header("Location: ./vender_servicio.php?services=4");
        exit;
    }

    # Si no hay existencia...
    if ($servicio->cantidad < 1) {
        header("Location: ./vender_servicio.php?services=5");
        exit;
    }

    # Verificar si el documento ya está en el carrito
    $servicioExistente = false;
    foreach ($_SESSION["carritoServicio"] as $servicioEnCarrito) {
        if ($servicioEnCarrito->code_service === $codigo) {
            $servicioExistente = true;
            break;
        }
    }

    # Si no existe, lo agregamos al carrito
    if (!$servicioExistente) {
        $servicio->cantidad = 1;
        $servicio->total = $servicio->costo_service;
        array_push($_SESSION["carritoServicio"], $servicio);
        $_SESSION["serviceAdded"] = true; // Variable de sesión para indicar que se agregó el servicio
    } else {
        $_SESSION["serviceAdded"] = false; // Variable de sesión para indicar que el servicio ya fue agregado
    }
    header("Location: ./vender_servicio.php");
    exit;
}
