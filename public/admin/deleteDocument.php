<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

session_start();
array_splice($_SESSION["documentCart"], $indice, 1);
header("Location: ./vender_completo.php?documents=3");
?>