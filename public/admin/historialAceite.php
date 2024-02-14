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

$sentencia = $connection->query("SELECT * FROM trigger_service");
$ventas = $sentencia->fetchAll(PDO::FETCH_ASSOC);


$sql = $connection->prepare("SELECT * FROM user,type_user WHERE  username ='" . $_SESSION['usuario'] . "' AND user.id_type_user = type_user.id_type_user");
$sql->execute();
$usua = $sql->fetch(PDO::FETCH_ASSOC);
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
    <title>ACTUALIZACION SERVICIOS || SIFER-APP</title>
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

        require_once('./menu.php');

        ?>


        <div class="xp-breadcrumbbar text-center">
            <h2 class="page-title"><span>ACTUALIZACION SERVICIOS </span></h2>

        </div>


    </div>
    </div>


    <!--Ejemplo tabla con DataTables-->
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <?php
                    date_default_timezone_set('America/Bogota');
                    try {
                        $fecha_actual = new DateTime();
                        echo '<table class="table table-striped table-bordered" cellspacing="0" width="100%">';

                        date_default_timezone_set('America/Bogota');

                        if (!empty($ventas)) {
                            foreach ($ventas as $venta) {

                                echo '<thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Placa</th>
                                    <th>Fecha Venta</th>
                                    <th>Fecha Actualizacion</th>
                                    <th>Dias Restantes</th>
                                </tr>
                            </thead>';

                                echo '<tbody>';

                                $fechaVenta = new DateTime($venta['fecha']);
                                $fechaVencimiento = new DateTime($venta['fecha_fin']);
                                $diasRestantes = $fecha_actual->diff($fechaVencimiento)->days;

                                // Agregar clase CSS si el registro está vencido
                                $class = ($fecha_actual > $fechaVencimiento) ? 'vencido' : '';

                                echo '<tr class="' . $class . '">';
                                echo '<td>' . $venta['nombre'] . '</td>';
                                echo '<td>' . $venta['placa'] . '</td>';
                                echo '<td>' . $fechaVenta->format('Y-m-d H:i:s') . '</td>';
                                echo '<td>' . $fechaVencimiento->format('Y-m-d H:i:s') . '</td>';
                                echo '<td>' . $diasRestantes . ' dias' . '</td>';
                                echo '</tr>';
                            }

                            echo '</tbody>';
                        }else{
                            echo '<thead>
                            <tr>
                                <th class=" dt-body-center">No hay registros</th>
                            </tr>
                        </thead>';

                            echo '<tbody>';
                            echo '<td>No hay registro de Cambio de aceite</td>';

                            echo '</tr>';
                        }

                        echo '</tbody>';
                        }
                    catch (PDOException $e) {
                        echo 'Error' . $e->getMessage();
                    }

                    echo '</table>';

                    ?>
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