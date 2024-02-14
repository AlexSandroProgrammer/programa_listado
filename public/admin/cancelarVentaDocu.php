<?php

session_start();

unset($_SESSION["carrito_venta"]);
$_SESSION["carrito_venta"] = [];

header("Location: ./vender_documento.php?status=2");
?>