<?php

session_start();
if (isset($_SESSION['username']) || isset($_SESSION['rol_user'])) {
    echo "<script>alert('Debes iniciar sesión');</script>";
    header("Location:../../../admin/");
    exit; // Agregar exit para asegurar que el script se detenga
} else {

    if (!empty($_GET["smtp_url"])) {
        function desencriptar($textoEncriptado, $token)
        {
            $clave = md5($token); // Generar clave a partir de la semilla
            $textoEncriptado = base64_decode($textoEncriptado);
            $ivTamanio = openssl_cipher_iv_length('aes-256-cbc');
            $iv = substr($textoEncriptado, 0, $ivTamanio);
            $textoEncriptado = substr($textoEncriptado, $ivTamanio);
            return openssl_decrypt($textoEncriptado, 'aes-256-cbc', $clave, 0, $iv);
        }

        $emailUser = $_GET['smtp_url'];
        // token para desencriptar el email del usuario 
        $token = "11SXDLSLDDDDKFE332KDKS";

        $emailDesencripted = desencriptar($emailUser, $token);
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
                            deseas que se envie todo el proceso de actualizacion a tu correo.</p>
                    </div>
                    <!-- Tabs -->
                    <ul class="tabs-links">
                    </ul>

                    <!--========================================
                        Formulario logue
                    ==========================================-->
                    <form action="../../controller/ChangePasswordController.php" autocomplete="off" method="POST"
                        id="formLogin" class="formulario active">

                        <input type="hidden" name="email_user" value="<?php echo $emailDesencripted ?>">

                        <div class="grupo-input">
                            <input type="password" autofocus placeholder="Ingresa la nueva contraseña"
                                name="passswordNew" class="input-text clave" title="Nueva contraseña" required
                                onkeyup="espacios(this)" minlength="6" maxlength="100">
                            <button type="button" class="icono fas fa-eye mostrarClave"></button>
                        </div>
                        <div class="grupo-input">
                            <input type="password" placeholder="Confirmacion de contraseña nueva"
                                name="passswordNewConfirm" class="input-text clave" title="Confirmar contraseña"
                                required onkeyup="espacios(this)" minlength="6" maxlength="100">
                            <button type="button" class="icono fas fa-eye mostrarClave"></button>
                        </div>
                        <input class="btn" type="submit" name="changePassword" value="actualizar contraseña">
                        <a class="btn-danger" href="../../../auth/">Regresar a la pagina principal</a>
                    </form>
                </div>

            </div>

        </div>

    </div>



    <!--========================================
       Mis Scripts
    ==========================================-->
    <script src="../../../../assets/js/login.js"></script>

</body>

</html>


<?php
    } else {
        echo "<script>alert('No se cumplen los parametros requeridos para ingresar a esta pagina');</script>";
        header("Location:index.php");
    }
}


?>