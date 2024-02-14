<?php 

include '../conexion.php';

$argumento=$_POST["argumento"];

$query="SELECT * FROM `proceso` WHERE `Nombre_Proceso`='$argumento'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {

echo "<script>alert('el proceso $argumento ya existe')</script>";

}else{


	
$query="INSERT INTO `proceso`(`Nombre_Proceso`) VALUES ('$argumento')";
$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	echo "<script>alert('Registro Exitoso')

argumentos_registrados();
	</script>";
}


}



 ?>