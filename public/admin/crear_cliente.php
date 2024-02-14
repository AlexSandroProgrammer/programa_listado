<?php
// SE DEBE INCLUIR EL ARCHIVO DE CONEXION A LA BASE DE DATOS
require_once("../../database/connection.php");


session_start();
// VARIABLES QUE CONTIENE LA CLASE CON LOS PARAMETROS DE CONEXION A LA BASE DE DATOS
$database = new Database();
// VARIABLE QUE CONTIENE LA CONEXION A LA BASE DE DATOS SIFER-APP
$connection = $database->conectar();
// CONSULTA SQL PARA INVOCAR LOS TIPOS DE USUARIO REGISTRADOS
$sql = $connection->prepare("SELECT * FROM user,type_user WHERE  username ='" . $_SESSION['usuario'] . "' AND user.id_type_user = type_user.id_type_user");
$sql->execute();
$usua = $sql->fetch(PDO::FETCH_ASSOC);
$user_report = $connection->prepare("SELECT * FROM user INNER JOIN type_user INNER JOIN state INNER JOIN gender ON user.id_type_user = type_user.id_type_user AND user.id_gender=gender.id_gender AND user.id_state=state.id_state");
$user_report->execute();
$reporte = $user_report->fetch(PDO::FETCH_ASSOC);
// CONSULTA SQL PARA INVOCAR LOS TIPOS DE GENERO
$select_gender = $connection->prepare("SELECT * FROM gender");
$select_gender->execute();
// VARIABLE QUE CONTIENE LA CONSULTA JUNTO CON EL ARRAY ASOCIATIVO QUE CONTIENE LAS FILAS REGISTRADAS
$gender = $select_gender->fetch(PDO::FETCH_ASSOC);


