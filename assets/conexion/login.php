
<?php
include "conexion.php";
$contrasena=(md5(md5($_POST['contrasena'])));
$usuario=$_POST['usuario'];


$res=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='".$usuario."' AND contrasena='$contrasena'")	or die(mysqli_error());
$reg=mysqli_fetch_row($res);
if ($reg==true) {
	echo "<script>


var formulario_login=document.getElementById('formulario_login').submit();
	</script>";
}else{

	echo "Usuario o Contraseña Invalido";
}
	
?>