<?php

// CONEXION A BASE DE DATOS
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

//  REGISTRO DE PROCESO

if (isset($_POST["validateUser"])) {

    // VARIABLES DE ASIGNACION DE VALORES QUE SE ENVIA DEL FORMULARIO REGISTRO DE PROCESOS
    $usuario = $_POST['username'];

    if ($usuario == "") {
        echo '<script> alert ("Estimado Usuario, Existen Datos Vacios En El Formulario");</script>';
        echo '<script> windows.location= "../pages/user/changePassword.php"</script>';
    } else {
        // CONSULTA SQL PARA VERIFICAR SI EL REGISTRO YA EXISTE EN LA BASE DE DATOS
        $db_validation = $connection->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $db_validation->execute([$usuario]);
        $update_validation = $db_validation->fetch(PDO::FETCH_ASSOC);

        // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
        if ($update_validation) {
            // SI SE CUMPLE LA CONSULTA ES PORQUE EL REGISTRO YA EXISTE
            echo '<script> alert ("// Sus datos se han encontrado correctamente, a continuacion ingrese la contraseña que sera registrada en su cuenta.  //");</script>';
            echo '<script> window.location= "../pages/user/updatePassword.php?smtp=' . $update_validation['id_usuario'] . '"</script>';
        } else {
            echo '<script>alert ("Los datos enviados no estan registrados.");</script>';
            echo '<script>window.location="../pages/user/changePassword.php"</script>';
        }
    }
}


if (isset($_POST["changePassword"])) {

    // VARIABLES DE ASIGNACION DE VALORES QUE SE ENVIA DEL FORMULARIO REGISTRO DE PROCESOS
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];
    $id_user = $_POST['id_user'];


    if ($password == "" || $passwordConfirm == "" || $id_user ==  "") {
        echo '<script> alert ("Estimado Usuario, Existen Datos Vacios En El Formulario");</script>';
        echo '<script> windows.location= "../pages/user/changePassword.php"</script>';
    } else if ($password !== $passwordConfirm) {
        echo '<script> alert ("Las dos contraseñas deben ser iguales.");</script>';
        echo '<script> window.location= "../pages/user/updatePassword.php?smtp=' . $id_user . '"</script>';
    } else {
        // CONSULTA SQL PARA VERIFICAR SI EL REGISTRO YA EXISTE EN LA BASE DE DATOS
        $db_validation = $connection->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
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

            $update = $connection->prepare("UPDATE usuarios SET contrasena='$password_hash' WHERE id_usuario='$id_user'");
            $update->execute();
            // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE  
            echo '<script> alert ("//Estimado Usuario la actualizacion se ha realizado exitosamente. //");</script>';
            echo '<script> window.location= "../pages/user/"</script>';
        } else {
            echo '<script>alert ("Error al momento de actualizar la contraseña.");</script>';
            echo '<script>window.location="../pages/user/"</script>';
        }
    }
}

header('../');
