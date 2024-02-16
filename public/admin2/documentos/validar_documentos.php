<?php

include '../conexion.php';

$documento = $_POST["documento"];


$destination = 'documentos/';

if (is_file($destination . $documento)) {
   echo "<script type='text/javascript'>alert('Error: Ya existe almacenado un archivo con ese nombre');</script>";

   exit;
} else {





   echo "<script type='text/javascript'>
var formulario=document.getElementById('formulario').action='enviar_documento.php';
var formulario=document.getElementById('formulario').submit();

   </script>";
}