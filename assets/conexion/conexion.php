<?php
$servidor = "localhost"; //el servidor que utilizaremos, en este caso será el localhost
$usuario = "root"; //El usuario que tiene mysql por defecto
$contrasenha = ""; //La contraseña del usuario que utilizaremos
$BD = "listado_maestro"; //El nombre de la base de datos
error_reporting(E_ALL ^ E_NOTICE);
 
/*Aquí abrimos la conexión en el servidor.
Normalmente se envian 3 parametros (los datos del servidor, usuario y contraseña) a la función mysql_connect,
si no hay ningún error la conexión será un éxito
El @ que se ponde delante de la funcion, es para que no muestre el error al momento de ejecutarse, ya crearemos un código para eso*/
$conexion = mysqli_connect($servidor, $usuario, $contrasenha,$BD);
/*En esta linea seleccionaremos la BD con la que trabajaremos y le pasaremos como referencia la conexión al servidor.
Para saber si se conecto o no a la BD podríamos utilizar el IF de la misma forma que la utilizamos al momento de conectar al servidor, pero usaremos otra forma de comprobar eso usando die().
*/
// $con=mysql_select_db($BD, $conexion) or die(mysql_error($conexion));
 $conexion->set_charset('utf8');
?>