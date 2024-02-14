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


// CONSULTA SQL ( SELECT  PARA TRAER TODOS LOS DATOS DE LAS MOTOS CON SUS RESPECTIVOS DUEÑOS JUNTO CON CADA UNA DE LAS LLAVES FORANEAS QUE ESTAN RELACIONADAS A LA TABLA DE MOTOS DE OTRAS TABLAS EXTERNAS.)

$document = $connection->prepare("SELECT *  FROM documentos");
$document->execute();
$vali_docu = $document->fetchAll(PDO::FETCH_ASSOC);

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
    <title>LISTA SEGUROS SIFER-APP</title>
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
                <li class="breadcrumb-item"><a href="#">LISTADO</a></li>
                <li class="breadcrumb-item active" aria-curent="page">SEGUROS</li>
            </ol>
        </div>
    </div>
    </div>
    <!--Ejemplo tabla con DataTables-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="table-responsive">

                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>

                                <label for="selectAll"></label></th>
                                <th>Acciones</th>
                                <th>Codigo</th>
                                <th>nombre</th>
                                <th>precio</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($vali_docu as $documento) {

                            ?>
                                <tr>

                                    <th>
                                        <form method="get" action="actualizar_docu.php">

                                            <input type="hidden" name="id_documento" value="<?= $documento['id_documento'] ?>">
                                            <button class="button button_actu" onclick="return confirm('¿Desea actualizar el seguro del documento legal seleccionado?');" type="submit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
                                        </form>
                                        <form method="get" action="eliminar_docu.php">
                                            <input type="hidden" name="id_documento" value="<?= $documento['id_documento'] ?>">
                                            <button class="button" onclick="return confirm('¿Desea eliminar el registro del nuevo documento seleccionado?');" type="submit"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                                        </form>
                                    </th>
                                    <th> <img src="./codigo_barras/barcode.php?text=<?php echo $documento['id_documento']; ?>&size=50&orientation=horizontal&codetype=Code39&print=true&sizefactor=1"></th>
                                    <th><?= $documento["nombre"] ?></th>
                                    <th><?= $documento["precio"] ?></th>

                                </tr>

                            <?php

                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>


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