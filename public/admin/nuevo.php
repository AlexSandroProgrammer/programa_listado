<?php
session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection=$db->conectar();
#Salir si alguno de los datos no está presente
if(!isset($_POST["codigo"]) || !isset($_POST["name"]) || !isset($_POST["precio"]) || !isset($_POST["marca"]) || !isset($_POST["cantidad"])) exit();

#Si todo va bien, se ejecuta esta parte del código...


$codigo = $_POST["codigo"];
$name = $_POST["name"];
$precio = $_POST["precio"];
$marca = $_POST["marca"];
$cantidad = $_POST["cantidad"];

$product_register=$connection->prepare("SELECT * FROM productos WHERE codigo = '$codigo' OR name_pro = '$name'");
$product_register->execute();
$product=$product_register->fetchAll();


if($product){
	echo '<script> alert ("// El producto ya se encuentra registrado. //");</script>';
	echo '<script> window.location= "formulario.php"</script>';
	 exit;

}elseif($codigo == "" || $name == "" || $precio == "" || $marca == "" || $cantidad == "" ){
	echo '<script> alert ("// Estimado Usuario, debe ingresar todos los datos. //");</script>';
	echo '<script> window.location= "formulario.php"</script>';
	 exit;
}else{

    $sentencia = $connection->prepare("INSERT INTO productos(codigo, name_pro, precio, id_estado,id_marca, cantidad) VALUES (?, ?, ?,1, ?, ?);");
    $resultado = $sentencia->execute([$codigo, $name, $precio, $marca, $cantidad]);

    if($resultado === true) {
		echo '<script> alert ("//Producto registrado exitosamente. //");</script>';
        header("location:lista_products.php");
        exit;
    } else {
		echo '<script> alert ("//Algo salió mal. Por favor verifica que la tabla exista //");</script>';
		echo '<script> window.location= "formulario.php"</script>';
		exit;
    }
}
