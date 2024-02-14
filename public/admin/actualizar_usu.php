<?php
session_start();
require_once("../../database/connection.php");
require_once("../../controller/validarSesion.php");

if (isset($_POST['btncerrar'])) {
	session_destroy();
	header("Location:../../index.php");
}
$db = new Database();
$connection = $db->conectar();
$sql = $connection->prepare("SELECT * FROM user,type_user WHERE  username ='" . $_SESSION['usuario'] . "' AND user.id_type_user = type_user.id_type_user");
$sql->execute();
$usua = $sql->fetch(PDO::FETCH_ASSOC);
$user_report = $connection->prepare("SELECT * FROM user INNER JOIN type_user INNER JOIN state INNER JOIN gender ON user.id_type_user = type_user.id_type_user AND user.id_gender=gender.id_gender AND user.id_state=state.id_state");
$user_report->execute();
$reporte = $user_report->fetch(PDO::FETCH_ASSOC);

?>
<?php
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
$register_update = $connection->prepare("SELECT * FROM user,type_user,state,gender WHERE document = '" . $_GET['documento'] . "' AND  user.id_type_user = type_user.id_type_user AND user.id_state = state.id_state AND user.id_gender = gender.id_gender");
$register_update->execute();
$fiels = $register_update->fetch(PDO::FETCH_ASSOC);

?>


<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formreg")) {


    $nombre = $_POST['name'];
    $apellido = $_POST['surname'];
    $usuario = $_POST['username'];
    $telefono = $_POST['telephone'];
    $email = $_POST['email'];
    $idusu = $_POST['id_type_user'];
    $state = $_POST['state'];

    $db_validation = $connection->prepare("SELECT * FROM user WHERE document= '" . $_GET['documento'] . "'");
    $db_validation->execute();
    $register_validation = $db_validation->fetchAll();
    if ($register_validation) {
        $actu_update = $connection->prepare("UPDATE user SET name = '$nombre', surname='$apellido',id_state = '$state', telephone='$telefono', email='$email',id_type_user = '$idusu',username = '$usuario' WHERE document = '" . $_GET['documento'] . "'");
        $actu_update->execute();
        echo '<script>alert ("Actualizacion Exitosa, Gracias");</script>';
        echo '<script>window.location="lista_usu.php"</script>';
    } elseif ($nombre == "" || $apellido == "" || $usuario == "" || $email == "" || $idusu == "" || $telefono == "") {

        echo '<script>alert ("Estimado Usuario existen datos vacios en la actualizacion");</script>';
        echo '<script>windows.location="actualizar_usu.php"</script>';
    } else {
        echo '<script>alert ("Estimado Usuario el nombre de usuario ya se encuentra registrado, para realizar la actualizacion debe cambiarlo.");</script>';
        echo '<script>windows.location="actualizar_usu.php"</script>';
    }
}



