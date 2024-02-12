<?php 

include '../conexion.php';

$argumento=$_POST["argumento"];

$query="SELECT * FROM `procedimiento` WHERE `Nombre_Procedimiento`='$argumento'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {

echo "<script>alert('el procedimiento $argumento ya existe')</script>";

}else{


	
$query="INSERT INTO `procedimiento`(`Nombre_Procedimiento`) VALUES ('$argumento')";
$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	echo "<script>alert('Registro Exitoso')

argumentos_registrados();
	</script>";
}


}



 ?>