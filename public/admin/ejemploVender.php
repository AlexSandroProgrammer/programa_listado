<?php
session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection = $db->conectar();

require_once("../../controller/validarSesion.php");

if (isset($_POST['btncerrar'])) {
    session_destroy();
    header("Location:../../index.php");
}

$consul = $connection->prepare("SELECT * FROM user WHERE id_type_user = 2");
$consul->execute();
$name = $consul->fetch();

$consul1 = $connection->prepare("SELECT * FROM motorcycles");
$consul1->execute();
$placa = $consul1->fetch();

$sql = $connection->prepare("SELECT * FROM user,type_user WHERE  username ='" . $_SESSION['usuario'] . "' AND user.id_type_user = type_user.id_type_user");
$sql->execute();
$usua = $sql->fetch(PDO::FETCH_ASSOC);


?>
<?php
$control = $connection->prepare("SELECT * FROM type_user");
$control->execute();
$type_user = $control->fetch(PDO::FETCH_ASSOC);


$comando = $connection->prepare("SELECT * FROM datetime_entry INNER JOIN user INNER JOIN type_user ON datetime_entry.document = user.document AND user.id_type_user = type_user.id_type_user ORDER BY id_entry DESC");
$comando->execute();
$resultado = $comando->fetch(PDO::FETCH_ASSOC);

?>
<?php

?>
<?php
if (!isset($_SESSION["productCart"])) $_SESSION["productCart"] = [];
if (!isset($_SESSION["documentCart"])) $_SESSION["documentCart"] = [];
if (!isset($_SESSION["serviceCart"])) $_SESSION["serviceCart"] = [];
$granTotal = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizontal Accordion Menu</title>
    <!-- Agrega los enlaces a los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Estilos CSS personalizados para el menú horizontal -->
    <style>
        .horizontal-menu {
            display: flex;
        }

        .horizontal-menu a {
            padding: 12px;
            text-decoration: none;
            color: #333;
            display: block;
            cursor: pointer;
            /* Cambia el cursor al hacer hover sobre los enlaces */
            flex: 1;
            /* Distribuye el espacio disponible entre los enlaces */
            text-align: center;
        }

        .horizontal-menu a:hover {
            background-color: #f1f1f1;
        }

        .horizontal-menu .content {
            display: none;
            flex: 1;
            /* Ajusta el tamaño del contenido al ancho del menú */
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="horizontal-menu">
            <!-- Primer enlace -->
            <a onclick="toggleContent('content1')">Enlace 1</a>

            <!-- Segundo enlace -->
            <a onclick="toggleContent('content2')">Enlace 2</a>

            <!-- Tercer enlace -->
            <a onclick="toggleContent('content3')">Enlace 3</a>
        </div>

        <!-- Contenedor de contenido -->
        <div class="content" id="content1">
            Contenido del Enlace 1
        </div>

        <div class="content" id="content2">
            Contenido del Enlace 2
        </div>

        <div class="content" id="content3">
            Contenido del Enlace 3
        </div>
    </div>

    <!-- Agrega los enlaces a los scripts de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function toggleContent(contentId) {
            var content = document.getElementById(contentId);
            var allContents = document.getElementsByClassName('content');

            // Ocultar todos los contenidos
            for (var i = 0; i < allContents.length; i++) {
                allContents[i].style.display = 'none';
            }

            // Mostrar el contenido seleccionado
            content.style.display = 'block';
        }

        // Ocultar todos los contenidos, excepto el del Enlace 1
        var allContents = document.getElementsByClassName('content');
        for (var i = 1; i < allContents.length; i++) {
            allContents[i].style.display = 'none';
        }
    </script>
</body>

</html>