?>
<!-- ESTRUCTURA DEL FORMULARIO DE REGISTRO HTML -->
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
    <title>ACTUALIZACION USUARIO <?php echo $fiels['document'] ?></title>
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
                <li class="breadcrumb-item"><a href="#">lista</a></li>
                <li class="breadcrumb-item active" aria-curent="page">Usuarios</li>
            </ol>
        </div>

    </div>
    </div>

    <div class="container-fluid  mt-4">

        <div class="col-xs-12 ml-2 mr-2">
            <form method="POST" name="formreg" action="" autocomplete="off">

                <!-- Group: Document -->
                <div class="form-group">
                    <label for="document" class="formulario__label">Numero de documento</label>
                    <div class="formulario__grupo-input">
                        <input type="number" class="formulario__input" name="document" maxlength="10" oninput="maxlengthNumber(this);" readonly value="<?php echo $fiels['document'] ?>" id="document" required placeholder="Ingrese su numero de documento">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El numero de documento debe ser de 6 a 10 numeros.</p>
                </div>


                <!-- Group: Nombre -->

                <div class="form-group">
                    <label for="name" class="formulario__label">Primer Nombre</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="name" required id="name" maxlength="20" oninput="maxlengthNumber(this);" onkeypress="return(multipletext(event));" value="<?php echo $fiels['name'] ?>" placeholder="Ingrese sus nombres">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Debe ingresar solo el primer nombre y se aceptan solo letras.</p>
                </div>


                <div class="form-group">
                    <!-- Group: Apellido -->

                    <label for="name" class="formulario__label">Primer Apellido</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="surname" required maxlength="20" oninput="maxlengthNumber(this);" onkeypress="return(multipletext(event));" id="surname" value="<?php echo $fiels['surname'] ?>" placeholder="Ingrese sus nombres">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Debe ingresar solo el primer apellido y se aceptan solo letras.</p>
                </div>

                <div class="form-group">
                    <!-- Group: Username -->

                    <label for="username" class="formulario__label">Nombre de Usuario</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="username" maxlength="12" oninput="maxlengthNumber(this);" value="<?php echo $fiels['username'] ?>" required id="username" placeholder="Ingrese su nombre">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El usuario tiene que ser de 4 a 10 dígitos y solo puede contener numeros, letras y guion bajo.</p>

                </div>

                <!-- Group: telephone -->

                <div class="form-group">
                    <label for="telephone" class="formulario__label">Numero de Telefono</label>
                    <div class="formulario__grupo-input">
                        <input type="number" class="formulario__input" name="telephone" maxlength="10" oninput="maxlengthNumber(this);" value="<?php echo $fiels['telephone'] ?>" required id="telephone" placeholder="Ingrese su numero de contacto">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                </div>


                <!-- Group: email -->

                <div class="form-group">
                    <label for="email" class="formulario__label">Correo Electronico</label>
                    <div class="formulario__grupo-input">
                        <input type="email" class="formulario__input" maxlength="30" oninput="maxlengthNumber(this);" name="email" value="<?php echo $fiels['email'] ?>" required id="email" placeholder="Ingrese su correo electronico">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                </div>

                <div class="form-group">
                    <!-- Group Type User -->
                    <label for="tipousuario" class="formulario__label label">Tipo de Usuario</label>
                    <div class="formulario__grupo__input">
                        <select name="id_type_user" class="formulario__input">
                            <option value="<?php echo $fiels['id_type_user'] ?>">Actualmente es <?php echo $fiels['type_user'] ?></option>

                            <?php
                            do {
                            ?>
                                <option value="<?php echo ($fila['id_type_user']) ?>"><?php echo ($fila['type_user']) ?></option>


                            <?php
                            } while ($fila = $control->fetch(PDO::FETCH_ASSOC));
                            ?>
                        </select>
                    </div>
                </div>


                <!-- Group State -->
                <div class="form-group">

                    <label for="tipousuario" class="formulario__label label">Estado Usuario</label>
                    <div class="formulario__grupo__input">
                        <select name="state" class="formulario__input">
                            <option value="<?php echo $fiels['id_state'] ?>">Actualmente es <?php echo $fiels['state'] ?></option>
                            <?php
                            do {
                            ?>
                                <option value="<?php echo ($state_update['id_state']) ?>"><?php echo ($state_update['state']) ?></option>

                            <?php
                            } while ($state_update = $select_state->fetch(PDO::FETCH_ASSOC));
                            ?>
                        </select>
                    </div>
                </div>

                <div class="mt-3 mb-3">
                    <input type="submit" name="validar" value="Actualizar" class="btn btn-info">
                    <input type="hidden" name="MM_insert" value="formreg">
                    <a href="lista_usu.php" class="btn btn-success">Regresar</a>
                </div>
            </form>
        

        </div>

    </div>


    <!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO EL NUMERO VALORES REQUERIDOS DE ACUERDO A LA LONGITUD MAXLENGTH DEL CAMPO -->

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

    <script src="../../controller/JS/formulario.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>

</html>