<?php
session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection = $db->conectar();

require_once('../../controller/validarSesion.php');

if (!isset($_GET["id"])) {
    exit("No hay id");
}

// ENVIAMOS EL ID DE LA VENTA PARA TRAERNOS TODOS LOS DATOS
$id = $_GET["id"];

$sentencia = $connection->prepare("SELECT * FROM ventas INNER JOIN user ON user.document=ventas.document INNER JOIN motorcycles ON motorcycles.placa=ventas.placa  WHERE id = ?");
$sentencia->execute([$id]);
$venta = $sentencia->fetchObject();

if (!$venta) {
    exit("No existe venta con el id proporcionado");
}

// REALIZAMOS UNA CONSULTA PARA TRAERNOS TODOS LOS PRODUCTOS REGISTRADOS CON EL ID DE VENTA SELECCIONADO EN EL DETALLE

$sentenciaProductos = $connection->prepare("SELECT productos.codigo, productos.name_pro,productos.precio, productos_vendidos.existencia
FROM productos 
INNER JOIN 
productos_vendidos
ON productos.id = productos_vendidos.id_producto
WHERE productos_vendidos.id_venta = ?");
$sentenciaProductos->execute([$id]);
$productos = $sentenciaProductos->fetchAll();
if (!$productos) {
    exit("No hay productos");
}


// REALIZAMOS UNA CONSULTA PARA TRAERNOS TODOS LOS DOCUMENTOS REGISTRADOS CON EL ID DE VENTA SELECCIONADO EN EL DETALLE
$sentenciadocumentos = $connection->prepare("SELECT documentos.codigo, documentos.nombre ,documentos.precio, documentos_vendidos.existencia
FROM documentos 
INNER JOIN 
documentos_vendidos
ON documentos.id_documento = documentos_vendidos.id_documento
WHERE documentos_vendidos.id_venta = ?");
$sentenciadocumentos->execute([$id]);
$documentos = $sentenciadocumentos->fetchAll();
if (!$documentos) {
    exit("No hay documentos");
}


// REALIZAMOS UNA CONSULTA PARA TRAERNOS TODOS LOS SERVICIOS REGISTRADOS CON EL ID DE VENTA SELECCIONADO EN EL DETALLE
$sentenciaservicios = $connection->prepare("SELECT services.code_service, services.service,services.costo_service, servicios_vendidos.existencia
FROM services
INNER JOIN 
servicios_vendidos
ON services.code_service = servicios_vendidos.id_servicio
WHERE servicios_vendidos.id_venta = ?");
$sentenciaservicios->execute([$id]);
$servicios = $sentenciaservicios->fetchAll();
if (!$servicios) {
    exit("No hay servicios");
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
    <title>VENTA COMPLETA || SIFER-APP</title>
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

    <style>
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
        }

        td.producto,
        th.producto {
            width: 75px;
            max-width: 75px;
        }

        td.cantidad,
        th.cantidad {
            width: 50px;
            max-width: 50px;
            word-break: break-all;
        }

        td.precio,
        th.precio {
            width: 50px;
            max-width: 50px;
            word-break: break-all;
            text-align: right;
        }

        .centrado {
            text-align: center;
            align-content: center;
        }

        .ticket {
            margin: auto;
            width: 175px;
            max-width: 175px;
            margin-top: 50px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {

            .oculto-impresion,
            .oculto-impresion * {
                display: none !important;
            }
        }
    </style>

</head>


<body>
    <div class="ticket">
        <img src="../../controller/image/favicon.png" alt="Logotipo">
        <p class="centrado">TICKET DE VENTA COMPLETA
            <br><?php echo $venta->fecha; ?>
            <br>vendedor: <?php echo $venta->name; ?> <?php echo $venta->surname; ?>
            <br>placa de moto: <?php echo $venta->placa; ?>
        </p>

        <!-- TABLA PARA MOSTRAR SOLO LOS PRODUCTOS REGISTRADOS EN LA VENTA -->
        <table>
            <thead>
                <tr>
                    <th class="cantidad">CANT</th>
                    <th class="producto">PRODUCTO</th>
                    <th class="precio">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($productos as $producto) {
                    $subtotal = $producto['precio'] * $producto['existencia'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td class="cantidad"><?php echo $producto['existencia']; ?></td>
                        <td class="producto"><?php echo $producto['name_pro'];  ?> <strong>$<?php echo number_format($producto['precio'], 2) ?></strong></td>
                        <td class="precio">$<?php echo number_format($subtotal)  ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th class="cantidad">CANT</th>
                    <th class="producto">SEGURO</th>
                    <th class="precio">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($documentos as $documento) {
                    $subtotal = $documento['precio'] * $documento['existencia'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td class="cantidad"><?php echo $documento['existencia']; ?></td>
                        <td class="producto"><?php echo $documento['nombre'];  ?> <strong>$<?php echo number_format($documento['precio'], 2) ?></strong></td>
                        <td class="precio">$<?php echo number_format($subtotal)  ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th class="cantidad">CANT</th>
                    <th class="producto">SERVICIO<i class="fa fa-openid" aria-hidden="true"></i></th>
                    <th class="precio">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($servicios as $servicio) {
                    $subtotal = $servicio['costo_service'] * $servicio['existencia'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td class="cantidad"><?php echo $servicio['existencia']; ?></td>
                        <td class="producto"><?php echo $servicio['service'];  ?> <strong>$<?php echo number_format($servicio['costo_service'], 2) ?></strong></td>
                        <td class="precio">$<?php echo number_format($subtotal) ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" style="text-align: right;">TOTAL</td>
                    <td class="precio">
                        <strong>$<?php echo number_format($total) ?></strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
        </p>
    </div>
</body>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        window.print();
        setTimeout(() => {
            window.location.href = "./listaVentas_completas.php";
        }, 1000);
    });
</script>