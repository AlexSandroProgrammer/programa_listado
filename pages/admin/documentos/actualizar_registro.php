<?php 
include '../conexion.php';


$id_registro_actualizar=$_POST["id_registro_actualizar"];

$query="SELECT `Id_Area`, `Id_Proceso`, `Id_Procedimiento`, `Nombre_Documento`,`Tipo_Documento`, `Codigo`, `Version`, `Fecha_Elaboracion`, `Id_Responsable`,Nombre_Documento_Magnetico FROM `documentos` WHERE `Id_Documento`=$id_registro_actualizar";
$resource=mysqli_query($conexion,$query);

$fila=mysqli_fetch_row($resource);

  echo "<script>

var id_area=document.getElementById('id_area').value='$fila[0]';
var id_proceso=document.getElementById('id_proceso').value='$fila[1]';
var id_procedimiento=document.getElementById('id_procedimiento').value='$fila[2]';
var nombre_documento=document.getElementById('nombre_documento').value='$fila[3]';
var Id_tipo_doc=document.getElementById('Id_tipo_doc').value='$fila[4]';
var Codigo_documento=document.getElementById('Codigo_documento').value='$fila[5]';
var version=document.getElementById('version').value='$fila[6]';
var Fecha_doc=document.getElementById('Fecha_doc').value='$fila[7]';
var Id_Responsable=document.getElementById('Id_Responsable').value='$fila[8]';

var xsdc=document.getElementById('xsdc').value='$id_registro_actualizar';

   </script>";




 ?>