<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

session_start();


require_once("../../controller/validarSesion.php");

if (isset($_POST['btncerrar'])) {
	session_destroy();
	header("Location:../../index.php");
}

array_splice($_SESSION["carrito_venta"], $indice, 1);
header("Location: ./vender_documento.php?documents=3");
?>