<?php

session_start();
require_once("../../database/connection.php");
require_once("../../controller/validarSesion.php");
$db = new Database();
$connection = $db->conectar();

date_default_timezone_set('America/Bogota');

if ((isset($_POST["MM_forms"])) && ($_POST["MM_forms"] == "formCartDocument")) {

	$carritos = array($_SESSION["carrito_venta"]);
	$CarritoVacio = false;

	// Verificar si al menos un carrito está vacío
	foreach ($carritos as $carrito) {
		if (empty($carrito)) {
			$CarritoVacio = true;
			break;
		}
	}

	// Si el carrito esta vacio, no realizar la venta
	if ($CarritoVacio) {
		echo '<script>alert("Debes seleccionar documentos para realizar la venta");</script>';
		echo '<script>window.location="vender_documento.php"</script>';
	} else {
		// VARIABLE QUE TRAEN LOS DATOS DE LA MOTO Y EL VENDEDOR PARA REALIZAR LA CONTRASEÑA 
		$total = $_POST["total"];
		$documento = $_POST['document'];
		$placa = $_POST['placa'];
		$ahora = new DateTime();

		$fecha_fin = clone $ahora;
		$fecha_fin->add(new DateInterval('P1Y'));

		// Convertir los objetos DateTime en cadenas con el formato adecuado
		$fecha = $ahora->format('Y-m-d H:i:s');
		$fechaFin = $fecha_fin->format('Y-m-d H:i:s');


		// CREAMOS UN CICLO PARA VALIDAR MEDIANTE EL CODIGO DEL DOCUMENTO SI YA FUE REGISTRADO A LA PLACA DE LA MOTO


		if ($total == "" || $documento == "" || $placa == "") {
			echo '<script>alert("Debes ingresar todos los datos para realizar la venta.");</script>';
			echo '<script>window.location="vender_documento.php"</script>';
			exit();
		} else {
			foreach ($_SESSION["carrito_venta"] as $documentoEnCarrito) {
				$codigoDocumentoEnCarrito = $documentoEnCarrito->codigo;

				// Realizamos la consulta para verificar si ya existe un registro con el mismo código de documento y placa
				$checkDuplicateSale = $connection->prepare("SELECT COUNT(*) AS count FROM trigger_documents WHERE codigo_documento = ? AND placa = ?");
				$checkDuplicateSale->execute([$codigoDocumentoEnCarrito, $placa]);
				$result = $checkDuplicateSale->fetch(PDO::FETCH_ASSOC);
				$count = $result['count'];

				if ($count > 0) {
					echo '<script>alert("Los documentos ya fueron registrados a la placa' . $placa . ' No podemos realizar la venta.");</script>';
					echo '<script>window.location="ventas_documentos.php"</script>';
					exit(); // Lo colocamos para que se salga de la condicion
				} else {

					$sentencia = $connection->prepare("INSERT INTO ventas(document,placa,fecha,fecha_fin,total) VALUES (?,?,?,?,?)");
					$sentencia->execute([$documento, $placa, $fecha, $fechaFin, $total]);
					$sentencia = $connection->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
					$sentencia->execute();
					$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
					$idVenta = $resultado === false ? 1 : $resultado->id;


					$connection->beginTransaction();


					// MODULO PARA REGISTRAR LOS DOCUMENTOS AGREGADOS
					$registroVenta = $connection->prepare("INSERT INTO documentos_vendidos(id_documento,id_venta,existencia) VALUES (?,?,?)");
					// REGISTRAMOS LA VENTA DEL DOCUMENTO A LA PLACA PARA VALIDAR EN UNA PROXIMA VENTA QUE LA PLACA NO TENGA DOCUMENTO REGISTRADO
					$triggerDocumento = $connection->prepare("INSERT INTO trigger_documents(placa,codigo_documento)VALUES(?,?)");
					foreach ($_SESSION["carrito_venta"] as $documento) {
						$total += $documento->total;
						$registroVenta->execute([$documento->id_documento, $idVenta, $documento->cantidad]);
						$triggerDocumento->execute([$placa, $documento->codigo]);
					}

					// 	EJECUTAMOS LOS TRES TRANSACCIONES DE REGISTRO DE DATOS CON EL COMMIT
					$connection->commit();



					// 	LIPIAMOS EL CARRITO DE DOCUMENTOS PARA QUE QUEDE VACIO
					unset($_SESSION["carrito_venta"]);
					$_SESSION["carrito_venta"] = [];


					header("Location: ./ventas_documento.php?status=1");
				}
			}
		}
	}
}


?>
