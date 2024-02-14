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

$consul = $connection->prepare("SELECT * FROM user WHERE id_type_user = 2");
$consul->execute();
$name = $consul->fetch();

$consul1 = $connection->prepare("SELECT * FROM motorcycles");
$consul1->execute();
$placa = $consul1->fetch();

$sql = $connection->prepare("SELECT * FROM user,type_user WHERE  username ='" . $_SESSION['usuario'] . "' AND user.id_type_user = type_user.id_type_user");
$sql->execute();
$usua = $sql->fetch(PDO::FETCH_ASSOC);


?>
<?php
$control = $connection->prepare("SELECT * FROM type_user");
$control->execute();
$type_user = $control->fetch(PDO::FETCH_ASSOC);


$comando = $connection->prepare("SELECT * FROM datetime_entry INNER JOIN user INNER JOIN type_user ON datetime_entry.document = user.document AND user.id_type_user = type_user.id_type_user ORDER BY id_entry DESC");
$comando->execute();
$resultado = $comando->fetch(PDO::FETCH_ASSOC);

?>
<?php

?>
<?php

// CREAMOS EL CARRITO PARA PRODUCTOS
if (!isset($_SESSION["productCart"])) $_SESSION["productCart"] = [];

// CREAMOS EL CARRITO PARA DOCUMENTOS
if (!isset($_SESSION["documentCart"])) $_SESSION["documentCart"] = [];

// CREAMOS EL CARRITO PARA SERVICIOS
if (!isset($_SESSION["serviceCart"])) $_SESSION["serviceCart"] = [];

// DECLARAMOS LA VARIABLE QUE ALOJARA TODO EL VALOR DE LA VENTA
// LE ASIGNAMOS VALOR DE 0 PARA CADA VEZ QUE AGREGUEMOS UN PRODUCTO, SERVICIO O DOCUMENTO SE VAYA SUMANDO EN LA VARIABLE
$granTotal = 0;
?>


<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- CSS personalizado -->
	<link rel="stylesheet" href="main.css">

	<!--datables CSS básico-->
	<link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
	<!--datables estilo bootstrap 4 CSS-->
	<link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="../../controller/css/custom.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>VENTA COMPLETA</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../../controller/CSS/bootstrap.min.css">
	<!----css3---->
	<link rel="stylesheet" href="../../controller/CSS/custom.css">
	<!--google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="../../controller/image/favicon.png" type="image/x-icon">

	<!--google material icon-->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

	<!--font awesome con CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


	<style>
		.horizontal-menu {
			display: flex;
		}

		.horizontal-menu a {
			padding: 12px;
			text-decoration: none;
			color: #333;
			display: block;
			cursor: pointer;
			/* Cambia el cursor al hacer hover sobre los enlaces */
			flex: 1;
			/* Distribuye el espacio disponible entre los enlaces */
			text-align: center;
			transition: .4s ease-in-out;
			border-radius: 20px;
		}

		.horizontal-menu a:hover {
			background-color: #2DC1F5;
			border-radius: 20px;
			color: azure;
		}

		.horizontal-menu .content {
			display: none;
			flex: 1;
			/* Ajusta el tamaño del contenido al ancho del menú */
			padding: 10px;
		}
	</style>

</head>

