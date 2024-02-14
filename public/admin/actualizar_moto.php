<?php
session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection = $db->conectar();
$sql = $connection->prepare("SELECT * FROM user,type_user WHERE  username ='" . $_SESSION['usuario'] . "' AND user.id_type_user = type_user.id_type_user");
$sql->execute();
$usua = $sql->fetch(PDO::FETCH_ASSOC);
require_once("../../controller/validarSesion.php");

if (isset($_POST['btncerrar'])) {
	session_destroy();
	header("Location:../../index.php");
}

// CONSULTA SQL PARA INVOCAR TODAS LAS MARCAS REGISTRADAS EN LA BASE DE DATOS
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

// VARIABLE QUE CONTIENE LA PLACA DE LA MOTO PARA REALIZAR ACTUALIZACION A SUS DATOS

$placa = $_GET['placa'];



$moto_update = $connection->prepare("SELECT *  FROM motorcycles INNER JOIN user INNER JOIN modelos INNER JOIN carroceria INNER JOIN cilindraje INNER JOIN colores_moto INNER JOIN combustible INNER JOIN marcas_motos INNER JOIN servicio_moto ON motorcycles.document = user.document AND motorcycles.id_modelo = modelos.id_modelo  AND motorcycles.id_marca = marcas_motos.id AND motorcycles.id_carroceria = carroceria.id_carroceria AND motorcycles.id_cilindraje = cilindraje.id_cilindraje AND motorcycles.id_servicio_moto = servicio_moto.id_servicio_moto AND motorcycles.id_color = colores_moto.id_color AND motorcycles.id_combustible = combustible.id_combustible WHERE motorcycles.placa = '" . $_GET['placa'] . "'");
$moto_update->execute();
$motorcycle = $moto_update->fetch(PDO::FETCH_ASSOC);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formreg")) {

    // VARIABLES DE ASIGNACION DE VALORES QUE SE ENVIA DEL FORMULARIO REGISTRO DE MOTOS

    $placa_user = $_POST['placa'];
    $km_user = $_POST['km'];
    $color_user = $_POST['color'];
    $moto_combus = $_POST['combustible'];
    $moto_carroceria = $_POST['carroceria'];
    $moto_cilindraje = $_POST['cilindraje'];
    $moto_servicio = $_POST['servicio'];

    $db_validation = $connection->prepare("SELECT * FROM motorcycles WHERE placa='" . $_GET['placa'] . "'");
    $db_validation->execute();
    $update_validation = $db_validation->fetchAll();
    if ($update_validation) {
        $moto_actualizacion = $connection->prepare("UPDATE motorcycles SET km = '$km_user', id_color = '$color_user', id_carroceria = '$moto_carroceria', id_combustible = '$moto_combus', id_servicio_moto = '$moto_servicio' WHERE placa = '" . $_GET['placa'] . "'");
        $moto_actualizacion->execute();
        echo '<script> alert ("Estimado Usuario, Los cambios fueron realizados correctamente");</script>';
        echo '<script> window.location= "list_motos.php"</script>';
    }
    // CONDICIONAL PARA VALIDAR SI EXISTEN RESULTADOS VACIOS AL MOMENTO DE ENVIAR LA INFORMACION DADA EN EL FORMULARIO

    else if ($placa_user == "" || $km_user == "" || $modelo_user == "" || $marca_user == "" || $color_user == "" || $documento_user == "" || $moto_combus == "" || $moto_carroceria == "" || $moto_servicio == "" || $moto_cilindraje == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert ("Estimado Usuario, Existen Datos Vacios En El Formulario");</script>';
        echo '<script> windows.location= "actualizar_moto.php"</script>';
    } else {
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

    <link rel="stylesheet" href="./css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./css/2.css">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>REGISTRO DE CLIENTE || SIFER-APP</title>
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

<body>

    <div class="wrapper">

        <?php

        require_once('./menu.php');
        ?>


        <div class="xp-breadcrumbbar text-center">
            <h2 class="page-title"><span>ACTUALIZACION DE DATOS</span></h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Datos</a></li>
                <li class="breadcrumb-item active" aria-curent="page">Moto</li>
            </ol>
        </div>
    </div>
    </div>

    <div class="container-fluid">
        <div class="ml-2 col-xs-12">
            <!-- MAIN CONTAINER -->

            <form method="POST" name="formreg" action="" autocomplete="off">
                <!-- Container: Placa -->
                <div class="form-group">
                    <label for="username" class="formulario__label">Placa</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" readonly value="<?php echo $_GET['placa'] ?>" name="placa" id="placa" placeholder="Ingrese numero de placa">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Debe ingresar la placa de la moto y debe ser de 3 letras y 3 numeros.</p>
                </div>


                <div class="form-group">
                    <!-- Container: Kilometraje -->

                    <label for="name" class="formulario__label">Kilometraje</label>
                    <div class="formulario__grupo-input">
                        <input value="<?php echo $motorcycle['km'] ?>" type="number" class="formulario__input" name="km" required id="km" placeholder="Ingrese sus nombres">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Debe ingresar el kilometraje actual de la moto y no debe superar los 7 numeros.</p>
                </div>

                <!-- Container: Color -->

                <div class="form-group">
                    <div class="top">
                        <label for="color" class="formulario__label">Actualizar Color</label>
                    </div>
                    <div class="formulario__grupo__input">
                        <select id="buscador" name="color" class="formulario__input">
                            <option value="<?php echo $motorcycle['id_color'] ?>">Es de color <?php echo $motorcycle['nombre_color'] ?> </option>
                            <?php
                            do {
                            ?>
                                <option value="<?php echo ($color['id_color']) ?>"><?php echo ($color['nombre_color']) ?></option>
                            <?php
                            } while ($color = $select_color->fetch(PDO::FETCH_ASSOC));
                            ?>
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <div class="top">
                        <label for="combustible" class="formulario__label">Combustible</label>
                    </div>
                    <div class="formulario__grupo__input">
                        <select id="combustible" name="combustible" class="formulario__input">
                            <option value="<?php echo $motorcycle['id_combustible'] ?>">la moto utiliza <?php echo $motorcycle['combustible'] ?></option>
                            <?php
                            do {
                            ?>
                                <option value="<?php echo ($sele_combustible['id_combustible']) ?>"><?php echo ($sele_combustible['combustible']) ?></option>
                            <?php
                            } while ($sele_combustible = $combustible->fetch(PDO::FETCH_ASSOC));
                            ?>
                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <div class="top">
                        <label for="Carroceria" class="formulario__label">Carroceria</label>
                    </div>
                    <div class="formulario__grupo__input">
                        <select id="carroceria" name="carroceria" class="formulario__input">
                            <option value="<?php echo $motorcycle['id_carroceria'] ?>">Seleccione nuevo Tipo de Carroceria</option>
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

                <div class="form-group">
                    <div class="top">
                        <label for="Cilindraje" class="formulario__label">Cilindraje</label>
                    </div>
                    <div class="formulario__grupo__input">
                        <select id="cilindraje" name="cilindraje" class="formulario__input">
                            <option value="<?php echo $motorcycle['id_cilindraje'] ?>">Seleccione Tipo de Cilindraje</option>
                            <?php
                            do {
                            ?>
                                <option value="<?php echo ($sele_cilindraje['id_cilindraje']) ?>"><?php echo ($sele_cilindraje['cilindraje']) ?></option>


                            <?php
                            } while ($sele_cilindraje = $cilindraje->fetch(PDO::FETCH_ASSOC));
                            ?>
                        </select>

                    </div>

                </div>


                <div class="form-group">

                    <div class="top">
                        <label for="servicio" class="formulario__label">Servicio de Moto</label>

                    </div>
                    <div class="formulario__grupo__input">
                        <select id="servicio" name="servicio" class="formulario__input">
                            <option value="<?php echo $motorcycle['id_servicio_moto'] ?>">Seleccione Tipo de Servicio Moto</option>
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

                <div class=" mt-4">
                    <input class="btn btn-info mb-4 border" type="submit" value="Guardar">
                    <input type="hidden" name="MM_insert" value="formreg">
                    <a href="list_motos.php" class="btn btn-warning mb-4 border ">Cancelar Actualizacion</a>
                </div>
            </form>
        </div>
    </div>


    <?php

    require_once('formularios_crear.php');

    ?>



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

    <script src="../../controller/JS/motos.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>



    <?php

    require_once('formularios_crear.php');

    ?>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>

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