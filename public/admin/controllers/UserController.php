<?php

// CONEXION A BASE DE DATOS
require_once '../../../database/connection.php';
$database = new Database();
$connection = $database->conectar();

// Configuración de la zona horaria
date_default_timezone_set('America/Bogota');

// ------------------------ FUNCTIONS OR METHODS ---------------------------------------
// FUNCTION CREATE USER
function registerUser($connection, $rol_user, $nombre_usuario, $usuario, $user_password)
{
    // Prepara la consulta SQL usando sentencias preparadas
    $registerUser = "INSERT INTO usuarios(rol,nombre_usuario,usuario,contrasena) VALUES (?,?,?,?)";
    $requestUser = $connection->prepare($registerUser);

    // Bind de los parámetros
    $requestUser->bindParam(1, $rol_user);
    $requestUser->bindParam(2, $nombre_usuario);
    $requestUser->bindParam(3, $usuario);
    $requestUser->bindParam(4, $user_password);


    // Ejecuta la consulta
    if ($requestUser->execute()) {
        return true; // Registro exitoso
    } else {
        return false; // Error al registrar el usuario
    }
}


// FUNCTION UPDATE USER
function updateUser($connection, $id_usuario, $rol, $names, $username)
{
    // Prepara la consulta SQL usando sentencias preparadas
    $updateUser = "UPDATE usuarios SET rol = ?, nombre_Usuario = ?, usuario = ? WHERE id_usuario = ?";
    $queryUser = $connection->prepare($updateUser);


    // Bind de los parámetros
    $queryUser->bindParam(1, $rol);
    $queryUser->bindParam(2, $names);
    $queryUser->bindParam(3, $username);
    $queryUser->bindParam(4, $id_usuario);


    // Ejecuta la consulta
    if ($queryUser->execute()) {
        return true; // Actualizacion exitosa
    } else {
        return false; // Error al actualizar el usuario
    }
}

// FUNCION DELETE USER 

// -------------------------------------


// RESPONSES 
function showErrorAndRedirect($message, $location)
{
    echo "<script>alert ('$message');</script>";
    echo "<script>window.location = '$location';</script>";
}

function showSuccessAndRedirect($message, $location)
{
    echo "<script>alert ('$message');</script>";
    echo "<script>window.location = '$location';</script>";
}



// CONSUMO DE FUNCIONES PARA REGISTRO DE USUARIO

if (isset($_POST["MM_forms"]) && $_POST["MM_forms"] == "formRegisterUser") {
    // Obtener datos del formulario
    $nombre_usuario = $_POST['names'];
    $usuario = $_POST['username'];
    $rol = $_POST['rol'];
    $password = $_POST['password'];

    // colocamos el nombre del rol totalmente en miniscula
    $rol_user = strtolower($rol);

    // CONSULTA SQL PARA VERIFICAR SI EL USUARIO YA EXISTE EN LA BASE DE DATOS

    $data = $connection->prepare("SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario' OR usuario = '$usuario'");
    $data->execute();
    $register_validation = $data->fetchAll();
    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {
        // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE
        echo '<script> alert ("// Estimado Usuario, los datos ingresados ya estan registrados. //");</script>';
        echo '<script> window.location= "../views/auth/index.php"</script>';
    } elseif ($nombre_usuario == "" || $usuario == "" || $password == "" || $rol_user == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert ("Estimado Usuario, Existen Datos Vacios En El Formulario");</script>';
        echo '<script> window.location="../views/auth/index.php"</script>';
    } else {
        // Hash de la contraseña
        $pass_encriptaciones = [
            'cost' => 15
        ];

        $user_password = password_hash($password, PASSWORD_DEFAULT, $pass_encriptaciones);

        // Registrar el usuario en la base de datos
        $userRegistered = registerUser($connection, $rol_user, $nombre_usuario, $usuario, $user_password);

        if ($userRegistered) {
            showSuccessAndRedirect("Usuario registrado correctamente.", "../views/index.php");
        } else {
            showErrorAndRedirect("Error al momento de registrar los datos.", "../views/crear-usuario.php");
        }
    }
}



if (isset($_POST["MM_formsUpdate"]) && $_POST["MM_formsUpdate"] == "formUpateUser") {
    // Obtener datos del formulario
    $names = $_POST['names'];
    $username = $_POST['username'];
    $rol = $_POST['rol'];
    $id_usuario = $_POST['id_usuario'];

    // Verificar si hay campos vacíos en el formulario
    if ($names == "" || $username == "" || $rol == "" || $id_usuario == "") {
        echo '<script>alert("Estimado Usuario, Existen Datos Vacios En El Formulario");</script>';
        echo '<script>window.location="../views/actualizar-usuario.php?id_user-edit=' . $id_usuario . '";</script>';
    } else {
        // CONSULTA SQL PARA VERIFICAR SI EL USUARIO YA EXISTE EN LA BASE DE DATOS
        $data = $connection->prepare("SELECT * FROM usuarios WHERE usuario = :username AND id_usuario != :id_usuario");
        $data->bindParam(':username', $username);
        $data->bindParam(':id_usuario', $id_usuario);
        $data->execute();
        $register_validation = $data->fetchAll();

        // Si el usuario ya existe
        if ($register_validation) {
            echo '<script>alert("Estimado Usuario, los datos ingresados ya están registrados.");</script>';
            echo '<script>window.location="../views/actualizar-usuario.php?id_user-edit=' . $id_usuario . '";</script>';
        } else {
            // Actualizar el usuario en la base de datos
            $userUpdated = updateUser($connection, $id_usuario, $rol, $names, $username);

            if ($userUpdated) {
                // Redireccionar con mensaje de éxito
                showSuccessAndRedirect("Usuario actualizado correctamente.", "../views/index.php");
            } else {
                // Redireccionar con mensaje de error

                showSuccessAndRedirect("Error al momento de actualizar los datos.", "../views/actualizar-usuario.php?id_user-edit=' . $id_usuario . '");
            }
        }
    }
}


// DELETE USER METHOD OR FUNCTION 
if (isset($_GET["id_user-delete"])) {
    $id_user_delete = $_GET['id_user-delete'];

    if ($id_user_delete !== null) {
        $delete = $connection->prepare("DELETE  FROM usuarios WHERE id_usuario = ' " . $id_user_delete . "'");
        $delete->execute();


        if ($delete) {
            echo '<script> alert ("// Los datos se eliminaron correctamente //");</script>';
            echo '<script> window.location= "../views"</script>';
        } else {
            echo '<script> alert ("// error al momento de eliminar los datos  //");</script>';
            echo '<script> window.location= "../views"</script>';
        }
    }
}
