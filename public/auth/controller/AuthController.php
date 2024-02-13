<?php
session_start();
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

if (isset($_POST["iniciarSesion"])) {
    $username = $_POST["username"];
    $passwordLog = $_POST['password'];

    // Realiza la consulta de autenticación
    $authValidation = $connection->prepare("SELECT * FROM usuarios WHERE usuario = :username");
    $authValidation->bindParam(':username', $username);
    $authValidation->execute();
    $authSession = $authValidation->fetch();

    if ($authSession && password_verify($passwordLog, $authSession['contrasena'])) {
        // Si la autenticación es exitosa
        $_SESSION['rol_user'] = $authSession['rol'];

        if ($_SESSION['rol_user'] == 'administrador') {
            header("Location:../../admin/index.php");
        } else {
            session_destroy();
            echo '<script>alert("No tienes permiso para acceder a este tipo de cuenta.");</script>';
            echo '<script>window.location="../pages/user/errorLogin.php"</script>';
        }
    } else {
        // Autenticación fallida
        echo '<script>alert("Los datos ingresados son incorrectos, Por favor inténtelo nuevamente.");</script>';
        echo '<script>window.location="../pages/user/errorLogin.php"</script>';
    }
}
?>