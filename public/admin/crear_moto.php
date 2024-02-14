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


// SE HACE ENVIO DEL NUMERO DE DOCUMENTO POR EL METODO GET Y SE LE ASIGNA ESE VALOR A OTRA VARIABLE
$documento = $_GET['documento'];

// CONSULTA SQL PARA INVOCAR LAS MARCAS REGISTRADAS EN LA BASE DE DATOS
$select_marca = $connection->prepare("SELECT * FROM marcas_motos");
$select_marca->execute();
$marca = $select_marca->fetch(PDO::FETCH_ASSOC);

// CONSULTA SQL PARA INVOCAR LOS TIPOS DE MODELO EN LA BASE DE DATOS
$select_modelo = $connection->prepare("SELECT * FROM modelos");
$select_modelo->execute();
$modelo = $select_modelo->fetch(PDO::FETCH_ASSOC);

// CONSULTA SQL PARA INVOCAR LOS COLORES REGISTRADOS EN LA BASE DE DATOS
$select_color = $connection->prepare("SELECT * FROM colores_moto");
$select_color->execute();
$color = $select_color->fetch(PDO::FETCH_ASSOC);

// CONSULTA SQL PARA INVOCAR LOS TIPOS DE COMBUSTIBLE REGISTRADOS EN LA BASE DE DATOS
$combustible = $connection->prepare("SELECT * FROM combustible");
$combustible->execute();
$sele_combustible = $combustible->fetch(PDO::FETCH_ASSOC);

// CONSULTA SQL PARA INVOCAR LOS TIPOS DE CARROCERIA REGISTRADOS EN LA BASE DE DATOS
$carroceria = $connection->prepare("SELECT * FROM carroceria");
$carroceria->execute();
$sele_carroceria = $carroceria->fetch(PDO::FETCH_ASSOC);

// CONSULTA SQL PARA INVOCAR LOS CILINDRAJES REGISTRADOS EN LA BASE DE DATOS
$cilindraje = $connection->prepare("SELECT * FROM cilindraje");
$cilindraje->execute();
$sele_cilindraje = $cilindraje->fetch(PDO::FETCH_ASSOC);

// CONSULTA SQL PARA INVOCAR LOS TIPOS DE SERVICIOS DE MOTO REGISTRADOS EN LA BASE DE DATOS
$service_moto = $connection->prepare("SELECT * FROM servicio_moto");
$service_moto->execute();
$service = $service_moto->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['btncerrar'])) {
    session_destroy();
    header("Location:../../index.php");
}

?>

