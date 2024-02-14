<?php 

include '../conexion.php';


$id_area=$_POST["id_area"];
$id_proceso=$_POST["id_proceso"];
$id_procedimiento=$_POST["id_procedimiento"];
$nombre_documento=$_POST["nombre_documento"];
$Id_tipo_doc=$_POST["Id_tipo_doc"];
$Codigo_documento=$_POST["Codigo_documento"];
$version=$_POST["version"];
$Fecha_doc=$_POST["Fecha_doc"];
$Id_Responsable=$_POST["Id_Responsable"];

$xsdc=$_POST["xsdc"];
  $Nombre_Documento_Magnetico = $_FILES['documento']['name'];
if ($Nombre_Documento_Magnetico=="") {



   $consulta=mysqli_query($conexion," UPDATE `documentos` SET `Id_Area`=$id_area,`Id_Proceso`=$id_proceso,`Id_Procedimiento`=$id_procedimiento,`Nombre_Documento`='$nombre_documento',`Tipo_Documento`='$Id_tipo_doc',`Codigo`='$Codigo_documento',`Version`='$version',`Fecha_Elaboracion`='$Fecha_doc',`Id_Responsable`='$Id_Responsable' WHERE Id_Documento='$xsdc'");

   if ($consulta==true) {
     echo "<script type='text/javascript'>alert('actualizacion Exitosa');

        location='index.php';</script>";
   }else{

      echo "<script type='text/javascript'>alert('error');

        location='index.php';</script>";
   }



}else{


 $consulta=mysqli_query($conexion," SELECT Nombre_Documento_Magnetico FROM `documentos`  WHERE Id_Documento='$xsdc'");

 $fila=mysqli_fetch_row($consulta);

unlink("documentos/" . $fila[0]);

if ( isset( $_FILES ) && isset( $_FILES['documento'] ) && !empty( $_FILES['documento']['name'] && !empty($_FILES['documento']['tmp_name']) ) ) {
  //Hemos recibido el fichero
  //Comprobamos que es un fichero subido por PHP, y no hay inyección por otros medios
  if ( ! is_uploaded_file( $_FILES['documento']['tmp_name'] ) ) {
    echo "Error: El fichero encontrado no fue procesado por la subida correctamente";
    exit;
  } 
  $source = $_FILES['documento']['tmp_name'];
  $destination ='documentos/'.$_FILES['documento']['name'];
      
  if ( is_file($destination) ) {
   echo "<script type='text/javascript'>alert('Error: Ya existe almacenado un fichero con ese nombre');location='index.php'</script>";
   @unlink(ini_get('upload_tmp_dir').$_FILES['documento']['tmp_name']);
   exit;
  }

  if ( ! @move_uploaded_file($source, $destination ) ) {

      echo "<script type='text/javascript'>alert('Error: No se ha podido mover el fichero enviado a la carpeta de destino');location='index.php'</script>";
    @unlink(ini_get('upload_tmp_dir').$_FILES['documento']['tmp_name']);
    exit;
  }
  $Nombre_Documento_Magnetico = $_FILES['documento']['name'];
     $consulta=mysqli_query($conexion," UPDATE `documentos` SET `Id_Area`=$id_area,`Id_Proceso`=$id_proceso,`Id_Procedimiento`=$id_procedimiento,`Nombre_Documento`='$nombre_documento',`Tipo_Documento`='$Id_tipo_doc',`Codigo`='$Codigo_documento',`Version`='$version',`Fecha_Elaboracion`='$Fecha_doc',`Id_Responsable`='$Id_Responsable',`Nombre_Documento_Magnetico`='$Nombre_Documento_Magnetico' WHERE Id_Documento='$xsdc'");

   if ($consulta==true) {
     echo "<script type='text/javascript'>alert('actualizacion Exitosa');

        location='index.php';</script>";
   }else{

      echo "<script type='text/javascript'>alert('error');

        location='index.php';</script>";
   }

        
}


}




 ?>