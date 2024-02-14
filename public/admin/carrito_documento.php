<?php
session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection=$db->conectar();

if (!isset($_POST["codigo"])) {
    return;
}

$codigo = $_POST["codigo"];
$sentencia = $connection->prepare("SELECT * FROM documentos WHERE codigo = ? LIMIT 1;");
$sentencia->execute([$codigo]);
$documento = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$documento) {
    header("Location: ./vender_documento.php?status=4");
    exit;
}
# Si no hay existencia...
if ($documento->cantidad < 1) {
    header("Location: ./vender_documento.php?status=5");
    exit;
}
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito_venta"]); $i++) {
    if ($_SESSION["carrito_venta"][$i]->codigo === $codigo) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $documento->cantidad = 1;
    $documento->total = $documento->precio;
    array_push($_SESSION["carrito_venta"], $documento);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito_venta"][$indice]->existencia;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 0 > $documento->documento) {
        header("Location: ./vender_documento.php?status=5");
        exit;   
    }
    $_SESSION["carrito_venta"][$indice]->cantidad++;
    $_SESSION["carrito_venta"][$indice]->total = $_SESSION["carrito_venta"][$indice]->cantidad* $_SESSION["carrito_venta"][$indice]->precio;
}
header("Location: ./vender_documento.php");