$comando = $connection->prepare("SELECT * FROM datetime_entry INNER JOIN user INNER JOIN type_user ON datetime_entry.document = user.document AND user.id_type_user = type_user.id_type_user ORDER BY id_entry  DESC LIMIT 6");
$comando->execute();
$resultado = $comando->fetch(PDO::FETCH_ASSOC);
?>
<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formreg")) {

    // VARIABLES QUE CONTIENE EL NUMERO DE ENCRIPTACIONES DE LAS CONTRASEÑAS
    $pass_encriptaciones = [
        'cost' => 15
    ];

    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO
    $document_user = $_POST['document'];
    $name_user = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT, $pass_encriptaciones);
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $type_user = $_POST['id_type_user'];
    $id_gender = $_POST['id_gender'];
    $datetime = $_POST['datetime'];
    $id_state = $_POST['id_state'];
    $checkbox = $_POST['terminos'];

    // CONSULTA SQL PARA VERIFICAR SI EL USUARIO YA EXISTE EN LA BASE DE DATOS
    $db_validation = $connection->prepare("SELECT * FROM user WHERE document='$document_user' OR username='$username'");
    $db_validation->execute();
    $register_validation = $db_validation->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {
        // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE
        echo '<script> alert ("// Estimado Usuario, los datos ingresados ya se encuentran registrados. //");</script>';
        echo '<script> window.location= "crear_cliente.php"</script>';
    } else if ($document_user == "" || $name_user == "" || $surname == ""  || $username == "" || $user_password == "" || $telephone == "" || $email == "" || $type_user == "" || $id_gender == "" || $datetime == "" || $checkbox == ""  || $id_state == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert ("Estimado Usuario, Existen Datos Vacios En El Formulario");</script>';
        echo '<script> window.location= "crear_cliente.php"</script>';
    } else {
        $register_user = $connection->prepare("INSERT INTO user(document,name,surname,date_user,username,telephone,email,id_type_user,id_gender,password,id_state,confirmacion) VALUES('$document_user','$name_user','$surname','$datetime','$username','$telephone','$email','$type_user','$id_gender','$user_password','$id_state','$checkbox')");
        $register_user->execute();
        echo '<script>alert ("Registro Exitoso de cliente.");</script>';
        echo '<script>window.location="lista_clientes.php"</script>';
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
    <title>REGISTRAR CLIENTE || SIFER-APP</title>
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

<body onload="limitarFechas()">

    <div class="wrapper">

        <?php

        require_once('menu.php');

        ?>

        <div class="xp-breadcrumbbar text-center">
            <h2 class="page-title"><span>REGISTRO DE CLIENTE</span></h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Datos</a></li>
                <li class="breadcrumb-item active" aria-curent="page">Cliente</li>
            </ol>
        </div>
    </div>
    </div>


    <div class="container-fluid mt-4">
        <div class="col-xs-12 ml-2">
            <!-- FORM CONTAINER -->

            <form method="POST" name="formreg" action="" autocomplete="off">

                <!-- Container: Document -->

                <div class="form-group">
                    <label for="document" class="formulario__label">Numero de documento</label>
                    <div class="formulario__grupo-input">
                        <input type="number" maxlength="10" autofocus oninput="maxlengthNumber(this);" onkeypress="return(multiplenumber(event));" class="formulario__input" name="document" id="document" required placeholder="Ingrese su numero de documento">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El numero de documento debe ser de 6 a 10 numeros.</p>
                </div>

                <div class="form-group">
                    <!-- Container: Nombre -->

                    <label for="name" class="formulario__label">Nombres</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" oninput="maxlengthNumber(this);" onkeypress="return(multipletext(event));" maxlength="15" name="name" required id="name" placeholder="Ingrese sus nombres">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Debe ingresar solo letras, y debe indicar su primer nombre</p>
                </div>


                <div class="form-group">
                    <!-- Container: Apellidos -->


                    <label for="surname" class="formulario__label">Apellidos</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" onkeypress="return(multipletext(event));" pattern="[A-Za-z]+" maxlength="15" name="surname" required id="surname" placeholder="Ingrese sus apellidos">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Debe ingresar solor letras, y debe indicar su primer apellido.</p>
                </div>


                <div class="form-group">
                    <!-- Container: Username -->

                    <label for="username" class="formulario__label">Nombre de Usuario</label>
                    <div class="formulario__grupo-input">
                        <input type="text" minlength="6" maxlength="12" oninput="(maxlengthNumber(this))" class="formulario__input" name="username" required id="username" placeholder="Ingrese su nombre de usuario">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El usuario tiene que ser de 10 a 12 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                </div>


                <div class="form-group">
                    <!-- Container: Password -->
                    <label for="password" class="formulario__label">Contraseña de Usuario</label>
                    <div class="formulario__grupo-input">
                        <input type="password" minlength="10" maxlength="20" class="formulario__input" name="password" oninput="maxlengthNumber(this);" required id="password" placeholder="Ingrese su contraseña">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">La contraseña tiene que ser de 10 a 12 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                </div>

                <div class="form-group">
                    <!-- Group: Password 2 -->

                    <label for="password2" class="formulario__label">Repetir Contraseña</label>
                    <div class="formulario__grupo-input">
                        <input type="password" class="formulario__input" minlength="10" maxlength="20" name="password2" oninput=" maxlengthNumber(this);" required id="password2" placeholder="Repita su contraseña">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>

                </div>


                <div class="form-group">
                    <!-- Container: telephone -->
                    <label for="telephone" class="formulario__label">Numero de Celular</label>
                    <div class="formulario__grupo-input">
                        <input type="number" class="formulario__input" maxlength="10" name="telephone" oninput="maxcelNumber(this);" required id="telephone" placeholder="Ingrese su numero de contacto">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Debe ingresar su numero telefonico y solo se permite ingreso de diez datos numericos.</p>
                </div>


                <div class="form-group">
                    <!-- Container: email -->

                    <label for="email" class="formulario__label">Correo Electronico</label>
                    <div class="formulario__grupo-input">
                        <input type="email" maxlength="30" oninput="maxlengthNumber(this);" class="formulario__input" name="email" required id="email" placeholder="Ingrese su correo electronico">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Su correo solo puede contener letras, numeros, puntos, guiones y guiones bajos. Obligatoriamente debe tener el signo arroba "@".
                    <p>

                </div>

                <div class="form-group">
                    <label for="telephone" class="formulario__label">Fecha de nacimiento</label>
                    <div class="formulario__grupo-input">
                        <input type="date" class="formulario__input" maxlength="10" min="1940-01-01" name="datetime" required id="fecha" placeholder="Ingrese su fecha de nacimiento">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Debe ingresar su fecha de nacimiento</p>
                </div>
                <!-- Container Type User -->
                <div class="state">
                    <input class="cajas" type="hidden" value="3" name="id_type_user">
                </div>

                <div class="form-group">
                    <!-- Container Type Gender -->

                    <label for="" class="formulario__label">Tipo de Genero</label>
                    <div class="formulario__grupo__input formulario__input">
                        <?php
                        do {

                        ?>
                            <input class="gender" name="id_gender" type="radio" value="<?php echo ($gender['id_gender']) ?>"> <?php echo ($gender['gender']) ?></input>
                        <?php

                        } while ($gender = $select_gender->fetch(PDO::FETCH_ASSOC));
                        ?>
                    </div>

                </div>


                <!-- Container: State_user -->
                <div class="state">
                    <input class="cajas" type="hidden" value="1" name="id_state" placeholder="Ingrese su estado">
                </div>


                <div class="form-group ml-4">
                    <!-- Container: Terminos y Condiciones -->

                    <label class="formulario__label">
                        <input type="checkbox" name="terminos" value="1" id="terminos">
                        Acepto los Terminos y Condiciones <br> para el uso de mis datos
                    </label>
                </div>

                <div class="form-group" role="group" aria-label="Button group">
                    <input type="submit" class="btn btn-info ml-3" name="validar" value="Crear Cliente"></input>
                    <input type="hidden" name="MM_insert" value="formreg">
                    <a href="index.php" class="btn btn-danger">Cancelar Registro</a>
                </div>
            </form>
        </div>


        <?php
        require_once('./formularios_crear.php');

        ?>

    </div>


    <!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO EL NUMERO VALORES REQUERIDOS DE ACUERDO A LA LONGITUD MAXLENGTH DEL CAMPO -->

    <script>
        // FUNCION DE JAVASCRIPT PARA VALIDAR LOS AÑOS DE RANGO PARA LA FECHA DE NACIMIENTO
        var fechaInput = document.getElementById('fecha');
        // Calcular las fechas mínima y máxima permitidas
        var fechaMaxima = new Date();
        fechaMaxima.setFullYear(fechaMaxima.getFullYear() - 18); // Restar 18 años para que la persona se registre
        var fechaMinima = new Date();
        fechaMinima.setFullYear(fechaMinima.getFullYear() - 80); // Restar 80 años
        // Formatear las fechas mínima y máxima en formato de fecha adecuado (YYYY-MM-DD)
        var fechaMaximaFormateada = fechaMaxima.toISOString().split('T')[0];
        var fechaMinimaFormateada = fechaMinima.toISOString().split('T')[0];

        // Establecer los atributos min y max del campo de entrada de fecha
        fechaInput.setAttribute('min', fechaMinimaFormateada);
        fechaInput.setAttribute('max', fechaMaximaFormateada);

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

            especiales = "8-37-38-46-164-46-32";

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

    <!-- Agregar el enlace a Bootstrap JS (requerido para el funcionamiento del formulario) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para mostrar u ocultar el formulario al hacer clic en el enlace -->
    <script>
        document.getElementById('mostrarFormulario').addEventListener('click', function() {
            var formulario = document.getElementById('formulario');
            if (formulario.style.display === 'none') {
                formulario.style.display = 'block';
            } else {
                formulario.style.display = 'none';
            }
        });
    </script>

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





    <script>
        function multiplenumber(e) {
            key = e.keyCode || e.which;

            teclado = String.fromCharCode(key).toLowerCase();

            letras = "1234567890";

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

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>



</body>

</html>