<?php
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

// CONSULTA BASE DE DATOS PARA TRAER TODOS LOS DATOS RELACIONADOS CON LOS PROCEDIMIENTOS 

$listAreas = $connection->prepare("SELECT * FROM area");
$listAreas->execute();
$areas = $listAreas->fetchAll(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Metas Requeridas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Listado Maestro Documentos</title>
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
    <link rel="stylesheet" type="text/css" href="../../libraries/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css" />

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

        <?php require_once('menu.php') ?>
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

                                        <li class="dropdown nav-item">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <img src="../../../assets/images/logoSenaEmpresa.png" style="width:40px; border-radius:50%;" />
                                                <span class="xp-user-live"></span>
                                            </a>
                                            <ul class="dropdown-menu small-menu">
                                                <li><a href="#">
                                                        <span class="material-icons">logout</span>
                                                        Cerrar Sesion
                                                    </a></li>

                                            </ul>
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
                            <li class="breadcrumb-item active" aria-curent="page"><?= $_SESSION['names'] ?></li>
                        </ol>
                    </div>


                </div>
            </div>
            <!------top-navbar-end----------->


            <!------main-content-start----------->


            <!--Ejemplo tabla con DataTables-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 p-4">
                        <div class="table-responsive py-4 px-1">
                            <div class="col-xs-15">
                                <?php
                                if (isset($_GET["status"])) {
                                    if ($_GET["status"] === "createArea") {
                                ?>
                                        <h3 class="text-center">Registro de Area</h3>
                                        <form action="../controllers/AreaController.php" method="POST" autocomplete="off" name="formRegisterArea">
                                            <label>Nombre del Area:</label>
                                            <input type="text" name="area" class='form-control'>

                                            <div class="my-3">
                                                <input type="submit" class="btn btn-success" value="Registrar"></input>
                                                <input type="hidden" class="btn btn-info" value="formRegisterArea" name="MM_formArea"></input>
                                                <a href="lista-areas.php" class="btn btn-danger">Cancelar</a>
                                            </div>
                                        </form>
                                    <?php
                                    } else if ($_GET["status"] === null || $_GET["id_area-edit"] === null) {

                                    ?>
                                        <script>
                                            alert("// No se cumplen los parametros requeridos //");
                                            window.location = "lista-areas.php";
                                        </script>

                                    <?php
                                    } else if ($_GET["status"] === "updateArea" || $_GET["id_area-edit"] !== null) {

                                        $id_area = $_GET["id_area-edit"];

                                        $listArea = $connection->prepare("SELECT * FROM area WHERE Id_Area = ' " . $id_area . "'");
                                        $listArea->execute();
                                        $area = $listArea->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                        <form action="../controllers/AreaController.php" method="POST" name="formUpdateArea">
                                            <label>Nombre del Area:</label>
                                            <input type="hidden" name="id_area" value="<?php echo $area['Id_Area'] ?>" class='form-control'>
                                            <input type="text" name="area" value="<?php echo $area['Nombre_Area'] ?>" class='form-control'>

                                            <div class="my-3">
                                                <input type="submit" class="btn btn-success" value="Actualizar"></input>
                                                <input type="hidden" class="btn btn-info" value="formUpdateArea" name="MM_formAreaUpdate"></input>
                                                <a href="lista-areas.php" class="btn btn-danger">Cancelar</a>
                                            </div>
                                        </form>
                                    <?php
                                    } ?>
                                <?php

                                }
                                if (!isset($_GET["status"])) {
                                ?>
                                    <form class="mb-2" action="" method="GET">
                                        <input type="hidden" name="status" value="createArea">
                                        <input class="btn btn-success" type="submit" value="Registrar Area" />
                                    </form>
                                <?php

                                }

                                ?>


                            </div>
                            <!------top-navbar-end----------->

                            <div class="text-right">
                            </div>
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>

                                        <th>Area</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($areas as $area) {
                                    ?>
                                        <tr>
                                            <td>
                                                <form method="GET" action="../controllers/AreaController.php">
                                                    <input type="hidden" name="id_area-delete" value="<?= $area['Id_Area'] ?>">
                                                    <button class="btn btn-danger" onclick="return confirm('¿Desea eliminar el registro de area seleccionado?');" type="submit"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                                                </form>
                                                <form method="GET" action="">
                                                    <input type="hidden" name="status" value="updateArea">
                                                    <input type="hidden" name="id_area-edit" value="<?= $area['Id_Area'] ?>">
                                                    <button class="btn btn-success mt-2" onclick="return confirm('desea actualizar el registro seleccionado');" type="submit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
                                                </form>


                                            </td>

                                            <td><?php echo $area['Nombre_Area'] ?></td>
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

            <script src="../../../assets/js/jquery-3.3.1.min.js"></script>
            <script src="../../../assets/js/bootstrap.min.js"></script>

            <!-- jQuery, Popper.js, Bootstrap JS -->
            <script src="../../libraries/bootstrap/popper/popper.min.js"></script>
            <script src="../../libraries/bootstrap/js/bootstrap.min.js"></script>

            <!-- datatables JS -->
            <script type="text/javascript" src="../../libraries/datatables/datatables.min.js"></script>



            <!-- código JS propìo-->
            <script type="text/javascript" src="../../../assets/js/props-datatable.js"></script>


            <!------main-content-end----------->

            <!----footer-design------------->

            <?php
            require_once('footer.php');

            ?>



</body>

</html>