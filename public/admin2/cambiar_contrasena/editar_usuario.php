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
  <title>LISTADO MAESTRO AREAS</title>
    
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
        <div class="row">
      <div class="col-md-12">
        <h3 class="help-block text-center">Confuguracion De Usuarios</h3>
        <hr>
      </div>

    </div>
        
      </div>

	 <form action="actualizar_usuario.php" id="formulario">
	   <div class="row">
<div class="col-xs-12 col-lg-7 col-lg-offset-4" data-form-type="formoid">
  		<div class="col-xs-12 col-md-7">
		  <div class="form-group">
  		    <label for="">Usuario </label>
  		    <input type="text" name="" id="usuario" class="form-control">
		  </div>
  		</div>


    	<div class="col-xs-12 col-md-7">
    	  <div class="form-group">

   			<label for="">Nombre Usuario </label>
  			<input type="text" name="" id="nombre_usuario" class="form-control">
		  </div>
  		</div>

		<div class="col-xs-12 col-md-7">
		  <div class="form-group">
  			<label for="">Contraseña  </label><b class="help-block">Si no escribe nada la contraseña no se actualizará</b>
  			<input type="text" name="" id="contraseña" class="form-control">
		  </div>
  		</div>

  		<div class="col-xs-12 col-md-7">
		  <div class="form-group">
      		<label for="">Rol </label>
    		<select name="rol" class="form-control" id="rol" onchange="validar_rol()">
      		  <option value="Selecciona">Selecciona</option>
      		  <option value="ADMINISTRADOR">Administrador</option>
    		</select>
  		  </div>
        </div>
	   </div>
	</div>
	 </form>
<!-- <div class="row">
  <br>
  <div class="col-md-12">
    <input type="button" value="Actualizar Usuario" onclick="actualizar_usuario()" class="btn ">
  </div>
</div> -->

<div class="row">
                <div class="col-xs-12 box">
                  <button class="btn btn-primary" type="button" value="Actualizar Usuario" onclick="actualizar_usuario()" style="
    text-align: center;
    margin: auto;
    display: block;
">
                    <i class="icon fa fa-refresh">
                    </i>
                    <span>
                      Actualizar
                    </span>
                  </button>
                </div>
              </div>


<div id="contenedor"></div>


  <?php 

$id_usuario=$_REQUEST["id_usuario"];


$query="SELECT `id_Usuario`, `rol`, `nombre_Usuario`, `usuario` FROM usuarios  WHERE id_Usuario='$id_usuario' ";

$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

echo "<script>
var id_usuario='$id_usuario';
var usuario=document.getElementById('usuario').value='$fila[3]';
var rol=document.getElementById('rol').value='$fila[1]';
var nombre_usuario=document.getElementById('nombre_usuario').value='$fila[2]';
</script>";

  ?>
            </div>

  





  <script src="../../../assets/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../../assets/js/jquery-3.2.1.min.js"></script>    
    <script src="../../../assets/js/bootstrap.min.js"></script> 
 
            <script>
  
  $(document).ready(inicio);

  function inicio() {
$("#contraseña").keyup(validar_contraseña);
$("#usuario").keyup(validar_usuario);
$("#nombre_usuario").keyup(validar_nombre_usuario);
  }

    function validar_nombre_usuario() {
   
         var nombre_usuario=document.getElementById('nombre_usuario').value;
      if(nombre_usuario==null  || nombre_usuario.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(nombre_usuario)){
  var nombre_usuario=document.getElementById('nombre_usuario').style.border="2px solid red"
        return false;

      }else if (nombre_usuario.length>50) {
var nombre_usuario=document.getElementById('nombre_usuario').style.border="2px solid red"
        return false;

      } else{
var nombre_usuario=document.getElementById('nombre_usuario').style.border="2px solid #4caf50"

      return true;
      } 

  }
  function actualizar_usuario() {

    if (validar_usuario()==true && validar_nombre_usuario()==true && validar_contraseña()==true && validar_rol()==true) {

 var usuario=document.getElementById('usuario').value;
var rol=document.getElementById("rol").value;
var nombre_usuario=document.getElementById('nombre_usuario').value;
var contraseña=document.getElementById('contraseña').value;
$("#contenedor").load("actualizar_usuario.php",{usuario:usuario,rol:rol,id_usuario:id_usuario,actualizar_contraseña:actualizar_contraseña,nombre_usuario:nombre_usuario,contraseña:contraseña});

    }
  }


  function validar_usuario() {
   
         var usuario=document.getElementById('usuario').value;
      if(usuario==null  || usuario.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(usuario)){
  var usuario=document.getElementById('usuario').style.border="2px solid red"
        return false;

      }else if (usuario.length>50) {
var usuario=document.getElementById('usuario').style.border="2px solid red"
        return false;

      } else{
var usuario=document.getElementById('usuario').style.border="2px solid #4caf50"

      return true;
      } 

  }


  function validar_rol() {
      var rol=document.getElementById("rol").value;
  if (rol=="Selecciona") {

var rol=document.getElementById('rol').style.border="2px solid red";
return false

  }else{
var rol=document.getElementById('rol').style.border="2px solid #4caf50";
return true
  }
  }


function validar_contraseña() {
   var contraseña=document.getElementById('contraseña').value;
      if(contraseña==null  || contraseña.length==0){
var contraseña=document.getElementById('contraseña').style.border="2px solid #4caf50";
actualizar_contraseña=false;

        return true;

      }else if (contraseña.length>50) {
var contraseña=document.getElementById('contraseña').style.border="2px solid red";
        return false;

      } else{
var contraseña=document.getElementById('contraseña').style.border="2px solid #4caf50";
actualizar_contraseña=true;

      return true;
      } 

}
</script>
  </body>

  <?php

}
else
{
  echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../../index.php?Acceso Denegado'</script>";
}  
?>
</html>


