<?php 

include '../conexion.php';

$argumento=$_POST["argumento"];

$query="SELECT * FROM `area` WHERE `Nombre_Area`='$argumento'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {

echo "<script>alert('el Area $argumento ya existe')</script>";

}else{


	
$query="INSERT INTO `area`(`Nombre_Area`) VALUES ('$argumento')";
$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	echo "<script>alert('Registro Exitoso')

argumentos_registrados();
	</script>";
}


}



 ?>