<body>

	<?php

	require_once('./menu.php');
	?>

	<div class="xp-breadcrumbbar text-center">
		<h4 class="page-title"><span>GENERAR VENTA</span></h4>
		<ol class="breadcrumb">
		</ol>
	</div>

	</div>
	</div>

	<!-- ESTADOS DEL PRODUCTO -->

	<div class="container-fluid">
		<div class="col-xs-15 mt-2">
			<?php
			if (isset($_GET["status"])) {
				if ($_GET["status"] === "1") {
			?>
					<div class="alert alert-success">
						<strong>¡Correcto!</strong> Venta realizada correctamente
					</div>
				<?php
				} else if ($_GET["status"] === "2") {
				?>
					<div class="alert alert-info">
						<strong>Venta cancelada</strong>
					</div>
				<?php
				} else if ($_GET["status"] === "3") {
				?>
					<div class="alert alert-info">
						<strong>Retiroso exitoso</strong>, Producto quitado de la lista.
					</div>
				<?php
				} else if ($_GET["status"] === "4") {
				?>
					<div class="alert alert-warning">
						<strong>Error:</strong> El producto que buscas no existe
					</div>
				<?php
				} else if ($_GET["status"] === "5") {
				?>
					<div class="alert alert-danger">
						<strong>Error: </strong>El producto está agotado
					</div>
				<?php
				} else if ($_GET["status"] === "6") {
				?>
					<div class="alert alert-info">
						<strong>¡Listo!</strong>El producto fue agregado
					</div>
				<?php
				} else {
				?>
					<div class="alert alert-danger">
						<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
					</div>
			<?php
				}
			}
			?>


		</div>
	</div>


	<!-- ESTADOS DE VENTA DE DOCUMENTOS -->

	<div class="container mt-5">
		<!-- Contenido de la página -->
		<?php
		// Verificar si la variable de sesión $_SESSION["documentAdded"] está definida
		if (isset($_SESSION["documentAdded"])) {
			if ($_SESSION["documentAdded"]) {
				echo '<div class="alert alert-success" role="alert">Seguro agregado al carrito exitosamente.</div>';
			} else {
				echo '<div class="alert alert-info" role="alert">El Seguro ya fue agregado al carrito.</div>';
			}
			unset($_SESSION["documentAdded"]); // Eliminar la variable de sesión después de mostrar el mensaje
		}
		?>
		<!-- Resto del contenido de la página -->
	</div>

	<div class="container-fluid">
		<div class="col-xs-15 mt-2">
			<?php
			if (isset($_GET["documents"])) {
				if ($_GET["documents"] === "1") {
			?>
					<div class="alert alert-success">
						<strong>¡Correcto!</strong> Venta realizada correctamente
					</div>
				<?php
				} else if ($_GET["documents"] === "2") {
				?>
					<div class="alert alert-info">
						<strong>Venta cancelada</strong>
					</div>
				<?php
				} else if ($_GET["documents"] === "3") {
				?>
					<div class="alert alert-info">
						<strong>Retiroso exitoso</strong>, seguro quitado de la lista.
					</div>
				<?php
				} else if ($_GET["documents"] === "4") {
				?>
					<div class="alert alert-warning">
						<strong>Error:</strong> El seguro que buscas no existe
					</div>
				<?php
				} else {
				?>
					<div class="alert alert-danger">
						<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
					</div>
			<?php
				}
			}
			?>


		</div>
	</div>


	<!-- ESTADOS DE SERVICIOS -->


	<div class="container mt-5">
		<!-- Contenido de la página -->
		<?php
		// Verificar si la variable de sesión $_SESSION["documentAdded"] está definida
		if (isset($_SESSION["serviceAdded"])) {
			if ($_SESSION["serviceAdded"]) {
				echo '<div class="alert alert-success" role="alert">Servicio agregado al carrito exitosamente.</div>';
			} else {
				echo '<div class="alert alert-info" role="alert">El Servicio ya fue agregado al carrito.</div>';
			}
			unset($_SESSION["serviceAdded"]); // Eliminar la variable de sesión después de mostrar el mensaje
		}
		?>
		<!-- Resto del contenido de la página -->
	</div>

	<div class="container-fluid">
		<div class="col-xs-15 mt-2">
			<?php
			if (isset($_GET["services"])) {
				if ($_GET["services"] === "1") {
			?>
					<div class="alert alert-success">
						<strong>¡Correcto!</strong> Venta realizada correctamente
					</div>
				<?php
				} else if ($_GET["services"] === "2") {
				?>
					<div class="alert alert-info">
						<strong>Venta cancelada</strong>
					</div>
				<?php
				} else if ($_GET["services"] === "3") {
				?>
					<div class="alert alert-info">
						<strong>Retiroso exitoso</strong>, Servicio quitado de la lista.
					</div>
				<?php
				} else if ($_GET["services"] === "4") {
				?>
					<div class="alert alert-warning">
						<strong>Error:</strong> El servicio que buscas no existe
					</div>
				<?php
				} else {
				?>
					<div class="alert alert-danger">
						<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
					</div>
			<?php
				}
			}
			?>


		</div>
	</div>

	<?php

	// CONSULTA PARA TRAERME TODOS LOS PRODUCTOS REGISTRADOS

	$productos = $connection->prepare("SELECT * FROM productos");
	$productos->execute();
	$select_productos = $productos->fetch(PDO::FETCH_ASSOC);


	// CONSULTA PARA TRAERME TODOS LOS SERVICIOS REGISTRADOS

	$services = $connection->prepare("SELECT * FROM services WHERE state = 1");
	$services->execute();
	$select_services = $services->fetch(PDO::FETCH_ASSOC);

	// CONSULTA PARA TRAERME TODOS LOS DOCUMENTOS REGISTRADOS

	$documents = $connection->prepare("SELECT * FROM documentos");
	$documents->execute();
	$select_documents = $documents->fetch(PDO::FETCH_ASSOC);

	?> <br>
	<div class="container-fluid">

		<div class="horizontal-menu">
			<!-- Primer enlace -->
			<a onclick="toggleContent('content1')">Productos</a>

			<!-- Segundo enlace -->
			<a onclick="toggleContent('content2')">Seguros</a>

			<!-- Tercer enlace -->
			<a onclick="toggleContent('content3')">Servicios</a>
		</div>

		<div class="col-xs-12">

			<!-- FORMULARIO PARA AGREGAR SOLO PRODUCTOS -->
			<div class="content" id="content1">
				<form method="post" name="formreg" action="agregarCarritoCompleto.php">
					<label for="codigo">Código de barras:</label>

					<select class="form-control" name="codigo" required id="control">
						<option value="">Seleccionar producto:</option>
						<?php
						do {
						?>
							<option value="<?php echo ($select_productos['codigo']) ?>"><?php echo ($select_productos['name_pro']) ?></option>
						<?php
						} while ($select_productos = $productos->fetch(PDO::FETCH_ASSOC));
						?>

					</select>
					<div class="mt-4">
						<input class="btn btn-info" type="submit" value="Agregar producto">
						<input type="hidden" name="MM_insert" value="formreg">
					</div>

				</form>
				<br><br>
				<ul id="lista"></ul>
				<table class="table table-bordered">
					<thead>
						<tr>

							<th>Código</th>
							<th>Nombre Producto</th>
							<th>Precio Producto</th>
							<th>marca</th>
							<th>Total</th>
							<th>Cantidad</th>
							<th>quitar</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($_SESSION["productCart"] as $indice => $producto) {
							$granTotal += $producto->total;
						?>
							<tr>
								<td><?php echo $producto->codigo ?></td>
								<td><?php echo $producto->name_pro ?></td>
								<td><?php echo $producto->precio ?></td>
								<td><?php echo $producto->marca ?></td>
								<td><?php echo $producto->total ?></td>
								<td><?php echo $producto->cantidad ?></td>
								<td><a class="btn btn-danger" href="<?php echo "quitarProducto.php?indice=" . $indice ?>" Style='color:white;'>Eliminar<i class="fa fa-trash"></i></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

			<!-- FORMULARIO PARA AGREGAR SOLO DOCUMENTOS -->


			<div class="content" id="content2">
				<form method="post" name="formDocuments" action="agregarCarritoCompleto.php">
					<label for="codigo">Código de barras:</label>

					<select class="form-control" name="codigo" required id="control">
						<option value="">Seleccionar seguro:</option>
						<?php
						do {
						?>
							<option value="<?php echo ($select_documents['codigo']) ?>"><?php echo ($select_documents['nombre']) ?></option>
						<?php
						} while ($select_documents = $documents->fetch(PDO::FETCH_ASSOC));
						?>

					</select>
					<div class="mt-4">
						<input class="btn btn-info" type="submit" value="Agregar Seguro">
						<input type="hidden" name="addDocuments" value="formDocuments">
					</div>

				</form>
				<br><br>
				<ul id="lista"></ul>
				<table class="table table-bordered">
					<thead>
						<tr>

							<th>Código</th>
							<th>Seguro </th>
							<th>Precio Seguro</th>
							<th>Total</th>
							<th>quitar</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($_SESSION["documentCart"] as $indice => $document) {
							$granTotal += $document->total;
						?>
							<tr>
								<td><?php echo $document->codigo ?></td>
								<td><?php echo $document->nombre ?></td>
								<td><?php echo $document->precio ?></td>
								<td><?php echo $document->total ?></td>
								<td><a class="btn btn-danger" href="<?php echo "deleteDocument.php?indice=" . $indice ?>" Style='color:white;'>Eliminar<i class="fa fa-trash"></i></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

			<!-- FORMULARIO PARA AGREGAR SOLO SERVICIOS -->
			<div class="content" id="content3">
				<form method="post" name="formServices" action="agregarCarritoCompleto.php">
					<div class="form-group mt-3 text-xl-center">
						<p for="my-input">Solo se muestran los servicios que estan habilitados</p>

					</div>
					<label for="codigo">Código de barras:</label>

					<select class="form-control" name="codigo" required id="control">
						<option disabled selected value="">Seleccione un Servicio:</option>
						<?php
						do {
						?>
							<option value="<?php echo ($select_services['code_service']) ?>"><?php echo ($select_services['service']) ?></option>
						<?php
						} while ($select_services = $services->fetch(PDO::FETCH_ASSOC));
						?>

					</select>
					<div class="mt-4">
						<input class="btn btn-info" type="submit" value="Agregar servicio">
						<input type="hidden" name="addServices" value="formServices">
					</div>

				</form>
				<br><br>
				<ul id="lista"></ul>
				<table class="table table-bordered">
					<thead>
						<tr>

							<th>Código</th>
							<th>Nombre Servicio</th>
							<th>Precio del Servicio</th>
							<th>Total</th>
							<th>quitar</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($_SESSION["serviceCart"] as $indice => $servicio) {
							$granTotal += $servicio->total;
						?>
							<tr>
								<td><?php echo $servicio->code_service ?></td>
								<td><?php echo $servicio->service ?></td>
								<td><?php echo $servicio->costo_service ?></td>
								<td><?php echo $servicio->total ?></td>
								<td><a class="btn btn-danger" href="<?php echo "deleteService.php?indice=" . $indice ?>" Style='color:white;'>Eliminar<i class="fa fa-trash"></i></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

			<h3>Total: <?php echo $granTotal; ?></h3>

			<!-- FORMULARIO PARA TERMINAR LA VENTA COMPLETA -->

			<form action="./terminarVentaCompleta.php" method="POST" name="cartForm">
				<br>
				<label>Vendedor:</label>
				<select name="document" required class='form-control'>
					<option disabled selected value="">Seleccione el vendedor</option>
					<?php

					do {

					?>
						<option value=<?php echo ($name['document']) ?>?><?php echo ($name['name']) ?> </option>
					<?php
					} while ($name = $consul->fetch());

					?>
				</select>
				<br>
				<label>Placa de la Moto</label>
				<select name="placa" required class='form-control'>
					<option disabled selected value="">Seleccione la placa</option>
					<?php
					do {

					?>
						<option value=<?php echo ($placa['placa']) ?>><?php echo ($placa['placa']) ?> </option>
					<?php
					} while ($placa = $consul1->fetch());

					?>
				</select>

				<input name="total" type="hidden" value="<?php echo $granTotal; ?>">
				<br>

				<div class=" mb-4">

					<input type="submit" class="btn btn-info" value="Terminar Venta"></input>
					<input type="hidden" class="btn btn-info" value="cartForm" name="MM_forms"></input>
					<a href="./cancelarVentaCompleto.php" class="btn btn-danger">Cancelar venta</a>
				</div>

			</form>

		</div>
	</div>


	<?php

	require_once('formularios_crear.php');
	?>



	<!------main-content-end----------->

	<!----footer-design------------->

	<footer class="footer">
		<div class="container-fluid">
			<div class="footer-in">
				<p class="mb-0"> Derechos reservados &copy Sifer-App 2023</p>
			</div>
		</div>
	</footer>


	</div>
	</div>

	</div>

	<!-- AUTOCOMPLETE CON JSON PARA INVOCAR VALORES CON EL CODIGO DE BARRAS PARA TRAERSE TODA LA INFORMACION DE LOS PRODUCTOS -->

	<script src="../../controller/JS/peticiones.js"></script>





	<!-- BUSCADORES EN TIEMPO REAL DEL SELECT AL CUAL FUE ASIGNADO CON EL ID UNICO -->

	<script>
		$('#control').select2();
	</script>
	<!-------complete html----------->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="./js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".xp-menubar").on('click', function() {
				$("#sidebar").toggleClass('active');
				$("#content").toggleClass('active');
			});

			$('.xp-menubar,.body-overlay').on('click', function() {
				$("#sidebar,.body-overlay").toggleClass('show-nav');
			});

		});
	</script>


	<script>
		function toggleContent(contentId) {
			var content = document.getElementById(contentId);
			var allContents = document.getElementsByClassName('content');

			// Ocultar todos los contenidos
			for (var i = 0; i < allContents.length; i++) {
				allContents[i].style.display = 'none';
			}

			// Mostrar el contenido seleccionado
			content.style.display = 'block';
		}

		// Ocultar todos los contenidos, excepto el del Enlace 1
		var allContents = document.getElementsByClassName('content');
		for (var i = 1; i < allContents.length; i++) {
			allContents[i].style.display = 'none';
		}
	</script>

</body>

</html>