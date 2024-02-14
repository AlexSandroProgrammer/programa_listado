<?php

session_start();
require_once("../../database/connection.php");
$db = new Database();

$connection = $db->conectar();

$sql = $connection->prepare("SELECT * FROM user,type_user WHERE  username ='" . $_SESSION['usuario'] . "' AND user.id_type_user = type_user.id_type_user");
$sql->execute();
$usua = $sql->fetch(PDO::FETCH_ASSOC);
$user_report = $connection->prepare("SELECT * FROM user INNER JOIN type_user INNER JOIN state INNER JOIN gender ON user.id_type_user = type_user.id_type_user AND user.id_gender=gender.id_gender AND user.id_state=state.id_state");
$user_report->execute();
$reporte = $user_report->fetch(PDO::FETCH_ASSOC);
$connection = $db->conectar();
$query = $connection->prepare("SELECT * FROM marca");
$query->execute();
$fila = $query->fetch();
$comando = $connection->prepare("SELECT * FROM datetime_entry INNER JOIN user INNER JOIN type_user ON datetime_entry.document = user.document AND user.id_type_user = type_user.id_type_user ORDER BY id_entry  DESC LIMIT 6");
$comando->execute();
$resultado = $comando->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['btncerrar'])) {
	session_destroy();
	header("Location:../../index.php");
}

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
	<title>CREAR PRODUCTO</title>
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

</head>

<body>
	<div class="wrapper">

		<!-------sidebar--design- close----------->

		<?php

		include('./menu.php');
		?>

		<div class="xp-breadcrumbbar text-center">
			<h2 class="page-title"><span>Bienvenido <?php echo $usua['type_user'] ?> <?php echo $usua['name'] ?></span></h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Datos</a></li>
				<li class="breadcrumb-item active" aria-curent="page">Productos</li>
			</ol>
		</div>
	</div>
	</div>

	<div class=" container-fluid mt-4">
		<div class="col-xs-12 m-auto">
			<h1>Nuevo producto</h1>
			<form method="POST" autocomplete="off" action="nuevo.php">

				<!-- Container: BarCode -->
				<div class="form-group">
					<label for="document" class="formulario__label">Codigo de Barras:</label>
					<div class="formulario__grupo-input">
						<input type="number" maxlength="10" autofocus minlength="5" oninput="maxlengthNumber(this);" placeholder="Escribe el codigo" oninput="maxlengthNumber(this);" onkeypress="return(multiplenumber(event));" class="formulario__input" name="codigo" id="codigo" required>
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
				</div>


				<div class="form-group">
					<!-- Container: Name Product -->

					<label for="name" class="formulario__label">Nombre Producto:</label>
					<div class="formulario__grupo-input">
						<input type="text" minlength="4" class="formulario__input" oninput="soloLetrasEspacios(event)" maxlength="20" name="name" required id="name" placeholder="Ingrese nombre de producto">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
				</div>


				<!-- Container: Precio Producto -->
				<div class="form-group">
					<label for="document" class="formulario__label">Precio de Producto:</label>
					<div class="formulario__grupo-input">
						<input type="number" maxlength="10" minlength="3" oninput="maxlengthNumber(this);" placeholder="Ingrese precio de producto" oninput="maxlengthNumber(this);" onkeypress="return(multiplenumber(event));" class="formulario__input" name="precio" id="precio" required>
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
				</div>

				<div class="form-group">
					<label for="tipousuario" class="formulario__label ">Marca de Producto</label>
					<!-- Botón para mostrar la ventana emergente (Modal) -->
					<button type="button" data-toggle="modal" class="btn btn-dark btn-sm m-2" data-target="#formularioMarcaProducto">
						+Crear
					</button>
					<div class="formulario__grupo__input">

						<select name="marca" class="formulario__input">
							<option value="">Seleccione Marca de producto</option>
							<?php
							do {
							?>
								<option value=<?php echo ($fila['id_marca']) ?>><?php echo ($fila['marca']) ?> </option>
							<?php
							} while ($fila = $query->fetch());

							?>
						</select>
					</div>
				</div>

				<!-- Container: Cantidad Producto -->
				<div class="form-group">
					<label for="document" class="formulario__label">Cantidad:</label>
					<div class="formulario__grupo-input">
						<input type="number" maxlength="4" autofocus minlength="1" oninput="maxlengthNumber(this);" placeholder="Ingrese por favor la cantidad" oninput="maxlengthNumber(this);" onkeypress="return(multiplenumber(event));" class="formulario__input" name="cantidad" id="cantidad" required>
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
				</div>
				<br>
				<input class="btn btn-info mb-4 border" type="submit" value="Guardar">
				<a href="./lista_products.php" class="btn btn-danger mb-4 border ">Cancelar</a>
			</form>
		</div>

	</div>

	<?php
	require_once('./formularios_crear.php');
	?>

	<!-- jQuery, Popper.js, Bootstrap JS -->
	<script src="jquery/jquery-3.3.1.min.js"></script>
	<script src="popper/popper.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<!-- datatables JS -->
	<script type="text/javascript" src="datatables/datatables.min.js"></script>
	<script>
		function maxlengthNumber(obj) {

			if (obj.value.length > obj.maxLength) {
				obj.value = obj.value.slice(0, obj.maxLength);
				alert("Debe ingresar solo el numeros de digitos requeridos");
			}
		}
	</script>

	<script>
		function maxcelNumber(obj) {

			if (obj.value.length > obj.maxLength) {
				obj.value = obj.value.slice(0, obj.maxLength);
				alert("Debe ingresar solo 10 numeros.");
			}
		}
	</script>
	<!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO LETRAS -->

	<script>
		function multipletext(e) {
			key = e.keyCode || e.which;

			teclado = String.fromCharCode(key).toLowerCase();

			letras = "qwertyuiopasdfghjklñzxcvbnm ";

			especiales = "8-37-38-46-164-46";

			teclado_especial = false;

			for (var i in especiales) {
				if (key == especiales[i]) {
					teclado_especial = true;
					alert("Debe ingresar solo letras y espacios en el campo");

					break;
				}
			}

			if (letras.indexOf(teclado) == -1 && !teclado_especial) {
				return false;
				alert("Debe ingresar solo letras y espacios en el campo");
			}
		}
	</script>

	<script>
		function solonumeros(evt) {
			if (window.event) {
				keynum = evt.keyCode;
			} else {
				keynum = evt.wich;
			}
		}
	</script>
	<!-- para usar botones en datatables JS -->
	<script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
	<script src="datatables/JSZip-2.5.0/jszip.min.js"></script>
	<script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
	<script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
	<script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

	<!-- código JS propìo-->
	<script type="text/javascript" src="main.js"></script>
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
</body>

</html>