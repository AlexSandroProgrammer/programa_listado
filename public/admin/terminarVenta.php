<?php

session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection = $db->conectar();
date_default_timezone_set('America/Bogota');

if ((isset($_POST["MM_forms"])) && ($_POST["MM_forms"] == "formCartProduct")) {

	$carritoProducto = array($_SESSION["carrito"]);
	$CarritoVacio = false;

	// Verificar si al menos un carrito está vacío
	foreach ($carritoProducto as $carrito) {
		if (empty($carrito)) {
			$CarritoVacio = true;
			break;
		}
	}

	// Si todos los carritos están vacíos, no realizar la venta
	if ($CarritoVacio) {
		echo '<script>alert("Debes seleccionar productos para realizar la venta");</script>';
		echo '<script>window.location="vender.php"</script>';
	} else {

		$total = $_POST["total"];
		$documento = $_POST['document'];
		$placa = $_POST['placa'];
		$ahora = date("y-m-d h:i:s");

		$sentencia = $connection->prepare("INSERT INTO ventas(document,placa,fecha,total) VALUES (?,?,?,?)");
		$sentencia->execute([$documento, $placa, $ahora, $total]);
		$sentencia = $connection->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
		$sentencia->execute();
		$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

		$idVenta = $resultado === false ? 1 : $resultado->id;

		$connection->beginTransaction();
		$sentencia = $connection->prepare("INSERT INTO productos_vendidos(id_producto,id_venta, existencia) VALUES (?, ?, ?);");
		$sentenciaExistencia = $connection->prepare("UPDATE productos SET cantidad = cantidad - ? WHERE id = ?;");
		foreach ($_SESSION["carrito"] as $producto) {
			$total += $producto->total;
			$sentencia->execute([$producto->id, $idVenta, $producto->cantidad]);
			$sentenciaExistencia->execute([$producto->cantidad, $producto->id]);
		}
		$connection->commit();
		unset($_SESSION["carrito"]);
		$_SESSION["carrito"] = [];
		header("Location: ./ventas.php?status=1");
	}
}
