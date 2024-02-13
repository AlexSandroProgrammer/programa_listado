<?php
session_start();
require_once("../../database/connection.php");
if (isset($_SESSION['rol_user']))
{ 
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>LISTADO MAESTRO</title>


    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <script src="../../assets/js/jquery-3.2.1.min.js"></script>

</head>

<body>


    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Listado Maestro Documentos </a>
            </div>
            <ul class="nav navbar-nav">


                <li><a href="areas/">Ingresar Areas</a></li>
                <li><a href="procesos/">Ingresar Procesos</a></li>
                <li><a href="procedimientos/">Ingresar Procedimientos</a></li>
                <li><a href="respnsables/">Ingresar Responsables</a></li>
                <li><a href="documentos/">Ingresar Documentos</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="cambiar_contrasena/">Cambiar Contraseña</a></li>
                <li><a href="../../assets/conexion/cerrar.php">Cerrar</a></li>

            </ul>
        </div>
    </nav>

</body>

</html>
<?php

}
else
{
  echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../index.php?Acceso Denegado'</script>";
}  
?>