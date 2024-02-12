<?php
session_start();
if (isset($_SESSION['ADMINISTRADOR']))
{ 
  include '../../../assets/conexion/conexion.php';
  $usuario=($_SESSION['ADMINISTRADOR']);
  $res=mysqli_query($conexion,"SELECT * FROM usuarios WHERE id_usuario=$usuario");
        while ($reg=mysqli_fetch_array($res)) 
        {
          // $nomusua_usua=utf8_decode($reg[2]);
          // $rolusua=utf8_decode($reg[1]);
         }
         $saludo="Bienvenido $nomusua_usua, a el Rol del $rolusua";
         $usu="<p>$nomusua_usua</p> <p class='designation'>$rolusua</p>"; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
include '../conexion.php';
	 ?>	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>LISTADO MAESTRO PROCEDIMIENTOS</title>
	
		<style rel="stylesheet"  href="../../../assets/css/bootstrap.css"></style>	
		<style rel="stylesheet" href="../../../assets/css/style.css"></style>

		<link rel="stylesheet" href="../../../assets/css/bootstrap.css">
		<link rel="stylesheet" href="../../../assets/css/style.css">

		<script src="../../../assets/js/jquery-3.2.1.min.js"></script>	
		<script src="../../../assets/js/bootstrap.js"></script>	
</head>
<body>
	
<?php include '../include/menu.php'; ?>
	<div class="container">
		<br>
		<br>
		<br>
<div class="row">
<div class="col-md-12">
	<h3 class="help-block text-center">PROCEDIMIENTOS</h3>
	<hr>
</div>

</div>

<div class="row">

	<div class="col-md-4">
			<span>Procedimientos</span>
		<input type="text" name="argumento" class="form-control" id="argumento">
	</div>

	<div class="col-md-3"><br><input type="button" id="btnregistrar_argumento" onclick="enviar()" class="btn btn-danger form-control" value="Registrar Procedimientos">
<input type="button" id="btnactualizar_argumento" onclick="actualizar()" class="btn btn-danger form-control" value="Actualizar  Procedimientos">
	</div>
</div>
<div id="contenedor_argumentos_registrados">
	
</div>
<div id="contenedor">
	
</div>
	</div>

</body>

<script>
function actualizar() {
	
var id_argumento=this.id_argumento;
var argumento=document.getElementById('argumento').value;
$("#contenedor").load("actualizar.php",{argumento:argumento,id_argumento:id_argumento});

}


function actualizar_argumento(id_argumento, nombre_argumento) {
var nombre_argumento=nombre_argumento;
// este this es para crear una variable publica esto es Poo
this.id_argumento=id_argumento;
var nombre_argumento=document.getElementById("argumento").value=nombre_argumento;
var btnactualizar_argumento=document.getElementById("btnactualizar_argumento").style.display="block";
var btnregistrar_argumento=document.getElementById("btnregistrar_argumento").style.display="none";

}	

	$("#argumento").keyup(valiadar_argumento);
var btnactualizar_argumento=document.getElementById("btnactualizar_argumento").style.display="none";

argumentos_registrados();
function argumentos_registrados() {

$("#contenedor_argumentos_registrados").load("cargar_argumentos.php");
}

	function enviar() {
	if (valiadar_argumento()==true) {

var argumento=document.getElementById('argumento').value;

$("#contenedor").load("registrar.php",{argumento:argumento})

	}else{

		alert("llene todos los campos");
	}	
	}



function valiadar_argumento() {

  var argumento=document.getElementById('argumento').value;
  argumento=argumento.toUpperCase();
  if(argumento==null  || argumento.length==0 ){
    var argumento=document.getElementById('argumento').style.border="2px solid red"
    return false;

  }else if (isNaN(argumento)==false) {
    var argumento=document.getElementById('argumento').style.border="2px solid red"
    return false;

  }else if (argumento.length>500) {
    var argumento=document.getElementById('argumento').style.border="2px solid red";
    return false;

  }else{
    var argumento=document.getElementById('argumento').style.border="2px solid green";

    return true;
  }
}
</script>
<?php

        }
        else
        {
            echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../../index.php?Acceso Denegado'</script>";
        }
    ?>
</html>