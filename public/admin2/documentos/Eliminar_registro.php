<?php 

include '../conexion.php';

$id_registro=$_POST["id_registro"];
$nombre_mag=$_POST["nombre_mag"];

unlink("documentos/" . $nombre_mag);


$query="DELETE FROM `documentos` WHERE `Id_Documento`=$id_registro";
$resource=mysqli_query($conexion,$query);

   echo "<script>
alert('Documento $nombre_mag Eliminado con Exito');

 argumentos_registrados();
   </script>";




 ?>