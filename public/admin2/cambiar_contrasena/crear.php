<?php 

  include '../../../assets/conexion/conexion.php';
$usuario=$_POST["usuario"];
$nombre_usuario=$_POST["nombre_usuario"];
$rol=$_POST["rol"];
$contraseña=$_POST["contraseña"];

$contraseña=(md5(md5($_POST['contraseña'])));

$query="SELECT * FROM `usuarios` WHERE usuarios.Usuario='$usuario'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==true) {
		 echo "<script>

    alert('Este Usuario ya Existe');

    </script>";
}else{
$query="INSERT INTO `usuarios`(`rol`, `nombre_Usuario`, `usuario`, `contrasena`) VALUES ('$rol','$nombre_usuario','$usuario','$contraseña')";
$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	echo "<script>

		alert('Registro Exitoso');
		location='index.php';

	  </script>";
}

}


 ?>