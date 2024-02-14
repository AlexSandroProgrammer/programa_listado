<?php
session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection=$db->conectar();

#Salir si alguno de los datos no está presente
if ((isset($_POST["updateProducts"])) && ($_POST["updateProducts"] == "formUpdate")){

    #Si todo va bien, se ejecuta esta parte del código...
    $id = $_POST["id"];
    $codigo = $_POST["codigo"];
    $name = $_POST["name"];
    $precio = $_POST["precio"];
    $marca = $_POST["marca"];
    $cantidad = $_POST["cantidad"];
    $agregar = $_POST["cantidad_agregada"];
    $total = $cantidad + $agregar;


    if($id == "" || $codigo == "" || $name == "" || $precio == "" || $cantidad == "") {

    } else {
        $sentencia = $connection->prepare("UPDATE productos SET codigo = ?, name_pro = ?, precio = ?, id_marca = ?, cantidad = ? WHERE id = ?;");
        $resultado = $sentencia->execute([$codigo, $name, $precio, $marca, $total, $id]);

        if($resultado) {
            echo '<script>alert ("Actualiza exitosa");</script>';
            echo '<script>window.location="lista_products.php"</script>';
        } else {
            echo '<script>alert ("Error: El producto no se actualizo correctamente.");</script>';
            echo '<script>window.location="lista_products.php"</script>';
        }
    }

}



