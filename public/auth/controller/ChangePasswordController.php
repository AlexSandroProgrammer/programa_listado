<?php

// CONEXION A BASE DE DATOS
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

// VALIDACION DEL CAMBIO DE CONTRASEÑA
if (isset($_POST["changePassword"])) {

    // VARIABLES DE ASIGNACION DE VALORES QUE SE ENVIA DEL FORMULARIO REGISTRO DE PROCESOS
    $password = $_POST['passswordNew'];
    $passwordConfirm = $_POST['passswordNewConfirm'];
    $id_user = $_POST['email_user'];


    if ($password == "" || $passwordConfirm == "" || $id_user ==  "") {
        echo '<script> alert ("Estimado Usuario, Existen Datos Vacios En El Formulario");</script>';
        echo '<script> windows.location= "../pages/user/changePassword.php"</script>';
    } else if ($password !== $passwordConfirm) {
        echo '<script> alert ("Las dos contraseñas deben ser iguales.");</script>';
        echo '<script> window.location.href= "http://espaprcajgsw002/programa_listado/public/auth/pages/user/updatePassword.php?smtp_url=XGHvVZERRr04tp%2Fxvmv%2BxnBDczIzZFRMeS9DSWpYTTZkOHlxdHZQZEFSNy9SSUt2MjF5L2lkZEZNcjg9"</script>';
    } else {
        // CONSULTA SQL PARA VERIFICAR SI EL REGISTRO YA EXISTE EN LA BASE DE DATOS
        $db_validation = $connection->prepare("SELECT * FROM usuarios WHERE email = ?");
        $db_validation->execute([$id_user]);
        $update_validation = $db_validation->fetch(PDO::FETCH_ASSOC);

        // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
        if ($update_validation) {
            // SI SE CUMPLE LA CONSULTA ES PORQUE EL REGISTRO YA EXISTE

            // VARIABLES QUE CONTIENE EL NUMERO DE ENCRIPTACIONES DE LAS CONTRASEÑAS
            $pass_encriptaciones = [
                'cost' => 15
            ];

            $password_hash = password_hash($password, PASSWORD_DEFAULT, $pass_encriptaciones);

            $update = $connection->prepare("UPDATE usuarios SET contrasena='$password_hash' WHERE email='$id_user'");
            $update->execute();
            // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE  
            echo '<script> alert ("//Estimado Usuario la actualizacion se ha realizado exitosamente. //");</script>';
            echo '<script> window.location= "../pages/user/"</script>';
        } else {
            echo '<script>alert ("Error al momento de actualizar la contraseña, el usuario no fue encontrado.");</script>';
            echo '<script> window.location.href= "../pages/user/"</script>';
        }
    }
}

header('../');
