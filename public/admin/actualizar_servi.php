<?php
session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection = $db->conectar();

require_once('../../controller/validarSesion.php');

if (isset($_POST['btncerrar'])) {
    session_destroy();
    header("Location:../../index.php");
}


$sql = $connection->prepare("SELECT * FROM user,type_user WHERE  username ='" . $_SESSION['usuario'] . "' AND user.id_type_user = type_user.id_type_user");
$sql->execute();
$usua = $sql->fetch(PDO::FETCH_ASSOC);

$control = $connection->prepare("SELECT * FROM type_user");
$control->execute();
$fila = $control->fetch(PDO::FETCH_ASSOC);

$select_gender = $connection->prepare("SELECT * FROM gender");
$select_gender->execute();
$gender = $select_gender->fetch(PDO::FETCH_ASSOC);
?>
<?php

$select_state = $connection->prepare("SELECT * from state");
$select_state->execute();
$state_update = $select_state->fetch(PDO::FETCH_ASSOC);


?>



<?php
$register_update = $connection->prepare("SELECT * FROM services WHERE id_services = '" . $_GET['id_services'] . "'");
$register_update->execute();
$fiels = $register_update->fetch(PDO::FETCH_ASSOC);

?>


<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formreg")) {
    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO
    $encriptaciones = [
        'cost' => 15
    ];

    $servi = $_POST['id_services'];
    $ser = $_POST['service'];
    $costo = $_POST['costo_service'];


    // CONSULTA SQL PARA VERIFICAR SI EL USUARIO YA EXISTE EN LA BASE DE DATOS
    $examinar = $connection->prepare("SELECT * FROM services WHERE code_service= '$servi'");
    $examinar->execute();
    $register_validation = $examinar->fetchAll(PDO::FETCH_ASSOC);

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {

        $actu_update = $connection->prepare("UPDATE services SET service='$ser', costo_service='$costo' WHERE id_services = '" . $_GET['id_services'] . "'");
        $actu_update->execute();
        echo '<script>alert ("Actualizacion Exitosa, Gracias");</script>';
        echo '<script>window.location="./lista_service.php"</script>';
    } else {


    }
}



?>
<!-- ESTRUCTURA DEL FORMULARIO DE ACTUALIZACION HTML -->
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
    <title>ACTUALIZAR MOTO</title>
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

        require_once('./menu.php');
        ?>

        <div class="xp-breadcrumbbar text-center">
            <h2 class="page-title"><span>ACTUALIZACION DE SERVICIO</span></h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Datos</a></li>
                <li class="breadcrumb-item active" aria-curent="page">Servicio</li>
            </ol>
        </div>
    </div>
    </div>

    <div class="container-fluid">
        <div class="col-xs-12 mt-4">
            <form method="POST" name="formreg" action="" autocomplete="off">

                <!-- Group: BarCode -->

                <div class="form-group">
                    <label for="service" class="formulario__label">Nombre servicio</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" readonly name="id_services" required id="service" value="<?php echo $fiels['code_service'] ?>" placeholder="Ingrese sus nombres">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Debe ingresar su nombre completo, o en preferencia su primer nombre y apellido.</p>

                </div>

                <!-- Group: Nombre -->

                <div class="form-group">
                    <label for="service" class="formulario__label">Nombrel servicio</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" readonly name="service" required id="service" value="<?php echo $fiels['service'] ?>" placeholder="Ingrese sus nombres">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Debe ingresar su nombre completo, o en preferencia su primer nombre y apellido.</p>
                </div>

                <!-- Group: COSTO SERVICIO -->

                <div class="form-group">
                    <label for="costo_service" class="formulario__label">costo del servicio</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="costo_service" value="<?php echo $fiels['costo_service'] ?>" required id="costo_service" placeholder="Ingrese su nombre">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El usuario tiene que ser de 4 a 10 dígitos y solo puede contener numeros, letras y guion bajo.</p>

                </div>

                <div class="mt-4">
                    <input type="submit" name="validar" value="Crear" class="btn btn-info"></input>
                    <input type="hidden" name="MM_insert" value="formreg">
                    <a href="lista_service.php" class="btn btn-warning">Regresar</a>
                </div>
            </form>
        </div>
    </div>


    <script src="../../controller/JS/formulario.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

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

</body>

</html>