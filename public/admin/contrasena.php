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

$comando = $connection->prepare("SELECT * FROM datetime_entry INNER JOIN user INNER JOIN type_user ON datetime_entry.document = user.document AND user.id_type_user = type_user.id_type_user ORDER BY id_entry  DESC LIMIT 6");
$comando->execute();
$resultado = $comando->fetch(PDO::FETCH_ASSOC);

require_once('../../controller/validarSesion.php');

if (isset($_POST['btncerrar'])) {
    session_destroy();
    header("Location:../../index.php");
}
?>
<?php
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
    // Ensure that $acumulador is initialized
    $acumulador = 0;

    // DECLARATION OF THE VALUES OF THE VARIABLES DEPENDING ON THE FIELD TYPE IN THE FORM
    $password = $_POST['password'];
    $passwordTwo = $_POST['password2'];
    $docu_user = $_SESSION['id_user'];

    // Use prepared statements to avoid SQL injection
    $passwordUser = $connection->prepare("SELECT * FROM user WHERE document = :docu_user");
    $passwordUser->bindParam(':docu_user', $docu_user);
    $passwordUser->execute();
    $passUser = $passwordUser->fetch(PDO::FETCH_ASSOC);

    if ($_POST['password'] == "" || $_POST['password2'] == "") {
        echo '<script>alert("datos vacios no ingreso la nueva clave.");</script>';
        echo '<script>window.location="recuperar_contrasena.php"</script>';
    } elseif ($password !== $passwordTwo) {
        echo '<script>alert("las contraseñas son diferentes, deben ser iguales.");</script>';
        echo '<script>window.location="recuperar_contrasena.php"</script>';
    } elseif (password_verify($password, $passUser['password'])) {
        echo '<script>alert("La contraseña ya fue registrada anteriormente.");</script>';
        echo '<script>window.location="recuperar_contrasena.php"</script>';
    } elseif (!empty($password)) {

        $passwordsTrigger = $connection->prepare("SELECT * FROM trigger_user WHERE document = :docu_user GROUP BY document HAVING COUNT(*) <= 5");
        $passwordsTrigger->bindParam(':docu_user', $docu_user);
        $passwordsTrigger->execute();
        $passTrigger = $passwordsTrigger->fetchAll(PDO::FETCH_ASSOC);

        if (empty($passTrigger)) {
            // encriptacion de la contraseña
            $encriptaciones = ['cost' => 15];
            $contra = password_hash($password, PASSWORD_DEFAULT, $encriptaciones);

            // actualizacion de la contraseña en la base de datos
            $update_pass = $connection->prepare("UPDATE user SET password = :contra WHERE document = :docu_user");
            $update_pass->bindParam(':contra', $contra);
            $update_pass->bindParam(':docu_user', $docu_user);
            $update_pass->execute();
            echo '<script>alert("la contraseña ha sido actualizada correctamente.");</script>';
            echo '<script>window.location="../index.php"</script>';
        } else {
            foreach ($passTrigger as $passAuth) {

                if ((password_verify($password, $passAuth['password']))) {

                    $acumulador += 1;

                    if ($acumulador > 0) {
                        echo '<script>alert("la contraseña ya fue registrada anteriormente, ingresa otra por favor");</script>';
                        echo '<script>window.location="recuperar_contrasena.php"</script>';
                    } else {

                        // Hash the password
                        $bcrypt = ['cost' => 15];
                        $contra = password_hash($password, PASSWORD_DEFAULT, $bcrypt);

                        // Update the password in the database
                        $actu_update = $connection->prepare("UPDATE user SET password = :contra WHERE document = :docu_user");
                        $actu_update->bindParam(':contra', $contra);
                        $actu_update->bindParam(':docu_user', $docu_user);
                        $actu_update->execute();
                        echo '<script>alert("la contraseña ha sido actualizada correctamente.");</script>';
                        echo '<script>window.location="../index.php"</script>';
                    }
                } else {
                    // encriptacion de la contraseña
                    $encriptaciones = ['cost' => 15];
                    $contra = password_hash($password, PASSWORD_DEFAULT, $encriptaciones);

                    // actualizacion de la contraseña en la base de datos
                    $update_pass = $connection->prepare("UPDATE user SET password = :contra WHERE document = :docu_user");
                    $update_pass->bindParam(':contra', $contra);
                    $update_pass->bindParam(':docu_user', $docu_user);
                    $update_pass->execute();
                    echo '<script>alert("la contraseña ha sido actualizada correctamente.");</script>';
                    echo '<script>window.location="../index.php"</script>';
                }
            }
        }
    } else {
        // encriptacion de la contraseña
        $encriptar = ['cost' => 15];
        $contraseña = password_hash($password, PASSWORD_DEFAULT, $encriptar);

        // Update the password in the database
        $update_pass = $connection->prepare("UPDATE user SET password = :contra WHERE document = :docu_user");
        $update_pass->bindParam(':contra', $contraseña);
        $update_pass->bindParam(':docu_user', $docu_user);
        $update_pass->execute();
        echo '<script>alert("la contraseña ha sido actualizada correctamente.");</script>';
        echo '<script>window.location="../index.php"</script>';
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
    <title>CAMBIAR CONTRASEÑA || SIFER-APP</title>
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

    <body>
        <div class="wrapper">

            <!-------sidebar--design- close----------->

            <?php

            require_once('./menu.php');
            ?>

            <div class="xp-breadcrumbbar text-center">
                <h2 class="page-title"><span>Bienvenido <?php echo $usua['type_user'] ?> <?php echo $usua['name'] ?></span></h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Editar</a></li>
                    <li class="breadcrumb-item active" aria-curent="page">Cuenta</li>
                </ol>
            </div>
        </div>
        </div>

        <div class="container-fluid mt-4">
            <div class="col-xs-12">
                <h1>Cambiar Contraseña</h1>
                <form method="POST" action="" name="form2" autocomplete="off">
                    <!-- Group: password -->

                    <label for="document" class="formulario__label">Nueva Contraseña</label>
                    <div class="formulario__grupo-input">
                        <input type="password" autofocus maxlength="12" oninput="validarContraseñaInput(this)" class="formulario__input form-control" name="password" id="contraseña" required placeholder="Ingrese su nueva contraseña">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">La contraseña debe ser de 10 a 12 digitos y pueden tener letras, numeros y guiones bajos.</p>


                    <!-- Group: password2 -->


                    <label for="username" class="formulario__label">Confirmar Contraseña</label>
                    <div class="formulario__grupo-input">
                        <input type="password" maxlength="12" oninput="validarContraseñaInput(this)" class="formulario__input" name="password2" required id="contraseña" placeholder="Confirme su nueva contraseña">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Ambas contraseñas deben ser iguales para realizar el respectivo cambio de contraseña.</p>

                    <div class="form-group mt-3" role="group" aria-label="Button group">
                        <input type="submit" class="btn btn-info ml-3" name="validar" value="Actualizar"></input>
                        <input type="hidden" name="MM_update" value="form2">
                        <a href="index.php" class="btn btn-danger">Cancelar Registro</a>
                    </div>

                </form>
            </div>

        </div>

        <!-- INCLUIMOS TODOS LOS FORMULARIOS PARA EL MODULO DE CREAR  -->
        <?php

        require_once('./formularios_crear.php');

        ?>


        <script>
            function validarContraseñaInput(input) {
                var contraseña = input.value;
                var longitudMaxima = 12; // Cambia esto al valor deseado

                contraseña = contraseña.replace(/\s/g, ''); // Eliminar espacios en blanco

                if (contraseña.length > longitudMaxima) {
                    input.value = contraseña.substring(0, longitudMaxima); // Limitar la longitud
                } else {
                    input.value = contraseña; // Asignar el valor actualizado
                }
            }
        </script>
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

                letras = "qwertyuiopasdfghjklñzxcvbnm123456789";

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

        <!-- FUNCION QUE PERMITE INGRESAR SOLO EL NUMERO REQUERIDOS DE VALORES DE ACUERDO AL VALOR DEL MAXLENGTH DEL INPUT -->

        <script>
            function maxlengthNumber(obj) {
                if (obj.value.length > obj.maxLength) {
                    obj.value = obj.value.slice(0, obj.maxLength);
                    alert("Debe ingresar solo numeros en el campo y debe ser en un rango de 6 a 10 numeros.");
                }
            }
        </script>

        <!-- FUNCION QUE PERMITE INGRESAR SOLO LETRAS EN CADA UNO DE LOS CAMPOS EL CUAL SE INVOCO LA FUNCION EN EL ONKEYPRESS -->

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
                        break;
                    }
                }

                if (letras.indexOf(teclado) == -1 && !teclado_especial) {
                    return false;
                    alert("Debe ingresar solo numeros en el campo y debe ser en un rango de 6 a 10 numeros.");
                }
            }
        </script>

        <!-- TYPED JS -->
        <script src="https://unpkg.com/typed.js@2.0.132/dist/typed.umd.js"></script>
        <script src="../../controller/JS/main.js"></script>

        <!-- VALIDACION DE FORMULARIO -->
        <script src="../../controller/JS/formulario.js"></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    </body>

</html>