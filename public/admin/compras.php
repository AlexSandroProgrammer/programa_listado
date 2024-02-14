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


// SE HACE ENVIO DEL NUMERO DE DOCUMENTO POR EL METODO GET Y SE LE ASIGNA ESE VALOR A OTRA VARIABLE
$producto = $_GET['producto'];


$comprar_productos = $connection->prepare("SELECT * FROM productos INNER JOIN marca ON productos.id_marca = marca.id_marca AND productos.id_marca=marca.id_marca WHERE productos.id = '$producto'");
$comprar_productos->execute();
$comprar = $comprar_productos->fetch(PDO::FETCH_ASSOC);

?>
<?php


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formreg")) {



	$idProduct = $_POST['idProduct'];
	$cantidad = $_POST['cantidadActual'];
	$agregar = $_POST['agregar'];
	$cantidad_Final = $cantidad + $agregar;


	if ($cantidad_Final >= 50) {
		echo '<script>alert ("La compra no se puede realizar ya que supera el limite de 50 unidades ");</script>';
		echo '<script>window.location="lista_products.php"</script>';
	} else {
		$db_validation = $connection->prepare("SELECT * FROM productos WHERE id = '$idProduct'");
		$db_validation->execute();

		$register_validation = $db_validation->fetchAll();

		if ($register_validation) {
			$actu_update = $connection->prepare("UPDATE productos SET cantidad = '$cantidad_Final' WHERE id = '$idProduct'");
			if ($actu_update->execute()) {
				echo '<script>alert ("Compra Exitosa");</script>';
				echo '<script>window.location="lista_products.php"</script>';
			} else {
				echo '<script>alert ("No se realizo la compra");</script>';
				echo '<script>window.location="lista_products.php"</script>';
			}
		} elseif ($agregar == "" || $cantidad_Final == "") {

			echo '<script>alert ("Debes ingresar todos los datos");</script>';
			echo '<script>windows.location="lista_products.php"</script>';
		} else {
			echo '<script>alert ("Estimado Usuario el producto no se encuentra registrado.");</script>';
			echo '<script>windows.location="lista_products.php"</script>';
		}
	}
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
	<title>COMPRAR PRODUCTO</title>
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
			<h1>Comprar <?php echo $comprar['name_pro'] ?> </h1>

			<form method="POST" autocomplete="off" action="">


				<input type="hidden" name="idProduct" value="<?php echo $comprar['id'] ?>">
				<!-- Container: BarCode -->
				<div class="form-group">
					<label for="document" class="formulario__label">Nombre Producto</label>
					<div class="formulario__grupo-input">
						<input type="text" value="<?php echo $comprar['name_pro'] ?>" readonly placeholder="Escribe el codigo" class="formulario__input" required>
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
				</div>

				<!-- Container: Cantidad Producto -->
				<div class="form-group">
					<label for="document" class="formulario__label">Cantidad Actual:</label>
					<div class="formulario__grupo-input">
						<input type="number" maxlength="4" value="<?php echo $comprar['cantidad'] ?>" readonly minlength="1" oninput="maxlengthNumber(this);" placeholder="Ingrese por favor la cantidad" oninput="maxlengthNumber(this);" onkeypress="return(multiplenumber(event));" class="formulario__input" name="cantidadActual" id="cantidad" required>
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
				</div>

				<!-- Container: Cantidad Producto -->
				<div class="form-group">
					<label for="document" class="formulario__label">Agregar Cantidad:</label>
					<div class="formulario__grupo-input">
						<input type="number" maxlength="4" autofocus minlength="1" autofocus oninput="maxlengthNumber(this);" placeholder="Ingrese por favor la cantidad" oninput="maxlengthNumber(this);" onkeypress="return(multiplenumber(event));" class="formulario__input" name="agregar" id="cantidad" required>
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
				</div>
				<br>


				<input type="submit" name="validar" value="Comprar <?php echo $comprar['name_pro'] ?>" class="btn btn-info mb-4">
				<input type="hidden" name="MM_insert" value="formreg">
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