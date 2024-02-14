<?php

session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection = $db->conectar();

date_default_timezone_set('America/Bogota');
?>

<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formreg")) {

    $nombre = $_POST['name']; 
    $precio = $_POST['precio'];
    $codigo = $_POST['codigo'];
    $cantidad = $_POST['cantidad'];



    $exami = $connection->prepare("SELECT * FROM documentos WHERE nombre='$nombre'");
    $exami->execute();
    $register_validation = $exami->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {

        // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE  
        echo '<script> alert ("//Estimado Usuario, el documento ya se encuentra registrado //");</script>';
        echo '<script> window.location= "documentos.php"</script>';
    } else if ($codigo == "" || $nombre == "" || $precio == "" || $cantidad == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert (" //Estimado usuario existen datos vacios. //");</script>';
        echo '<script> window.location= "documentos.php"</script>';
    } else {
        // DECISION QUE PERMITE REALIZAR EL ENVIO DE LA INFORMACION MEDIANTE LA BASE DE DATOS //
        $register_user = $connection->prepare("INSERT INTO documentos(codigo,nombre,precio,fecha_registro,cantidad) VALUES ('$codigo','$nombre','$precio', NOW(),'$cantidad')");
        $register_user->execute();
        echo '<script>alert("// Estimado Usuario el registro del nuevo documento ha sido exitoso. //");</script>';
        echo '<script>window.location="lista_documento.php"</script>';
    }
}


$sql = $connection->prepare("SELECT * FROM user,type_user WHERE  username ='" . $_SESSION['usuario'] . "' AND user.id_type_user = type_user.id_type_user");
$sql->execute();
$usua = $sql->fetch(PDO::FETCH_ASSOC);
$user_report = $connection->prepare("SELECT * FROM user INNER JOIN type_user INNER JOIN state INNER JOIN gender ON user.id_type_user = type_user.id_type_user AND user.id_gender=gender.id_gender AND user.id_state=state.id_state");
$user_report->execute();
$reporte = $user_report->fetch(PDO::FETCH_ASSOC);
$connection = $db->conectar();
$query = $connection->prepare("SELECT * FROM marca");
$query->execute();
$fila = $query->fetch();
$comando = $connection->prepare("SELECT * FROM datetime_entry INNER JOIN user INNER JOIN type_user ON datetime_entry.document = user.document AND user.id_type_user = type_user.id_type_user ORDER BY id_entry  DESC LIMIT 6");
$comando->execute();
$resultado = $comando->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['btncerrar'])) {
    session_destroy();
    header("Location:../../index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="main.css">

    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../controller/css/custom.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>REGISTRAR SEGURO || SIFER-APP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../controller/CSS/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="../../controller/CSS/custom.css">
    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../controller/image/favicon.png" type="image/x-icon">

    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <!--font awesome con CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>

<body>
    <div class="wrapper">
        <?php

        require_once('menu.php');

        ?>
        <div class="xp-breadcrumbbar text-center">
            <h2 class="page-title"><span>Bienvenido <?php echo $usua['type_user'] ?> <?php echo $usua['name'] ?></span></h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Registrar</a></li>
                <li class="breadcrumb-item active" aria-curent="page">Seguros</li>
            </ol>
        </div>

    </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="col-xs-12">
            <h1>Nuevo Seguro</h1>
            <form method="post" action="" autocomplete="off" name="formreg">
                <label for="codigo">Código de barras:</label>
                <input class="form-control" name="codigo" maxlength="8" required type="number" oninput="maxlengthNumber(this);" id="codigo" placeholder="Escribe el codigo">

                <label for="descripcion">Nombre del Seguro:</label>
                <input required id="descripcion" name="name" cols="30" maxlength="20" rows="5" onkeypress="return(multipletext(event));" class="form-control" placeholder="Escriba el nombre del producto"></input>

                <label for="precioVenta">Precio del documento:</label>
                <input class="form-control" name="precio" maxlength="7" required type="number" oninput="maxlengthNumber(this);" id="precioVenta" placeholder="Precio ">

                <input class="form-control" name="cantidad" required type="hidden" value="1" maxlength="4" oninput="maxlengthNumber(this);" id="existencia" placeholder="Cantidad o existencia">

                <ul class="container mt-3">
                    <input class="btn btn-info mb-3" type="submit" value="Guardar">
                    <input type="hidden" name="MM_insert" value="formreg">
                    <a class="btn btn-danger mb-3" href="./index.php">Cancelar Registro</a>
                </ul>

            </form>
        </div>
    </div>


    <?php

    require_once('formularios_crear.php');

    ?>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>
    <script>
        function maxlengthNumber(obj) {

            if (obj.value.length > obj.maxLength) {
                obj.value = obj.value.slice(0, obj.maxLength);
                alert("Debe ingresar solo el numeros de digitos requeridos");
            }
        }
    </script>

    <script>
        function maxcelNumber(obj) {

            if (obj.value.length > obj.maxLength) {
                obj.value = obj.value.slice(0, obj.maxLength);
                alert("Debe ingresar solo 10 numeros.");
            }
        }
    </script>
    <!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO LETRAS -->

    <script>
        function multipletext(e) {
            key = e.keyCode || e.which;

            teclado = String.fromCharCode(key).toLowerCase();

            letras = "qwertyuiopasdfghjklñzxcvbnm ";

            especiales = "8-37-38-46-164-46";

            teclado_especial = false;

            for (var i in especiales) {
                if (key == especiales[i]) {
                    teclado_especial = true;
                    alert("Debe ingresar solo letras y espacios en el campo");

                    break;
                }
            }

            if (letras.indexOf(teclado) == -1 && !teclado_especial) {
                return false;
                alert("Debe ingresar solo letras y espacios en el campo");
            }
        }
    </script>

    <script>
        function solonumeros(evt) {
            if (window.event) {
                keynum = evt.keyCode;
            } else {
                keynum = evt.wich;
            }
        }
    </script>
    <!-- para usar botones en datatables JS -->
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

    <!-- código JS propìo-->
    <script type="text/javascript" src="main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".xp-menubar").on('click', function() {
                $("#sidebar").toggleClass('active');
                $("#content").toggleClass('active');
            });

            $('.xp-menubar,.body-overlay').on('click', function() {
                $("#sidebar,.body-overlay").toggleClass('show-nav');
            });

        });
    </script>


</body>

</html>