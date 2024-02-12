<!DOCTYPE html>
<html lang="en">

<head>
    <?php 

	?>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>LISTADO MAESTRO AREAS</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</head>

<body>

    <div class="navbar navbar-dark bg-dark mb-6 px-4">
        <div class="navbar-brand col-md-4">
            <input type="text" class="form-control" id="criterio" onkeyup="filtrar()" onfocus="cambiar_color_1()"
                placeholder="FILTRAR DOCUMENTOS" name="">
            <div class="container-fluid mt-6">
                <div class="row" id="contenedor">
                </div>
            </div>
        </div>
    </div>


    <script>
    filtrar();

    function filtrar() {
        var criterio = document.getElementById('criterio').value;

        $("#contenedor").load("cargar_archivos.php", {
            criterio: criterio
        })
    }

    function cambiar_color() {
        var criterio = document.getElementById("criterio").style.background = "transparent";
        var criterio = document.getElementById("criterio").placeholder = "";
        var criterio = document.getElementById("criterio").style.color = "transparent";
    }

    function cambiar_color_1() {
        var criterio = document.getElementById("criterio").style.background = "white";
        var criterio = document.getElementById("criterio").placeholder = "FILTRAR DOCUMENTOS";
        var criterio = document.getElementById("criterio").style.color = "black";
    }
    </script>

</body>

</html>