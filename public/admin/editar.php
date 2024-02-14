<?php
session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection = $db->conectar();
$sql = $connection->prepare("SELECT * FROM user,type_user WHERE  username ='" . $_SESSION['usuario'] . "' AND user.id_type_user = type_user.id_type_user");
$sql->execute();
$usua = $sql->fetch(PDO::FETCH_ASSOC);
$query = $connection->prepare("SELECT * FROM marca");
$query->execute();
$fila = $query->fetch();

if (!isset($_GET["id"])) exit();
$id = $_GET["id"];

$sentencia = $connection->prepare("SELECT * FROM productos INNER JOIN state INNER JOIN marca WHERE id = '$id' AND productos.id_estado = state.id_state AND productos.id_marca = marca.id_marca");
$sentencia->execute();
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if ($producto === FALSE) {
	echo "¡No existe algún producto con ese ID!";
	exit();
}

require_once("../../controller/validarSesion.php");

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

	<link rel="stylesheet" href="./css/2.css">
	<link rel="stylesheet" href="./css/estilo.css">
	<title>ACTUALIZAR PRODUCTO SIFER-APP</title>
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

		<?php

		require_once('./menu.php');


		?>

		<div class="xp-breadcrumbbar text-center">
			<h2 class="page-title"><span>Bienvenido <?php echo $usua['type_user'] ?> <?php echo $usua['name'] ?></span></h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Actualizar</a></li>
				<li class="breadcrumb-item active" aria-curent="page">Productos</li>
			</ol>
		</div>

	</div>
	</div>
	<div class="col-xs-12">
		<h1>Editar producto <?php echo $producto->name_pro; ?></h1>
		<form method="POST" name="formUpdate" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">

			<!-- Container: BarCode -->
			<div class="form-group">
				<label for="document" class="formulario__label">Codigo de Barras:</label>
				<div class="formulario__grupo-input">
					<input type="number" maxlength="10" value="<?php echo $producto->codigo ?>" readonly autofocus minlength="5" oninput="maxlengthNumber(this);" placeholder="Escribe el codigo" oninput="maxlengthNumber(this);" onkeypress="return(multiplenumber(event));" class="formulario__input" name="codigo" id="codigo" required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
			</div>

			<div class="form-group">
				<!-- Container: Name Product -->
				<label for="name" class="formulario__label">Nombre Producto:</label>
				<div class="formulario__grupo-input">
					<input type="text" minlength="4" readonly class="formulario__input" oninput="soloLetrasEspacios(event)" value='<?php echo $producto->name_pro ?>' maxlength="20" name="name" required id="name" placeholder="Ingrese nombre de producto">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
			</div>

			<div class="form-group">
				<!-- Container: State Product -->
				<label for="name" class="formulario__label">Estado Actual:</label>
				<div class="formulario__grupo-input">
					<input type="text" minlength="4" readonly class="formulario__input" readonly oninput="soloLetrasEspacios(event)" value='<?php echo $producto->state ?>' maxlength="20" required placeholder="Ingrese nombre de producto">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
			</div>


			<?php

			$states = $connection->prepare("SELECT * FROM state");
			$states->execute();
			$state = $states->fetch();

			?>

			<div class="form-group">
				<label for="tipousuario" class="formulario__label ">Cambiar Estado</label>
				<div class="formulario__grupo__input">

					<select name="id_estado" class="formulario__input">
						<option value="<?php echo $producto->id_estado ?>"> Seleccione estado</option>
						<?php
						do {
						?>
							<option value=<?php echo ($state['id_state']) ?>><?php echo ($state['state']) ?> </option>
						<?php
						} while ($state = $states->fetch());

						?>
					</select>
				</div>
			</div>

			<!-- Container: Precio Producto -->
			<div class="form-group">
				<label for="document" class="formulario__label">Precio de Producto:</label>
				<div class="formulario__grupo-input">
					<input type="number" value="<?php echo $producto->precio ?>" maxlength="10" minlength="3" oninput="maxlengthNumber(this);" placeholder="Ingrese precio de producto" oninput="maxlengthNumber(this);" onkeypress="return(multiplenumber(event));" class="formulario__input" name="precio" id="precio" required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
			</div>


			<div class="form-group">
				<!-- Container: Name Product -->
				<label for="name" class="formulario__label">Marca Actual:</label>
				<div class="formulario__grupo-input">
					<input type="text" minlength="4" readonly class="formulario__input" oninput="soloLetrasEspacios(event)" value='<?php echo $producto->marca ?>' maxlength="20" name="name" required id="name" placeholder="Ingrese nombre de producto">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
			</div>


			<div class="form-group">
				<label for="tipousuario" class="formulario__label ">Cambiar Marca</label>
				<div class="formulario__grupo__input">

					<select name="marca" class="formulario__input">
						<option value="<?php echo $producto->id_marca ?>"> Seleccione nueva marca</option>
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
					<input type="number" readonly value="<?php echo $producto->cantidad ?>" maxlength="4" autofocus minlength="1" oninput="maxlengthNumber(this);" placeholder="Ingrese por favor la cantidad" oninput="maxlengthNumber(this);" onkeypress="return(multiplenumber(event));" class="formulario__input" name="cantidad" id="cantidad" required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
			</div>


			<!-- Container: Cantidad Producto -->
			<div class="form-group">
				<label for="document" class="formulario__label">Agregar Cantidad:</label>
				<div class="formulario__grupo-input">
					<input type="number" maxlength="4" autofocus minlength="1" oninput="maxlengthNumber(this);" placeholder="Agregar cantidad" oninput="maxlengthNumber(this);" onkeypress="return(multiplenumber(event));" class="formulario__input" name="cantidad_agregada" id="cantidad_agregada">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
			</div>
			<div class="container-fluid mb-4">
				<br><br><input class="btn btn-info" type="submit" value="Guardar">
				<input class="btn btn-info" type="hidden" name="updateProducts" value="formUpdate">
				<a class="btn btn-warning" href="./lista_products.php">Cancelar</a>
			</div>
		</form>
	</div>

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