<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formreg")) {

    // VARIABLES DE ASIGNACION DE VALORES QUE SE ENVIA DEL FORMULARIO REGISTRO DE MOTOS


    $placa_user = $_POST['placa'];
    $km_user = $_POST['km'];
    $barcode = $_POST['barcode'];
    $modelo_user = $_POST['modelo'];
    $marca_user = $_POST['marca'];
    $color_user = $_POST['color'];
    $documento_user = $_POST['document'];
    $moto_combus = $_POST['combustible'];
    $moto_carroceria = $_POST['carroceria'];
    $moto_cilindraje = $_POST['cilindraje'];
    $moto_servicio = $_POST['servicio'];

    // CONSULTA SQL PARA VERIFICAR SI EL USUARIO YA EXISTE EN LA BASE DE DATOS
    $db_validation = $connection->prepare("SELECT * FROM motorcycles WHERE placa='$placa_user'");
    $db_validation->execute();
    $register_validation = $db_validation->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {
        // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE
        echo '<script> alert ("// Estimado Usuario, los datos ingresados ya se encuentran registrados //");</script>';
        echo '<script> window.location= "crear_moto.php"</script>';
    } else if ($barcode == "" || $placa_user == "" || $km_user == "" || $modelo_user == "" || $marca_user == "" || $color_user == "" || $documento_user == "" || $moto_combus == "" || $moto_carroceria == "" || $moto_servicio == "" || $moto_cilindraje == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert ("Estimado Usuario, Existen Datos Vacios En El Formulario");</script>';
        echo '<script> windows.location= "crear_moto.php"</script>';
    } else {
        $register_user = $connection->prepare("INSERT INTO motorcycles(placa,barcode,km,id_modelo,id_marca,id_color,id_carroceria,id_cilindraje,id_combustible,id_servicio_moto,document)VALUES('$placa_user','$barcode', '$km_user', '$modelo_user', '$marca_user','$color_user','$moto_carroceria','$moto_cilindraje','$moto_combus','$moto_servicio', '$documento_user')");
        if ($register_user->execute()) {
            echo '<script>alert ("Registro de moto Exitoso");</script>';
            echo '<script>window.location="list_motos.php"</script>';
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

    <link rel="stylesheet" href="./css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./css/2.css">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>REGISTRO DE MOTO || SIFER-APP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">

    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!----css3---->
    <link rel="stylesheet" href="../../controller/CSS/custom.css">
    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../controller/image/favicon.png" type="image/x-icon">

    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../controller/CSS/select2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>


    <!--font awesome con CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>

<body onload="formreg.placa.focus()">
    <div class="wrapper">

        <!-------sidebar--design- close----------->

        <?php

        require_once('./menu.php');
        ?>

        <div class="xp-breadcrumbbar text-center">
            <h2 class="page-title"><span>REGISTRO DE MOTO</span></h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Datos</a></li>
                <li class="breadcrumb-item active" aria-curent="page">Moto</li>
            </ol>
        </div>
    </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="ml-2 col-xs-12">

            </h1>
            <form method="POST" action="" name="formreg" autocomplete="off">
                <!-- Container: Documento -->
                <div class="form-group">
                    <label for="username" class="formulario__label">Documento Propietario</label>
                    <div class="formulario__grupo-input">
                        <input type="number" readonly maxlength="10" value="<?php echo $documento ?>" class="formulario__input form-control" name="document" required id="document">
                    </div>
                </div>

                <!-- Container: Placa -->

                <div class="form-group">
                    <label for="username" class="formulario__label">Placa</label>
                    <div class="formulario__grupo-input">
                        <input type="text" maxlength="6" oninput="mayusculas();" class="formulario__input" name="placa" required id="placa" placeholder="Ingrese numero de placa">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Debe ingresar la placa de la moto y debe ser de 4 letras y 2 numeros.</p>
                </div>

                <!-- Container: Codigo de Barras -->

                <div class="form-group">
                    <label for="username" class="formulario__label">Codigo de Barras</label>
                    <div class="formulario__grupo-input">
                        <input type="number" oninput="maxlengthNumber(this);" maxlength="10" class="formulario__input" name="barcode" required id="barcode" placeholder="Ingrese numero de placa">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Debe ingresar el codigo de barras que se le asignara a la moto como identificacion unica.</p>

                </div>

                <!-- Container: Kilometraje -->



                <div class="form-group">
                    <label for="name" class="formulario__label">Kilometraje</label>
                    <div class="formulario__grupo-input">
                        <input type="number" maxlength="6" oninput="maxlengthNumber(this);" class="formulario__input" name="km" required id="km" placeholder="Ingrese sus nombres">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Debe ingresar el kilometraje actual de la moto y no debe superar los 7 numeros.</p>
                </div>

                <!-- CONTAINER MARCAS DE MOTOS -->
                <div class="form-group">
                    <div class="top">
                        <label for="tipousuario" class="formulario__label">Marca</label>
                        <!-- Botón para mostrar la ventana emergente (Modal) -->
                        <button type="button" class="btn btn-dark btn-sm m-2" data-toggle="modal" data-target="#formularioMarca">
                            +Crear
                        </button>
                    </div>
                    <div class="formulario__grupo__input">
                        <select id="control" name="marca" class="formulario__input">
                            <option disabled selected value="">Seleccione Marca</option>

                            <?php
                            do {
                            ?>
                                <option value="<?php echo ($marca['id']) ?>"><?php echo ($marca['nombre']) ?></option>

                            <?php
                            } while ($marca = $select_marca->fetch(PDO::FETCH_ASSOC));
                            ?>
                        </select>
                    </div>
                </div>

                <!-- CONTAINER MODELOS DE MOTOS -->
                <div class="form-group">
                    <label for="tipousuario" class="formulario__label ">Modelo</label>
                    <button type="button" data-toggle="modal" class="btn btn-dark btn-sm m-2" data-target="#formularioModelo">
                        +Crear
                    </button>

                    <select id="controlbuscador" name="modelo" class="formulario__input">

                        <option disabled selected value="">Seleccione Modelo</option>

                        <?php
                        do {
                        ?>

                            <option value="<?php echo ($modelo['id_modelo']) ?>"><?php echo ($modelo['modelo_año']) ?></option>

                        <?php
                        } while ($modelo = $select_modelo->fetch(PDO::FETCH_ASSOC));
                        ?>
                    </select>
                </div>

                <!-- CONTAINER COLORES DE MOTO -->


                <div class="form-group">
                    <label for="color" class="formulario__label ">Color</label>
                    <!-- Botón para mostrar la ventana emergente (Modal) -->
                    <button type="button" data-toggle="modal" class="btn btn-dark btn-sm m-2" data-target="#formularioModal">
                        +Crear
                    </button>
                    <select id="buscador" name="color" class="formulario__input">
                        <option disabled selected value="">Seleccione Color</option>
                        <?php
                        do {
                        ?>
                            <option value="<?php echo ($color['id_color']) ?>"><?php echo ($color['nombre_color']) ?></option>


                        <?php
                        } while ($color = $select_color->fetch(PDO::FETCH_ASSOC));
                        ?>
                    </select>
                </div>

                <!-- CONTAINER COMBUSTIBLE DE VEHICULO -->
                <div class="form-group">

                    <div class="top">
                        <label for="combustible" class="formulario__label">Combustible</label>
                        <button type="button" data-toggle="modal" class="btn btn-dark btn-sm m-2" data-target="#formularioCombustible">
                            +Crear
                        </button>
                    </div>

                    <select id="combustible" name="combustible" class="formulario__input">
                        <option disabled selected value="">Seleccione Tipo de Combustible</option>
                        <?php
                        do {
                        ?>
                            <option value="<?php echo ($sele_combustible['id_combustible']) ?>"><?php echo ($sele_combustible['combustible']) ?></option>


                        <?php
                        } while ($sele_combustible = $combustible->fetch(PDO::FETCH_ASSOC));
                        ?>
                    </select>
                </div>

                <!-- CONTAINER TIPO DE CARROCERIA -->


                <div class="form-group">
                    <div class="top">
                        <label for="Carroceria" class="formulario__label">Carroceria</label>
                        <button type="button" data-toggle="modal" class="btn btn-dark btn-sm m-2" data-target="#formularioCarroceria">
                            +Crear
                        </button>
                    </div>
                    <div class="formulario__grupo__input">
                        <select id="carroceria" name="carroceria" class="formulario__input">
                            <option disabled selected value="">Seleccione Tipo de Carroceria</option>
                            <?php
                            do {
                            ?>
                                <option value="<?php echo ($sele_carroceria['id_carroceria']) ?>"><?php echo ($sele_carroceria['carroceria']) ?></option>


                            <?php
                            } while ($sele_carroceria = $carroceria->fetch(PDO::FETCH_ASSOC));
                            ?>
                        </select>

                    </div>
                </div>

                <!-- CONTAINER TIPO DE CILINDRAJE -->

                <div class="form-group">
                    <div class="top">
                        <label for="Cilindraje" class="formulario__label">Cilindraje</label>
                        <button type="button" data-toggle="modal" class="btn btn-dark btn-sm m-2" data-target="#formularioCilindraje">
                            +Crear
                        </button>
                    </div>
                    <div class="formulario__grupo__input">
                        <select id="cilindraje" name="cilindraje" class="formulario__input">
                            <option disabled selected value="">Seleccione Tipo de Cilindraje</option>
                            <?php
                            do {
                            ?>
                                <option value="<?php echo ($sele_cilindraje['id_cilindraje']) ?>"><?php echo ($sele_cilindraje['cilindraje']) ?></option>


                            <?php
                            } while ($sele_cilindraje = $cilindraje->fetch(PDO::FETCH_ASSOC));
                            ?>
                        </select>

                    </div>


                    <!-- CONTAINER TIPO DE SERVICIO DE MOTO  -->

                    <div class="form-group">
                        <div class="top">
                            <label for="servicio" class="formulario__label">Servicio de Moto</label>

                            <!-- Botón para mostrar la ventana emergente (Modal) -->
                            <button type="button" data-toggle="modal" class="btn btn-dark btn-sm m-2" data-target="#formularioServicio">
                                +Crear
                            </button>
                        </div>
                        <div class="formulario__grupo__input">
                            <select id="servicio" name="servicio" class="formulario__input">
                                <option disabled selected value="">Seleccione Tipo de Servicio Moto</option>
                                <?php
                                do {
                                ?>
                                    <option value="<?php echo ($service['id_servicio_moto']) ?>"><?php echo ($service['servicio_moto']) ?></option>


                                <?php
                                } while ($service = $service_moto->fetch(PDO::FETCH_ASSOC));
                                ?>
                            </select>

                        </div>
                    </div>

                    <input type="submit" class="btn btn-info" name="validar" value="Crear Moto"></input>
                    <input type="hidden" name="MM_insert" value="formreg">
                    <a href="index.php" class="btn btn-danger">Cancelar Registro</a>


            </form>
        </div>


        <?php
        require_once('./formularios_crear.php');

        ?>

    </div>

    <!-- Agregar la referencia a jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Función para abrir el modal
        function openModal(modalId) {
            var modalOverlay = document.getElementById("modalOverlay" + modalId);
            var modalForm = document.getElementById(modalId);
            modalOverlay.style.display = "block";
            modalForm.style.display = "block";
        }

        // Función para cerrar el modal
        function closeModal(modalId) {
            var modalOverlay = document.getElementById("modalOverlay" + modalId);
            var modalForm = document.getElementById(modalId);
            modalOverlay.style.display = "none";
            modalForm.style.display = "none";
        }
    </script>


    <!-- BUSCADORES EN TIEMPO REAL DEL SELECT AL CUAL FUE ASIGNADO CON EL ID UNICO -->

    <script>
        $('#buscador').select2();
    </script>
    <!-- BUSCADORES EN TIEMPO REAL DEL SELECT AL CUAL FUE ASIGNADO CON EL ID UNICO -->

    <script>
        $('#controlbuscador').select2();
    </script>

    <!-- BUSCADORES EN TIEMPO REAL DEL SELECT AL CUAL FUE ASIGNADO CON EL ID UNICO -->

    <script>
        $('#control').select2();
    </script>

    <!-- BUSCADORES EN TIEMPO REAL DEL SELECT AL CUAL FUE ASIGNADO CON EL ID UNICO -->

    <script>
        $('#combustible').select2();
    </script>

    <!-- BUSCADORES EN TIEMPO REAL DEL SELECT AL CUAL FUE ASIGNADO CON EL ID UNICO -->

    <script>
        $('#carroceria').select2();
    </script>

    <!-- BUSCADORES EN TIEMPO REAL DEL SELECT AL CUAL FUE ASIGNADO CON EL ID UNICO -->

    <script>
        $('#cilindraje').select2();
    </script>

    <!-- BUSCADORES EN TIEMPO REAL DEL SELECT AL CUAL FUE ASIGNADO CON EL ID UNICO -->

    <script>
        $('#servicio').select2();
    </script>

    <script>
        function mayusculas() {
            let input = document.getElementById("placa");
            input.value = input.value.toUpperCase();
        }
    </script>
    <script>
        function mayusculas() {
            let input = document.getElementById("placa");
            input.value = input.value.toUpperCase();
        }
    </script>

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



    <script src="../../controller/JS/motos.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>


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

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>



</body>

</html>