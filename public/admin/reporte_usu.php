<?php

session_start();
require_once("../../database/connection.php");
$db = new Database();

$connection = $db->conectar();

$sql = $connection->prepare("SELECT * FROM user,type_user WHERE  username ='" . $_SESSION['usuario'] . "' AND user.id_type_user = type_user.id_type_user");
$sql->execute();
$usua = $sql->fetch(PDO::FETCH_ASSOC);
$user_report = $connection->prepare("SELECT * FROM user INNER JOIN type_user INNER JOIN state INNER JOIN gender ON user.id_type_user = type_user.id_type_user AND user.id_gender=gender.id_gender AND user.id_state=state.id_state");
$user_report->execute();
$reporte = $user_report->fetch(PDO::FETCH_ASSOC);

$comando = $connection->prepare("SELECT * FROM user INNER JOIN type_user INNER JOIN gender INNER JOIN state ON user.id_type_user = type_user.id_type_user AND user.id_gender=gender.id_gender  AND user.id_state=state.id_state");
$comando->execute();
$resultado = $comando->fetch(PDO::FETCH_ASSOC);
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
    <title>LISTA DE USUARIOS</title>
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
        <div id="sidebar">
            <div class="sidebar-header">
                <h3><img src="../../controller/image/favicon.png" class="img-fluid" /><span><?php echo $usua['type_user'] ?> <span><?php echo $usua['name'] ?></span></h3>
                <h3><span></span></h3>
            </div>
            <ul class="list-unstyled component m-0">
                <li class="active">
                    <a href="index.php" class="dashboard"><i class="material-icons">dashboard</i>Menu Principal </a>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmen15" data-toggle="collapse" class="dropdown-toggle">
                        <i class="material-icons">dashboard</i>Act. Recientes
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmen15">
                        <li><a href="act_trabajador.php">Actividades Trabajadores</a></li>
                        <li><a href="act_cliente.php">Actividades Clientes</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmen20" data-toggle="collapse" class="dropdown-toggle">
                        <i class="material-icons">dashboard</i>Editar Cuenta
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmen20">
                        <li><a href="./contrasena.php">Cambiar contraseña</a></li>

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmen11" data-toggle="collapse" class="dropdown-toggle">
                        <i class="material-icons">dashboard</i>Crear
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmen11">
                        <li><a href="crear_color.php">Crear Color</a></li>
                        <li><a href="crear_modelo.php">Crear Modelo</a></li>
                        <li><a href="crear_marca.php">Crear Marca</a></li>
                        <li><a href="crear_combustible.php">Crear Combustible</a></li>
                        <li><a href="crear_tipo.php">Crear T.Usuario</a></li>
                        <li><a href="categoria.php">Categoria Producto</a></li>
                        <li><a href="carroceria.php">Crear Carroceria</a></li>
                        <li><a href="crear_cilindraje.php">Crear Cilindraje</a></li>
                        <li><a href="servicio_moto.php">Crear Serv. Moto</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">apps</i>Usuarios
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu2">
                        <li><a href="crear_usu.php">Crear Usuario</a></li>
                        <li><a href="lista_usu.php">Lista usuarios</a></li>
                        <li><a href="lista_tipo_usu.php">Lista de tipos de usuarios</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu9" data-toggle="collapse" class="dropdown-toggle">
                        <i class="material-icons">date_range</i>Clientes
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu9">
                        <li><a href="crear_cliente.php">Crear cliente</a></li>
                        <li><a href="lista_clientes.php">Lista de Clientes</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">equalizer</i>Motos
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu4">
                        <li><a href="list_motos.php">Lista de Motos</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmen17" data-toggle="collapse" class="dropdown-toggle">
                        <i class="material-icons">dashboard</i>Productos
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmen17">
                        <li><a href="lista_products.php">Lista de Productos</a></li>
                        <li><a href="formulario.php">Crear Producto</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu12" data-toggle="collapse" class="dropdown-toggle">
                        <i class="material-icons">date_range</i>Servicios
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu12">
                        <li><a href="service.php">Crear Servicio</a></li>
                        <li><a href="lista_service.php">Lista de Servicios</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmenu19" data-toggle="collapse" class="dropdown-toggle">
                        <i class="material-icons">date_range</i>Documentos Legales
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu19">
                        <li><a href="documentos.php">Crear Documento Legal</a></li>
                        <li><a href="lista_documento.php">Lista de Documentos legales</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">border_color</i>Generar Ventas
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu5">
                        <li><a href="vender.php">Venta de Productos</a></li>
                        <li><a href="vender_servicio.php">Venta de Servicios</a></li>
                        <li><a href="vender_documento.php">Venta de Documentos</a></li>
                        <li><a href="vender_completo.php">Venta completa</a></li>
                        <li><a href="ventas.php">Listas de Ventas</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmenu22" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">border_color</i>Compras
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu22">
                        <li><a href="compras.php">Compras de Productos</a></li>


                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu7" data-toggle="collapse" class="dropdown-toggle">
                        <i class="material-icons">content_copy</i>Reportes
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu7">
                        <li><a href="reporte_usu.php">Reporte Usuarios</a></li>
                        <li><a href="lista_products.php">Inventario Productos</a></li>
                        <li><a href="ventas.php">Reporte de Ventas</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu15" data-toggle="collapse" class="dropdown-toggle">
                        <i class="material-icons">content_copy</i>Copia de seguridad
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu15">
                        <li><a href="respaldo/respaldo.php">Generar Copia</a></li>
                    </ul>
                </li>

            </ul>
        </div>

        <!-------sidebar--design- close----------->



        <!-------page-content start----------->

        <div id="content">

            <!------top-navbar-start----------->

            <div class="top-navbar">
                <div class="xd-topbar">
                    <div class="row">
                        <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                            <div class="xp-menubar">
                                <span class="material-icons text-white">signal_cellular_alt</span>
                            </div>
                        </div>

                        <div class="col-md-5 col-lg-3 order-3 order-md-2">
                            <div class="xp-searchbar">
                                <form>
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit" id="button-addon2">Go
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                            <div class="xp-profilebar text-right">
                                <nav class="navbar p-0">
                                    <ul class="nav navbar-nav flex-row ml-auto">
                                        <li class="dropdown nav-item active">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <span class="material-icons">notifications</span>
                                                <span class="notification">4</span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                                <li><a href="#">You Have 4 New Messages</a></li>
                                            </ul>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <span class="material-icons">question_answer</span>
                                            </a>
                                        </li>

                                        <li class="dropdown nav-item">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <img src="../../controller/image/favicon.png" style="width:40px; border-radius:50%;" />
                                                <span class="xp-user-live"></span>
                                            </a>
                                            <ul class="dropdown-menu small-menu">
                                                <li>
                                                    <form method="POST">
                                                        <tr><br>
                                                            <td colspan="2" align="center">
                                                                <input type="submit" value="Cerrar sesion" id="btn_quote" name="btncerrar" class="btn__out" />
                                                            </td>
                                                        </tr>
                                                    </form>
                                                </li>

                                            </ul>
                                        </li>


                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>

                    <div class="xp-breadcrumbbar text-center">
                        <h2 class="page-title"><span>Bienvenido <?php echo $usua['type_user'] ?> <?php echo $usua['name'] ?></span></h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">lista</a></li>
                            <li class="breadcrumb-item active" aria-curent="page">Usuarios</li>
                        </ol>
                    </div>


                </div>
            </div>


            <!--Ejemplo tabla con DataTables-->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="table-responsive">

                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>

                                        <label for="selectAll"></label></th>
                                        <th>Actions</th>
                                        <th>Documento</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Usuario</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>T. Usuario</th>
                                        <th>Genero</th>
                                        <th>Estado</th>


                                    </tr>
                                </thead>

                                <tbody>


                                    <?php
                                    foreach ($comando as $rows) {

                                    ?>
                                        <tr>


                                            <th>
                                                <form method="get" action="actualizar_usu.php">

                                                    <input type="hidden" name="documento" value="<?= $rows['document'] ?>">
                                                    <button class="button button_actu" type="submit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>

                                                </form>

                                                <form method="get" action="eliminar_usu.php">
                                                    <input type="hidden" name="documento" value="<?= $rows['document'] ?>">
                                                    <button class="button" onclick="return confirm('¿Desea eliminar el registro de usuario seleccionado?');" type="submit"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                                                </form>

                                                </a>
                                            </th>


                                            <th><?= $rows["document"] ?></th>
                                            <th><?= $rows["name"] ?></th>
                                            <th><?= $rows["surname"] ?></th>
                                            <th><?= $rows["username"] ?></th>
                                            <th><?= $rows["telephone"] ?></th>
                                            <th><?= $rows["email"] ?></th>
                                            <th><?= $rows["type_user"] ?></th>
                                            <th><?= $rows["gender"] ?></th>
                                            <th><?= $rows["state"] ?></th>


                                        </tr>

                                    <?php

                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- jQuery, Popper.js, Bootstrap JS -->
        <script src="jquery/jquery-3.3.1.min.js"></script>
        <script src="popper/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- datatables JS -->
        <script type="text/javascript" src="datatables/datatables.min.js"></script>

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