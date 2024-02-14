<?php

session_start();

require_once("../../controller/validarSesion.php");

if (isset($_POST['btncerrar'])) {
	session_destroy();
	header("Location:../../index.php");
}


unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];

header("Location: ./vender.php?status=2");
?>