<?php
session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection = $db->conectar();

$sentencia = $connection->query("SELECT ventas.total, ventas.fecha, ventas.id,user.name,motorcycles.placa,GROUP_CONCAT(	productos.codigo, '..',  productos.name_pro, '..', productos_vendidos.existencia SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id INNER JOIN productos ON productos.id = productos_vendidos.id_producto INNER JOIN user ON user.document=ventas.document INNER JOIN motorcycles ON  motorcycles.placa=ventas.placa GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);



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
    <title>VENTAS PRODUCTOS || SIFER-APP</title>
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
            <h2 class="page-title"><span>LISTADO VENTAS DE PRODUCTOS </span></h2>

        </div>
    </div>
    </div>

    <div class="container-fluid">
        <div class="col-xs-15 mt-5">
            <?php
            if (isset($_GET["status"])) {
                if ($_GET["status"] === "1") {
            ?>
                    <div class="alert alert-success">
                        <strong>¡Correcto!</strong> Venta realizada correctamente
                    </div>
                <?php
                } else if ($_GET["status"] === "2") {
                ?>
                    <div class="alert alert-info">
                        <strong>Venta cancelada</strong>
                    </div>
                <?php
                } else if ($_GET["status"] === "3") {
                ?>
                    <div class="alert alert-info">
                        <strong>Retiroso exitoso</strong>, Producto quitado de la lista.
                    </div>
                <?php
                } else if ($_GET["status"] === "4") {
                ?>
                    <div class="alert alert-warning">
                        <strong>Error:</strong> El producto que buscas no existe
                    </div>
                <?php
                } else if ($_GET["status"] === "5") {
                ?>
                    <div class="alert alert-danger">
                        <strong>Error: </strong>El producto está agotado
                    </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-danger">
                        <strong>Error:</strong> Algo salió mal mientras se realizaba la venta
                    </div>
            <?php
                }
            }
            ?>

            <!------top-navbar-end----------->
        </div>
    </div>


    <!--Ejemplo tabla con DataTables-->
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">

                <div class="table-responsive">

                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>

                                <th>Número</th>
                                <th>Fecha</th>
                                <th>Nombre</th>
                                <th>Placa</th>
                                <th>Productos vendidos</th>
                                <th>Total</th>
                                <th>Ticket</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ventas as $venta) { ?>
                                <tr>
                                    <td><?php echo $venta->id ?></td>
                                    <td><?php echo $venta->fecha ?></td>
                                    <td><?php echo $venta->name ?></td>
                                    <td><?php echo $venta->placa ?></td>

                                    <td>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nombre del producto</th>
                                                    <th>Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach (explode("__", $venta->productos) as $productosConcatenados) {
                                                    $producto = explode("..", $productosConcatenados)
                                                ?>
                                                    <tr>
                                                        <td><?php echo $producto[0] ?></td>
                                                        <td><?php echo $producto[1] ?></td>
                                                        <td><?php echo $producto[2] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td><?php echo $venta->total ?></td>
                                    <td><a class="btn btn-info" href="<?php echo "imprimirTicket.php?id=" . $venta->id ?>" style="color:white;">Facturar <i class="fa fa-print"></i></a></td>
                                    <td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $venta->id ?>" style="color:white;">Eliminar <i class="fa fa-trash"></i></a></td>
                                </tr>
                            <?php } ?>
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