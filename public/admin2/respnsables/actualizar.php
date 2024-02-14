<?php 

include '../conexion.php';
$id_argumento=$_POST["id_argumento"];
$argumento=$_POST["argumento"];

$query="SELECT * FROM `responsable` WHERE `Id_Responsable`!=$id_argumento AND `Nombre_Responsable`='$argumento'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==true) {
	echo "<script>

alert('Ya Existe $argumento')
	</script>";
}else{

$query="UPDATE `responsable` SET `Nombre_Responsable`='$argumento' WHERE `Id_Responsable`=$id_argumento";
$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	echo "<script>
alert('Actualizacion Exitosa')
var btnactualizar_argumento=document.getElementById('btnactualizar_argumento').style.display='none';
var btnregistrar_argumento=document.getElementById('btnregistrar_argumento').style.display='block';
argumentos_registrados();
	</script>";
}

}

 ?>