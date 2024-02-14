<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

session_start();
array_splice($_SESSION["carrito_venta"], $indice, 1);
header("Location: ./vender_documento.php?status=3");
?>