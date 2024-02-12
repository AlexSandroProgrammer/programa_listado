<?php
session_start();
if (isset($_SESSION['ADMINISTRADOR']))
{ 
  include 'conexion.php';
  $usuario=($_SESSION['ADMINISTRADOR']);
  $res=mysqli_query($conexion,"SELECT * FROM usuarios WHERE id_Usuario=$usuario");
        while ($reg=mysqli_fetch_array($res)) 
        {
          $nomusua_usua=utf8_decode($reg[2]);
          $rolusua=utf8_decode($reg[1]);
         }
         $saludo="Bienvenido $nomusua_usua, a el Rol del $rolusua";
         $usu="<p>$nomusua_usua</p> <p class='designation'>$rolusua</p>"; 
         
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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


      <li><a href="areas/" >Ingresar Areas</a></li>
      <li><a href="procesos/" >Ingresar Procesos</a></li>
      <li><a href="procedimientos/" >Ingresar Procedimientos</a></li>
      <li><a href="respnsables/" >Ingresar Responsables</a></li>
      <li><a href="documentos/" >Ingresar Documentos</a></li>	

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
  echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../../index.php?Acceso Denegado'</script>";
}  
?>