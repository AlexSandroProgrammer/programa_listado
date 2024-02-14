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
?>

<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formreg")) {
    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO
    $services = $_POST['service'];
    $costo_service = $_POST['costo_service'];
    $code_service = $_POST['code_service'];
    $state = $_POST['state'];



    $examinar = $connection->prepare("SELECT * FROM services WHERE service='$services' OR  code_service='$code_service'");
    $examinar->execute();
    $register_validation = $examinar->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {

        // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE

        echo '<script> alert ("//Estimado Usuario, el registro ya se encuentra registrado //");</script>';
        echo '<script> window.location= "service.php"</script>';
    } else if ($costo_service == "" || $costo_service == "" || $services == "" || $state == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert (" //Estimado usuario existen datos vacios. //");</script>';
        echo '<script> window.location= "service.php"</script>';
    } else {
        // DECISION QUE PERMITE REALIZAR EL ENVIO DE LA INFORMACION MEDIANTE LA BASE DE DATOS //
        $register_user = $connection->prepare("INSERT INTO services(service,costo_service,code_service,state, cantidad) VALUES ('$services','$costo_service','$code_service','$state',1)");
        $register_user->execute();
        echo '<script>alert("// Estimado Usuario el registro del nuevo servicio ha sido exitoso. //");</script>';
        echo '<script>window.location="lista_service.php"</script>';
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

    <link rel="stylesheet" href="./css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./css/2.css">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>REGISTRO SERVICIO || SIFER-APP</title>

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
            <h2 class="page-title"><span>REGISTRO DE SERVICIO</span></h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Datos</a></li>
                <li class="breadcrumb-item active" aria-curent="page">Servicio</li>
            </ol>
        </div>
    </div>
    </div>


    <!-- FORM CONTAINER -->

    <div class="container-fluid">
        <div class="col-xs-12 mt-4 ">


            <form method="POST" name="formreg" action="" autocomplete="off">

                <!-- Container: Codigo servicio -->

                <div class="form-group">
                    <label for="codeservice" class="formulario__label">Codigo Servicio</label>
                    <div class="formulario__grupo-input">
                        <input autofocus type="number" class="formulario__input" maxlength="5" oninput="maxlengthNumber(this)" name="code_service" required id="id" placeholder="Ingrese el nuevo codigo del servicio">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div> 
                    <p class="formulario__input-error">El codigo del servicio debe contener solo numeros.</p>
                </div>

                <div class="form-group">
                    <!-- Container: Nuevo Servicio -->

                    <label for="username" class="formulario__label">Nuevo Servicio</label>
                    <div class="formulario__grupo-input">
                        <input type="text" onkeypress="return(multipletext(event));" class="formulario__input" maxlength="20" oninput="maxlengthNumber(this)" name="service" required id="categoria" placeholder="Ingrese el nuevo servicio">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El nuevo servicio debe contener solo letras, no se permiten numeros.</p>
                </div>

                <div class="form-group">
                    <!-- Container: Costo Servicio -->
                    <label for="username" class="formulario__label">Costo Servicio</label>
                    <div class="formulario__grupo-input">
                        <input type="number" class="formulario__input" maxlength="6" oninput="maxlengthNumber(this)" name="costo_service" required id="costo" placeholder="Ingrese el nuevo modelo">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El costo debe ser como minimo de 4 numeros y maximo de 6 numeros</p>
                </div>


                <input type="hidden" class="formulario__input" maxlength="6" oninput="maxlengthNumber(this)" value="1" name="state" required id="costo" placeholder="Ingrese el nuevo modelo">

                <div class="mt-4">
                    <input type="submit" name="validar" value="Crear" class="btn btn-info"></input>
                    <input type="hidden" name="MM_insert" value="formreg">
                    <a href="lista_service.php" class="btn btn-warning">Regresar</a>
                </div>
            </form>

        </div>
    </div>


    <?php
    require_once('./formularios_crear.php');

    ?>


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

            letras = "q wertyuiopasdfghjklñzxcvbnm";

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

    <script src="../../controller/JS/crear.js"></script>
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