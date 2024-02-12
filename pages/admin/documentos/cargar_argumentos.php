<?php 

include '../conexion.php';
$criterio=$_POST["criterio"];
 ?>


 <div class="row">
 	<div class="col-md-2"><h4 class="help-block">Area</h4></div>
 	<div class="col-md-2"><h4 class="help-block">Proceso</h4></div>
 	<div class="col-md-2"><h4 class="help-block">Procedimiento</h4></div>
 	<div class="col-md-2"><h4 class="help-block">Nombre Documento</h4></div>
 	<div class="col-md-1"><h4 class="help-block">Tipo Formato</h4></div>
 	<div class="col-md-2"><h4 class="help-block">Codigo</h4></div>


 </div>

 <?php 
$query="SELECT Id_Documento, area.Nombre_Area, proceso.Nombre_Proceso, procedimiento.Nombre_Procedimiento, `Nombre_Documento`, `Tipo_Documento`, `Codigo` FROM `documentos` 
INNER JOIN area ON documentos.Id_Area=area.Id_Area 
INNER join proceso ON documentos.Id_Proceso=proceso.Id_Proceso
INNER JOIN  procedimiento ON documentos.Id_Procedimiento=procedimiento.Id_Procedimiento 
WHERE area.Nombre_Area LIKE '%$criterio%' OR proceso.Nombre_Proceso LIKE '%$criterio%' OR procedimiento.Nombre_Procedimiento LIKE'%$criterio%' OR documentos.Nombre_Documento LIKE '%$criterio%' or documentos.Tipo_Documento LIKE '%$criterio%' OR documentos.Codigo LIKE '%$criterio%'";
$resource=mysqli_query($conexion,$query);

while ($fila=mysqli_fetch_row($resource)) {
  ?>


<div class="row">
	<div class="col-md-2"><p class="help-block"><?php echo "$fila[1] " ?></p></div>
 	<div class="col-md-2"><p class="help-block"><?php echo "$fila[2] " ?></p></div>
 	<div class="col-md-2"><p class="help-block"><?php echo "$fila[3] " ?></p></div>
 	<div class="col-md-2"><p class="help-block"><?php echo "$fila[4] " ?></p></div>
 	<div class="col-md-1"><p class="help-block"><?php echo "$fila[5] " ?></p></div>
 	<div class="col-md-2"><p class="help-block"><?php echo "$fila[6] " ?></p></div>
	<div class="col-md-1">
		<button type="button"    class="btn icon icon-pencil" title="Editar Archivo" onclick="actualizar_registro(<?php echo "$fila[0]"; ?>)"></button>
		<button type="button"  class="btn btn-danger icon icon-bin" title="Eliminar Archivo" onclick="Eliminar_registro(<?php echo "$fila[0], '$fila[4]'"; ?>)"></button>
	</div>
</div>


	
 <?php 

}


  ?>
