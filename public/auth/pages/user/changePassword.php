<?php

session_start();

require_once('../../../../database/connection.php');

$database = new Database();
$connection = $database->conectar();

if (isset($_SESSION['username']) || isset($_SESSION['rol_user'])) {
    echo "<script>alert('Debes iniciar sesión');</script>";
    header("Location:../../../admin/");
    exit; // Agregar exit para asegurar que el script se detenga
} else {
    function encriptar($texto, $token)
    {
        $clave = md5($token); // Generar clave a partir del token
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $textoEncriptado = openssl_encrypt($texto, 'aes-256-cbc', $clave, 0, $iv);
        return base64_encode($iv . $textoEncriptado);
    }

    $token = "11SXDLSLDDDDKFE332KDKS";


    if ((isset($_POST["changePassword"]))) {

        $correo_electronico = $_POST['emailEncripted'];
        echo $correo_electronico;

        $authEmail = $connection->prepare("SELECT * FROM usuarios WHERE email = ?");
        $authEmail->execute([$correo_electronico]);
        $email = $authEmail->fetch(PDO::FETCH_ASSOC);

        if ($email) {
            // ENVIO DE CORREO ELECTRONICO
            $emailUser = $email['email'];
            // Encriptacion del numero de documento 
            $emailEncriptado = encriptar($emailUser, $token);
            // obtenemos el nombre del hostname
            $hostname = gethostname();

            $asunto = "Cambio de contraseña de Sistema CompromisoSE";
            $message = "Estimado Usuario Administrador, se ha solicitado correctamente un cambio de contraseña para la dirección de correo electrónico:";
            $message .= "Para continuar, haz clic en el siguiente enlace e ingresa posteriormente la nueva contraseña:" . "\n ";
            $message .= "http://" . $hostname . "/programa_listado/public/auth/pages/user/updatePassword.php?smtp_url=" . urlencode($emailEncriptado);
            $admin_email = "From:" . $emailUser;
            if (mail($emailUser, $asunto, $message, $admin_email)) {
                echo '<script>alert("Estimado Usuario Administrador por favor verifica tu correo electronico, te hemos enviado toda la informacion requerida.");</script>';
                echo '<script>window.location="index.php"</script>';
            } else {
                echo '<script>alert("Error, no se pudo habilitar el cambio de contraseña");</script>';
                echo '<script>window.location="changePassword.php"</script>';
            }
        } else {
            echo '<script>alert("El correo electronico no esta registrado.");</script>';
            echo '<script>window.location="changePassword.php"</script>';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cambiar Contraseña || CompromisoSE</title>

    <!--========================================
            Fuentes - Tipo de letra - Iconografia
        ==========================================-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../../../assets/images/logoSenaEmpresa.png" type="image/x-icon">
    <!--========================================
        STYLES CSS
    ==========================================-->
    <link rel="stylesheet" href="../../../../assets/css/login.css">
</head>

<body>
    <!--========================================
       contenido
    ==========================================-->
    <div class="contenedor-login">
        <!--========================================
            Slider
        ==========================================-->
        <div class="contenedor-slider">
            <div class="slider">
                <!-- Slide 1 -->
                <div class="slide fade ">
                    <img src="../../../../assets/images/slide-img-1.jpg" alt="">
                </div>

                <!-- Slide 2 -->
                <div class="slide fade">
                    <img src="../../../../assets/images/slide-img-2.jpg" alt="">
                </div>
                <!-- Slide 2 -->
                <div class="slide fade">
                    <img src="../../../../assets/images/slide-img-3.jpg" alt="">
                </div>
            </div>

            <!-- Botones next y prev -->
            <a href="#" class="prev"><i class="fas fa-chevron-left"></i></a>
            <a href="#" class="next"><i class="fas fa-chevron-right"></i></a>

            <!-- dots -->
            <div class="dots">

            </div>

        </div>

        <!--========================================
                 Formularios
                ==========================================-->
        <div class="contenedor-texto">
            <div class="contenedor-form">
                <div class="container-center">
                    <h1 class="titulo"><img src="../../../../assets/images/logoSenaEmpresa.png" alt="" class="log_free">
                    </h1>
                    <div class="mt-5">
                        <h1 class="titulo_login">Confirmar Actualizacion de Contraseña </h1>
                        <p class="descripcion">Para realizar actualizacion de tu contraseña, necesitamos confirmar si
                            deseas que se envie todo el proceso de actualizacion a tu correo, para eso ingresa por favor
                            la direccion de correo electronico de sena empresa.</p>
                    </div>
                    <!-- Tabs -->
                    <ul class="tabs-links">
                    </ul>

                    <!--========================================
                        Formulario logue
                    ==========================================-->
                    <form action="" autocomplete="off" method="POST" id="formLogin" class="formulario active">
                        <div class="grupo-input">
                            <input type="password" autofocus placeholder="Ingresa tu corro electronico"
                                name="emailEncripted" class="input-text clave" title="Correo electronico" required
                                onkeyup="espacios(this)" minlength="6" maxlength="200">
                            <button type="button" class="icono fas fa-eye mostrarClave"></button>
                        </div>
                        <input class="btn" type="submit" name="changePassword" value="Enviar correo">
                        <a class="btn-danger" href="../../../auth/">regresar a la pagina principal</a>

                    </form>
                </div>

            </div>

        </div>

    </div>



    <!--========================================
       Mis Scripts
    ==========================================-->
    <script src="../../../../assets/js/login.js"></script>

    <script>
    // FUNCION QUE NO PERMITE INGRESAR ESPACIOS
    function espacios(e) {
        e.value = e.value.replace(/ /g, '');
    }
    </script>
</body>

</html>

<?php
}


?>