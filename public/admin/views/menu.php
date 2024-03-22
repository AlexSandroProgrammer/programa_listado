<?php
session_start();

require_once("../../validation/validarSesion.php");

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location:../../");
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Metas Requeridas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>CompromisoSE || Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="../../../assets/css/custom.css">
    <!-- datatables de bootstrap -->

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../../../assets/css/datatables.css" />

    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../../libraries/datatables/datatables.min.css" />

    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css"
        href="../../libraries/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css" />

    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- logo favicon de la empresa  -->
    <link rel="shortcut icon" href="../../../assets/images/logoSenaEmpresa.png" type="image/x-icon">
    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

</head>

<body>

    <div class="wrapper">

        <!-------sidebar--design------------>
        <div id="sidebar">
            <div class="sidebar-header">
                <h3><img src="../../../assets/images/logoSenaEmpresa.png" class="img-fluid" /><span>Administrador</span>
                </h3>
            </div>
            <ul class="list-unstyled component m-0">
                <li class="active">
                    <a href="index.php" class="dashboard"><i class="material-icons">dashboard</i>Menu Principal </a>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">dashboard</i>Usuarios
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li><a href="index.php">Lista de Usuarios</a></li>
                        <li><a href="crear-usuario.php">Crear Usuario</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">dashboard</i>Documentos
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu5">
                        <li><a href="lista-documentos.php">Lista de Documentos</a></li>
                        <li><a href="crear-documento.php">Crear Documento</a></li>
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">dashboard</i>Procesos
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu2">
                        <li><a href="lista-procesos.php">Lista de Procesos</a></li>
                        <li><a href="lista-procesos.php?status=createProcess">Crear Proceso</a>

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">dashboard</i>Procedimientos
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu3">
                        <li><a href="lista-procedimientos.php">Lista de Procedimientos</a></li>
                        <li><a href="lista-procedimientos.php?status=registrarProcedimiento">Crear Procedimiento</a>
                        </li>

                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">dashboard</i>Responsables
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu4">
                        <li><a href="lista-responsable.php">Lista de Responsables</a></li>
                        <li><a href="lista-responsable.php?status=registrarResponsable">Crear Responsable</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmenu12" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">dashboard</i>Cuarentena
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu12">
                        <li><a href="cuarentena.php">Listado de Archivos</a></li>

                    </ul>
                </li>
                <li class="">
                    <a href="change-password.php" class=""><i class="material-icons">border_color</i>Cambiar Contraseña
                    </a>
                </li>

            </ul>
        </div>

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
                        </div>
                        <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                            <div class="xp-profilebar text-right">
                                <nav class="navbar p-0">
                                    <ul class="nav navbar-nav flex-row ml-auto">

                                        <li class="dropdown nav-item mt-2 rounded-2">
                                            <form method="post" action="">
                                                <a class="btn btn-danger" href="menu.php?logout"><i
                                                        class="material-icons">logout</i></a>
                                            </form>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="xp-breadcrumbbar text-center">
                        <h4 class="page-title">Panel de Administrador</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Bienvenido</li>
                            <li class="breadcrumb-item active" aria-curent="page"><?= $_SESSION['names']  ?></li>
                        </ol>
                    </div>
                </div>
            </div>