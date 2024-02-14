<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

session_start();
array_splice($_SESSION["carritoServicio"], $indice, 1);
header("Location: ./vender_servicio.php?services=3");
?>