<?php
session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection=$db->conectar();

if (!isset($_GET["id"])) {
    exit("No hay id");
}
$id = $_GET["id"];

$sentencia = $connection->prepare("SELECT * FROM ventas INNER JOIN user ON user.document=ventas.document INNER JOIN motorcycles ON motorcycles.placa=ventas.placa  WHERE id = ?");
$sentencia->execute([$id]);
$venta = $sentencia->fetchObject();
if (!$venta) {
    exit("No existe venta con el id proporcionado");
}

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

?>
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
        width: 175px;
        max-width: 175px;
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

<body>
    <div class="ticket">
        <img src="../../controller/image/favicon.png" alt="Logotipo">
        <p class="centrado">TICKET DE VENTA
            <br><?php echo $venta->fecha; ?>
            <br>vendedor:     <?php echo $venta->name; ?>
            <br>vendedor:     <?php echo $venta->placa; ?>
        </p>
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
                        <td class="cantidad"><?php echo $producto['existencia'];?></td>
                        <td class="producto"><?php echo $producto['name_pro'];  ?> <strong>$<?php echo number_format($producto['precio'], 2) ?></strong></td>
                        <td class="precio">$<?php echo number_format($subtotal, 2)  ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" style="text-align: right;">TOTAL</td>
                    <td class="precio">
                        <strong>$<?php echo number_format($total, 2) ?></strong>
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
            window.location.href = "./ventas.php";
        }, 1000);
    });
</script>