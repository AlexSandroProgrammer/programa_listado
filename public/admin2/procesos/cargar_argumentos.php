<?php 

include '../conexion.php';

 ?>


 <div class="row">
 	<div class="col-md-4"><h3 class="help-block">Nombre PROCESOS</h3></div>
 </div>

 <?php 
$query="SELECT * FROM `proceso` ";
$resource=mysqli_query($conexion,$query);

while ($fila=mysqli_fetch_row($resource)) {
  ?>


<div class="row">
	<div class="col-md-4">
		<h4><?php echo "$fila[1]"; ?></h4>
<hr>
	</div>
	<div class="col-md-2">
		<input type="button" value="Actualizar" class="btn" onclick="actualizar_argumento(<?php echo "$fila[0],'$fila[1]'"; ?>)">
	</div>
</div>


	
 <?php 

}


  ?>
