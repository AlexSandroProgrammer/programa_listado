<?php

session_start();

unset($_SESSION["carritoServicio"]);
$_SESSION["carritoServicio"] = [];

header("Location: ./vender_servicio.php?status=2");
?>