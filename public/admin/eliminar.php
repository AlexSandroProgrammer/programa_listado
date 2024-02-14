<?php
session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection=$db->conectar();

if(!isset($_GET["id"])) exit();
echo  $_GET["id"];
$id = $_GET["id"];
$sentencia = $connection->prepare("DELETE FROM productos WHERE id = ?;");
if($resultado = $sentencia->execute([$id])){
	header("Location: ./lista_products.php");
	echo '<script> alert ("// LOS DATOS SE ELIMINARON CORRECTAMENTE //");</script>';
	exit;
}
else echo "Algo salió mal";
?>