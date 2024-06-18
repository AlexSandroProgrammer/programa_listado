<?php

session_start();

if (isset($_SESSION['username']) || isset($_SESSION['rol_user'])) {
    echo "<script>alert('Debes iniciar sesión');</script>";
    header("Location:../../admin/");
    exit; // Agregar exit para asegurar que el script se detenga
} else {
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CompromisoSE</title>
    <!--========================================
        Fuentes - Tipo de letra - Iconografia
    ==========================================-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../../assets/images/logoSenaEmpresa.png" type="image/x-icon">
    <!--========================================
        STYLES CSS
    ==========================================-->
    <link rel="stylesheet" href="../../../assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
                    <img src="../../../assets/images/ganaderia_slide.jpeg" alt="">
                </div>

                <!-- Slide 2 -->
                <div class="slide fade">
                    <img src="../../../assets/images/momotus_slide.jpg" alt="">
                </div>
                <!-- Slide 3 -->
                <div class="slide fade">
                    <img src="../../../assets/images/slide-img-1.jpg" alt="">
                </div>
                <!-- Slide 4 -->
                <div class="slide fade">
                    <img src="../../../assets/images/mecanizacion-slide.jpeg" alt="">
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
            Opciones
        ==========================================-->
        <div class="contenedor-texto">

            <div class="contenedor-form">

                <div class="container-center">

                    <h1 class="titulo"><img src="../../../assets/images/logoSenaEmpresa.png" alt="" class="log_free">
                    </h1>
                    <h1 class="titulo_login">CompromisoSE</h1>
                    <!-- Tabs -->
                    <ul class="tabs-links">
                    </ul>

                    <!--========================================
                        Formulario logue
                    ==========================================-->
                    <div class="formulario active">
                        <a class="btn" href="../../auth/pages/documents/">Modulo de Consulta</a>
                        <a class="btn" href="../../auth/">Modulo de
                            Administrador</a>
                        <a class="btn" id="mostrarConcepto" href="">¿Que Es Sena Empresa?</a>
                        <a class="btn" id="mostrarMision" href="">Mision</a>
                        <a class="btn" id="mostrarVision" href="">Vision</a>
                        <a class="btn" id="mostrarOrganigrama" href="">Organigrama</a>
                        <a class="btn" id="mostraResena" href="">Reseña Historica</a>
                        <a class="btn" id="mostrarPolitica" href="">Politica de Calidad</a>
                        <a class="btn-danger" href="https://senaempresalagranja.blogspot.com/">Regresar al Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--========================================
       Mis Scripts
    ==========================================-->
    <script src="../../../assets/js/login.js"></script>
    <script src="../../../assets/js/sweetalert.js"></script>
    <script src="../../../assets/js/script.js"></script>


</body>

</html>

<?php
}


?>