<?php
session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection = $db->conectar();

require_once("../../controller/validarSesion.php");

if (isset($_POST['btncerrar'])) {
	session_destroy();
	header("Location:../../index.php");
}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formreg")) {

    $codigo = $_POST["codigo"];
    $sentencia = $connection->prepare("SELECT * FROM productos WHERE codigo = ? LIMIT 1;");
    $sentencia->execute([$codigo]);
    $producto = $sentencia->fetch(PDO::FETCH_OBJ);
    # Si no existe, salimos y lo indicamos
    if (!$producto) {
        header("Location: ./vender.php?status=4");
        exit;
    }
    # Si no hay existencia...
    if ($producto->cantidad < 1) {
        header("Location: ./vender.php?status=5");
        exit;
    }
    # Buscar producto dentro del cartito
    $indice = false;
    for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
        if ($_SESSION["carrito"][$i]->codigo === $codigo) {
            $indice = $i;
            break;
        }
    }
    # Si no existe, lo agregamos como nuevo
    if ($indice === false) {
        $producto->cantidad = 1;
        $producto->total = $producto->precio;
        array_push($_SESSION["carrito"], $producto);
    } else {
        # Si ya existe, se agrega la cantidad
        # Pero espera, tal vez ya no haya
        $cantidadExistente = $_SESSION["carrito"][$indice]->existencia;
        # si al sumarle uno supera lo que existe, no se agrega
        if ($cantidadExistente + 0 > $producto->producto) {
            header("Location: ./vender.php?status=5");
            exit;
        }
        $_SESSION["carrito"][$indice]->cantidad++;
        $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precio;
    }
    header("Location: ./vender.php");
}
