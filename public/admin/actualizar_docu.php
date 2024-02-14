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

$actu_documento = $_GET['id_documento'];

$sql = $connection->prepare("SELECT * FROM user,type_user WHERE  username ='" . $_SESSION['usuario'] . "' AND user.id_type_user = type_user.id_type_user");
$sql->execute();
$usua = $sql->fetch(PDO::FETCH_ASSOC);
$select_docu = $connection->prepare("SELECT * FROM documentos WHERE id_documento = '$actu_documento'");
$select_docu->execute();
$documento_data = $select_docu->fetch(PDO::FETCH_ASSOC);

?>

<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formreg")) {
    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO
    $id_documento = $_POST['id_documento'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];


    $exami = $connection->prepare("SELECT * FROM documentos WHERE id_documento='$actu_documento'");
    $exami->execute();
    $register_validation = $exami->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {

        $update = $connection->prepare("UPDATE documentos SET id_documento='$id_documento', nombre='$nombre', precio='$precio' WHERE id_documento='$actu_documento'");
        $update->execute();
        // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE  
        echo '<script> alert ("//Estimado Usuario la actualizacion se ha realizado con exito //");</script>';
        echo '<script> window.location= "lista_documento.php"</script>';
    } else if ($id_documento == "" || $nombre == "" || $precio == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert (" //Estimado usuario existen datos vacios. //");</script>';
        echo '<script> windows.location= "actualizar_docu.php"</script>';
    } else {

        echo '<script>alert("// Estimado Usuario la actualizacion no se realizo correctamente. //");</script>';
        echo '<script>windows.location="actualizar_docu.php"</script>';
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
    <title>LISTA DE USUARIOS</title>
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
        <?php

        require_once('menu.php');
        ?>


        <div class="xp-breadcrumbbar text-center">
            <h2 class="page-title"><span>Bienvenido <?php echo $usua['type_user'] ?> <?php echo $usua['name'] ?></span></h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Actualizar</a></li>
                <li class="breadcrumb-item active" aria-curent="page">Seguro</li>
            </ol>
        </div>

    </div>
    </div>

    <!-- FORM CONTAINER -->
    <div class="container-fluid">
        <div class="col-xs-12 mt-4">


            <form method="POST" name="formreg" action="" autocomplete="off">

                <!-- Container: Code Document -->

                <div class="form-group">
                    <label for="document" class="formulario__label">Codigo de Seguro</label>
                    <div class="formulario__grupo-input">
                        <input autofocus type="number" autofocus value="<?php echo $actu_documento ?>" readonly maxlength="3" oninput="maxlengthNumber(this);" class="formulario__input" name="id_documento" id="id" required placeholder="Ingrese el codigo del documento legal">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El codigo de modelo debe contener solo 3 numeros</p>
                </div>

                <div class="form-group">
                    <!-- Container: Document -->

                    <label for="username" class="formulario__label">Nombre Seguro</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" value="<?php echo $documento_data['nombre'] ?>" readonly maxlength="20" oninput="mayusculas();" name="nombre" required id="marca" placeholder="Ingrese nombre">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">solo se permiten letras y maximo de 20 digitos.</p>
                </div>


                <div class="form-group">
                    <div class="formulario__grupo" id="grupo__modelos">
                        <label for="username" class="formulario__label">Precio</label>
                        <div class="formulario__grupo-input">
                            <input type="number" class="formulario__input" maxlength="6" value="<?php echo $documento_data['precio'] ?>" oninput="maxlengthNumber(this)" name="precio" required id="precio" placeholder="Ingrese el precio ">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">El nuevo modelo debe contener solo 4 numeros</p>
                    </div>
                </div>

                <div class=" mb-3">
                    <input type="submit" name="validar" value="Actualizar" class="btn btn-warning"></input>
                    <input type="hidden" name="MM_insert" value="formreg">
                    <a href="index.php" class="btn btn-danger">Regresar</a>
                </div>
            </form>


        </div>
    </div>

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

            letras = "qwertyuiopasdfghjklñzxcvbnm";

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
        function mayusculas() {
            let input = document.getElementById("marca");
            input.value = input.value.toUpperCase();
        }
    </script>

    <script src="../../controller/JS/crear.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>

</html>