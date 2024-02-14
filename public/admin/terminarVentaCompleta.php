<?php

session_start();
require_once("../../database/connection.php");
require_once("../../controller/validarSesion.php");
$db = new Database();
$connection = $db->conectar();

date_default_timezone_set('America/Bogota');

if ((isset($_POST["MM_forms"])) && ($_POST["MM_forms"] == "cartForm")) {


	$carritos = array($_SESSION["productCart"], $_SESSION["documentCart"], $_SESSION["serviceCart"]);
	$CarritoVacio = false;

	// Verificar si al menos un carrito está vacío
	foreach ($carritos as $carrito) {
		if (empty($carrito)) {
			$CarritoVacio = true;
			break;
		}
	}

	// Si todos los carritos están vacíos, no realizar la venta
	if ($CarritoVacio) {
		echo '<script>alert("Debes seleccionar productos, servicios y documentos para realizar la venta");</script>';
		echo '<script>window.location="vender_completo.php"</script>';
	} else{
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
			echo '<script>window.location="vender_completo.php"</script>';
			exit();
		} else {
			foreach ($_SESSION["documentCart"] as $documentoEnCarrito) {
				$codigoDocumentoEnCarrito = $documentoEnCarrito->codigo;

				// Realizamos la consulta para verificar si ya existe un registro con el mismo código de documento y placa
				$checkDuplicateSale = $connection->prepare("SELECT COUNT(*) AS count FROM trigger_documents WHERE codigo_documento = ? AND placa = ? AND estado = ?");
				$checkDuplicateSale->execute([$codigoDocumentoEnCarrito,$placa,1]);
				$result = $checkDuplicateSale->fetch(PDO::FETCH_ASSOC);
				$contando = $result['count'];

				if ($contando > 0) {

					// 	LIMPIAMOS EL CARRITO DE PRODUCTOS PARA QUE QUEDE VACIO
					unset($_SESSION["productCart"]);
					$_SESSION["productCart"] = [];

					// 	LIMPIAMOS EL CARRITO DE DOCUMENTOS PARA QUE QUEDE VACIO
					unset($_SESSION["documentCart"]);
					$_SESSION["documentCart"] = [];

					// 	LIMPIAMOS EL CARRITO DE SERVICIOS PARA QUE QUEDE VACIO
					unset($_SESSION["serviceCart"]);
					$_SESSION["serviceCart"] = [];

					echo '<script>alert("Los documentos ya fueron registrados a la placa ' . $placa . ' No podemos realizar la venta.");</script>';
					echo '<script>window.location="ventas_documento.php"</script>';
					exit(); // Lo colocamos para que se salga de la condicion
				} else {

					foreach ($_SESSION["serviceCart"] as $servicioEnCarrito) {

						$codigoservicioEnCarrito = $servicioEnCarrito->code_service;

						// Realizamos la consulta para verificar si ya existe un registro con el mismo código de documento y placa
						$checkServices = $connection->prepare("SELECT COUNT(*) AS count FROM trigger_service WHERE codigo_service = ? AND placa = ? AND estado = ?");
						$checkServices->execute([$codigoservicioEnCarrito, $placa,1]);
						$resultServices = $checkServices->fetch(PDO::FETCH_ASSOC);
						$conteo = $resultServices['count'];

						if ($conteo > 0) {

							// 	LIPIAMOS EL CARRITO DE PRODUCTOS PARA QUE QUEDE VACIO
							unset($_SESSION["productCart"]);
							$_SESSION["productCart"] = [];

							// 	LIPIAMOS EL CARRITO DE DOCUMENTOS PARA QUE QUEDE VACIO
							unset($_SESSION["documentCart"]);
							$_SESSION["documentCart"] = [];

							// 	LIPIAMOS EL CARRITO DE SERVICIOS PARA QUE QUEDE VACIO
							unset($_SESSION["serviceCart"]);
							$_SESSION["serviceCart"] = [];

							echo '<script>alert("Los servicios ya fueron registrados a la placa' . $placa . ' No podemos realizar la venta.");</script>';
							echo '<script>window.location="historial_documentos.php"</script>';
							exit(); // Lo colocamos para que se salga de la condicion

						} else {

							// SINO SE CUMPLE LA CONDICION DE QUE SI EL TRIGGER NO CUENTA CON EL REGISTRO DEL SERVICIO PARA LA MOTO ENTONCES LO DEJAMOS REGISTRAR 

							$sentencia = $connection->prepare("INSERT INTO ventas(document,placa,fecha,fecha_fin,total) VALUES (?,?,?,?,?)");
							$sentencia->execute([$documento, $placa, $fecha, $fechaFin, $total]);
							$sentencia = $connection->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
							$sentencia->execute();
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							$idVenta = $resultado === false ? 1 : $resultado->id;


							$connection->beginTransaction();

							// MODULO PARA REGISTRAR LOS PRODUCTOS AGREGADOS

							$sentencia = $connection->prepare("INSERT INTO productos_vendidos(id_producto,id_venta,existencia) VALUES (?, ?, ?);");
							// ACTUALIZACION DE LA CANTIDAD DE LOS PRODUCTOS AGREGADOS
							$sentenciaExistencia = $connection->prepare("UPDATE productos SET cantidad = cantidad - ? WHERE id = ?;");
							foreach ($_SESSION["productCart"] as $producto) {
								$total += $producto->total;
								// EJECUTAMOS EL REGISTRO DE LOS DETALLES DE LA VENTA DE PRODUCTOS
								$sentencia->execute([$producto->id, $idVenta, $producto->cantidad]);
								// EJECUTAMOS LA ACTUALIZACION
								$sentenciaExistencia->execute([$producto->cantidad, $producto->id]);
							}

							$estado = 1;
							// MODULO PARA REGISTRAR LOS DOCUMENTOS AGREGADOS
							$registroVenta = $connection->prepare("INSERT INTO documentos_vendidos(id_documento,id_venta,existencia) VALUES (?,?,?)");
							// REGISTRAMOS LA VENTA DEL DOCUMENTO A LA PLACA PARA VALIDAR EN UNA PROXIMA VENTA QUE LA PLACA NO TENGA DOCUMENTO REGISTRADO
							$triggerDocumento = $connection->prepare("INSERT INTO trigger_documents(placa,codigo_documento,fecha_registro,fecha_fin,estado)VALUES(?,?,?,?,?)");
							foreach ($_SESSION["documentCart"] as $documento) {
								$total += $documento->total;
								$registroVenta->execute([$documento->id_documento, $idVenta, $documento->cantidad]);
								$triggerDocumento->execute([$placa, $documento->codigo,$fecha,$fechaFin,$estado]);
							}

							// PARA REGISTRAR LOS SERVICIOS VENDIDOS DEBEMOS REALIZAR UNA CONSULTA CON LA PLACA AL CUAL ESTAMOS REGISTRANDOLE LA VENTA

							$servicio = $connection->prepare("SELECT * FROM motorcycles INNER JOIN servicio_moto ON motorcycles.id_servicio_moto = servicio_moto.id_servicio_moto WHERE placa = '$placa'");
							$servicio->execute();
							$fetch_servicio = $servicio->fetch(PDO::FETCH_ASSOC);

							$conteoservicio = $fetch_servicio['id_servicio_moto'];

							// NOS TRAEMOS EL SERVICIO QUE PRESTA LA MOTO Y DEPENDIENDO ESO TOMAMOS DECISIONES
							if ($conteoservicio <= 3) {

								// CREAMOS UNA VARIABLE QUE NOS TRAIGA LA FECHA ACTUAL
								$fechaInicial = new DateTime;
								// CLONAMOS O COPIAMOS ESA FECHA EN OTRA VARIABLE
								$fechaFinal = clone $fechaInicial;
								// LE AGREGAMOS 20 DIAS A LA FECHA FINAL
								$fechaFinal->add(new DateInterval('P20D'));


								// Convertimos los objetos DateTime en cadenas con el formato adecuado
								$fecha_inicial = $fechaInicial->format('Y-m-d H:i:s');
								$fecha_final = $fechaFinal->format('Y-m-d H:i:s');

								$terminarVenta = $connection->prepare("INSERT INTO servicios_vendidos(id_servicio,id_venta,existencia) VALUES(?,?,?)");
								$aceite = $connection->prepare("INSERT INTO trigger_service(codigo_service,placa,fecha,fecha_fin,nombre,estado) VALUES(?,?,?,?,?,?)");
								foreach ($_SESSION["serviceCart"] as $servicio) {
									$total += $servicio->total;
									$terminarVenta->execute([$servicio->code_service, $idVenta, $servicio->cantidad]);
									$aceite->execute([$servicio->code_service, $placa, $fecha_inicial, $fecha_final, $servicio->service,$estado]);
								}

								// 	EJECUTAMOS LOS TRES TRANSACCIONES DE REGISTRO DE DATOS CON EL COMMIT
								$connection->commit();

								// 	LIMPIAMOS EL CARRITO DE PRODUCTOS PARA QUE QUEDE VACIO
								unset($_SESSION["productCart"]);
								$_SESSION["productCart"] = [];

								// 	LIMPIAMOS EL CARRITO DE DOCUMENTOS PARA QUE QUEDE VACIO
								unset($_SESSION["documentCart"]);
								$_SESSION["documentCart"] = [];

								// 	LIMPIAMOS EL CARRITO DE SERVICIOS PARA QUE QUEDE VACIO
								unset($_SESSION["serviceCart"]);
								$_SESSION["serviceCart"] = [];

								header("Location: ./listaVentas_completas.php?status=1");

							} elseif ($conteoservicio == 4) {

								// CREAMOS UNA VARIABLE QUE NOS TRAIGA LA FECHA ACTUAL
								$fechaInicial = new DateTime;
								// CLONAMOS O COPIAMOS ESA FECHA EN OTRA VARIABLE
								$fechaFinal = clone $fechaInicial;
								// LE AGREGAMOS 1 MES Y 15 DIAS A LA FECHA FINAL A LA FECHA FINAL
								$fechaFinal->add(new DateInterval('P1M15D'));


								// Convertimos los objetos DateTime en cadenas con el formato adecuado
								$fecha_inicial = $fechaInicial->format('Y-m-d H:i:s');
								$fecha_final = $fechaFinal->format('Y-m-d H:i:s');

								$terminarVenta = $connection->prepare("INSERT INTO servicios_vendidos(id_servicio,id_venta,existencia) VALUES(?,?,?)");
								$aceite = $connection->prepare("INSERT INTO trigger_service(codigo_service,placa,fecha,fecha_fin,nombre) VALUES(?,?,?,?,?,?)");
								foreach ($_SESSION["serviceCart"] as $servicio) {
									$total += $servicio->total;
									$terminarVenta->execute([$servicio->code_service, $idVenta, $servicio->cantidad]);
									$aceite->execute([$servicio->code_service, $placa, $fecha_inicial, $fecha_final, $servicio->service,1]);
								}

								// 	EJECUTAMOS LOS TRES TRANSACCIONES DE REGISTRO DE DATOS CON EL COMMIT
								$connection->commit();

								// 	LIPIAMOS EL CARRITO DE PRODUCTOS PARA QUE QUEDE VACIO
								unset($_SESSION["productCart"]);
								$_SESSION["productCart"] = [];

								// 	LIPIAMOS EL CARRITO DE DOCUMENTOS PARA QUE QUEDE VACIO
								unset($_SESSION["documentCart"]);
								$_SESSION["documentCart"] = [];

								// 	LIPIAMOS EL CARRITO DE SERVICIOS PARA QUE QUEDE VACIO
								unset($_SESSION["serviceCart"]);
								$_SESSION["serviceCart"] = [];

								header("Location: ./listaVentas_completas.php?status=1");
							}
						}
					}
				}
			}
		}
	}
}
