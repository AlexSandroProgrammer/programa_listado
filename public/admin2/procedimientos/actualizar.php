<?php 

include '../conexion.php';
$id_argumento=$_POST["id_argumento"];
$argumento=$_POST["argumento"];

$query="SELECT * FROM `procedimiento` WHERE `Id_Procedimiento`!=$id_argumento AND `Nombre_Procedimiento`='$argumento'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==true) {
	echo "<script>

alert('Ya Existe $argumento')
	</script>";
}else{

$query="UPDATE `procedimiento` SET `Nombre_Procedimiento`='$argumento' WHERE `Id_Procedimiento`=$id_argumento";
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