<?php

session_start();


if (isset($_SESSION['username']) || isset($_SESSION['rol_user'])) {
    echo "<script>alert('Debes iniciar sesión');</script>";
    header("Location:../../../admin/");
    exit; // Agregar exit para asegurar que el script se detenga
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Inicio de sesion || CompromisoSE</title>

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
                        <h1 class="titulo_login">Iniciar sesion </h1>
                        <p class="descripcion">Ingresa para crear nuevos formatos para los funcionarios o aprendices de la
                            entidad para su respectivo uso.</p>

                        <!-- Tabs -->
                        <ul class="tabs-links">
                        </ul>

                        <!--========================================
                        Formulario logue
                    ==========================================-->
                        <form action="../../controller/AuthController.php" autocomplete="off" method="POST" id="formLogin" class="formulario active">

                            <input type="text" autofocus placeholder="Ingresa tu nombre de usuario" class="input-text" name="username" required autocomplete="off">

                            <div class="grupo-input">
                                <input type="password" placeholder="Ingresa tu Contraseña" name="password" class="input-text clave" title="Debe tener de 6 a 12 digitos" required onkeyup="espacios(this)" minlength="6" maxlength="100">
                                <button type="button" class="icono fas fa-eye mostrarClave"></button>
                            </div>


                            <input class="btn" type="submit" name="iniciarSesion" value="Iniciar Sesion">
                            <a class="btn-update" href="../../../auth/pages/user/changePassword.php">Cambiar Contraseña</a>
                            <a class="btn-danger" href="../../../module/">Regresar</a>

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
            // FUNCION QUE PERMITE PONER EL TEXT EN MAYUSCULA
            function mayuscula(e) {
                e.value = e.value.toUpperCase();
            }

            // FUNCION QUE PERMITE PONER EL TEXT EN MINUSCULA
            function minuscula(e) {
                e.value = e.value.toLowerCase();
            }

            // FUNCION QUE NO PERMITE INGRESAR ESPACIOS
            function espacios(e) {
                e.value = e.value.replace(/ /g, '');
            }

            // <!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO EL NUMERO VALORES REQUERIDOS DE ACUERDO A LA LONGITUD MAXLENGTH DEL CAMPO -->
            function maxlengthNumber(obj) {

                if (obj.value.length > obj.maxLength) {
                    obj.value = obj.value.slice(0, obj.maxLength);
                    alert("Debe ingresar solo el numeros de digitos requeridos");
                }
            }

            // <!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO NUMEROS EN EL FORMULARIO ASIGNADO -->
            function multiplenumber(e) {
                key = e.keyCode || e.which;

                teclado = String.fromCharCode(key).toLowerCase();

                numeros = "1234567890";

                especiales = "8-37-38-46-164-46";

                teclado_especial = false;

                for (var i in especiales) {
                    if (key == especiales[i]) {
                        teclado_especial = true;
                        alert("Debe ingresar solo numeros en el formulario");
                        break;
                    }
                }

                if (numeros.indexOf(teclado) == -1 && !teclado_especial) {
                    return false;
                    alert("Debe ingresar solo numeros en el formulario ");
                }
            }


            // <!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO LETRAS. NUMEROS Y GUIONES BAJOS PARA LA CONTRASEÑA   -->
            function validarPassword(event) {
                // Obtenemos la tecla que se ha presionado
                var key = event.keyCode || event.which;

                // Convertimos el código de la tecla a su respectivo carácter
                var char = String.fromCharCode(key);

                // Definimos una expresión regular que solo permita números, letras y guiones bajos
                var regex = /[0-9a-zA-Z_]/;

                // Validamos si el carácter ingresado cumple con la expresión regular
                if (!regex.test(char)) {
                    // Si no cumple, cancelamos el evento de ingreso de datos
                    event.preventDefault();
                    return false;
                }
            }
        </script>

    </body>

    </html>

<?php
}


?>