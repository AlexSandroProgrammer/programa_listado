<?php
session_start();
// CONEXIN A BASE DE DATOS 
require_once("../../../database/connection.php");
$database = new Database();
$connection = $database->conectar();
date_default_timezone_set('America/Bogota');


if (isset($_POST["MM_forms"]) && $_POST["MM_forms"] == "formChangePassword") {

    // VARIABLES DE ASIGNACION DE VALORES QUE SE ENVIA DEL FORMULARIO REGISTRO DE PROCESOS
    $password = $_POST['password'];
    $passwordConfirm = $_POST['password-two'];
    $id_user = $_SESSION['username'];


    if ($password == "" || $passwordConfirm == "" || $id_user ==  "") {
        echo '<script> alert ("Estimado Usuario, Existen Datos Vacios En El Formulario");</script>';
        echo '<script> windows.location= "../views/change-password.php"</script>';
    } else if ($password !== $passwordConfirm) {
        echo '<script> alert ("Las dos contraseñas deben ser iguales.");</script>';
        echo '<script> window.location= "../views/change-password.php"</script>';
    } else {


        // SI SE CUMPLE LA CONSULTA ES PORQUE EL REGISTRO YA EXISTE

        // VARIABLES QUE CONTIENE EL NUMERO DE ENCRIPTACIONES DE LAS CONTRASEÑAS
        $pass_encriptaciones = [
            'cost' => 15
        ];

        $password_hash = password_hash($password, PASSWORD_DEFAULT, $pass_encriptaciones);

        $update = $connection->prepare("UPDATE usuarios SET contrasena='$password_hash' WHERE id_usuario='$id_user'");
        $update->execute();
        // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE  
        echo '<script> alert ("//Estimado Usuario la actualizacion se ha realizado exitosamente. //");</script>';
        echo '<script> window.location= "../views/"</script>';
    }
}