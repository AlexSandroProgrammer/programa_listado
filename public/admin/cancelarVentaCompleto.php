<?php

session_start();

require_once("../../controller/validarSesion.php");

if (isset($_POST['btncerrar'])) {
	session_destroy();
	header("Location:../../index.php");
}


// ELIMININAMOS LOS PRODUCTOS QUE ESTEN AGREGADOS

unset($_SESSION["productCart"]);
$_SESSION["productCart"] = [];

// ELIMINAMOS LOS DOCUMENTOS QUE ESTEN AGGREGADOS

unset($_SESSION["documentCart"]);
$_SESSION["documentCart"] = [];


// ELIMINAMOS LOS SERVICIOS QUE ESTEN AGREGADOS

unset($_SESSION["serviceCart"]);
$_SESSION["serviceCart"] = [];

header("Location: ./vender_completo.php?status=2");
?>