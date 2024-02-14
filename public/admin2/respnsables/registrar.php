<?php 

include '../conexion.php';

$argumento=$_POST["argumento"];

$query="SELECT * FROM `responsable` WHERE `Nombre_Responsable`='$argumento'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {

echo "<script>alert('el responsable $argumento ya existe')</script>";

}else{


	
$query="INSERT INTO `responsable`(`Nombre_Responsable`) VALUES ('$argumento')";
$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	echo "<script>alert('Registro Exitoso')

argumentos_registrados();
	</script>";
}


}



 ?>