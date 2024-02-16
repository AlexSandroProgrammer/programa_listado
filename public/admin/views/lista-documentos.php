<?php
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

// CONSULTA BASE DE DATOS PARA TRAER TODOS LOS DATOS RELACIONADOS CON LOS DOCUMENTOS 

$listDocuments = $connection->prepare("SELECT * FROM documentos INNER JOIN area ON documentos.Id_Area=area.Id_Area 
INNER join proceso ON documentos.Id_Proceso=proceso.Id_Proceso
INNER JOIN  procedimiento ON documentos.Id_Procedimiento=procedimiento.Id_Procedimiento 
INNER JOIN responsable ON documentos.Id_Responsable=responsable.Id_Responsable AND documentos.Id_Proceso=proceso.Id_Proceso AND documentos.Id_Procedimiento=procedimiento.Id_Procedimiento  AND documentos.Id_Procedimiento=procedimiento.Id_Procedimiento  AND   documentos.Id_Responsable=responsable.Id_Responsable
");
$listDocuments->execute();
$documents = $listDocuments->fetchAll(PDO::FETCH_ASSOC);


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
                                                <img src="../../../assets/images/logoSenaEmpresa.png"
                                                    style="width:40px; border-radius:50%;" />
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
                            <li class="breadcrumb-item active" aria-curent="page"><?php  ?></li>
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
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Area</th>
                                        <th>Proceso</th>
                                        <th>Procedimiento</th>
                                        <th>Documento</th>
                                        <th>Archivo Medio Magnetico</th>
                                        <th>Tipo de Documento</th>
                                        <th>Codigo</th>
                                        <th>Version</th>
                                        <th>Fecha de elaboracion</th>
                                        <th>Responsable de su Uso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($documents as $document) {
                                    ?>
                                    <tr>

                                        <td><a href="../documentos/<?php echo $document['Nombre_Documento_Magnetico'] ?>"
                                                class=" btn btn-outline-success form-control"><i class="fa fa-download"
                                                    aria-hidden="true"></i>
                                            </a></td>
                                        <td><?php echo $document['Nombre_Area'] ?></td>
                                        <td><?php echo $document['Nombre_Proceso'] ?></td>
                                        <td><?php echo $document['Nombre_Procedimiento'] ?></td>
                                        <td><?php echo $document['Nombre_Documento'] ?></td>
                                        <td><?php echo $document['Nombre_Documento_Magnetico'] ?> <a
                                                href="../documentos/<?php echo $document['Nombre_Documento_Magnetico'] ?>"><?php echo $document['Nombre_Documento_Magnetico'] ?></a>
                                        </td>
                                        <td><?php echo $document['Tipo_Documento'] ?></td>
                                        <td><?php echo $document['Codigo'] ?></td>
                                        <td><?php echo $document['Version'] ?></td>
                                        <td><?php echo $document['Fecha_Elaboracion'] ?></td>
                                        <td class="texto_persona"><?php echo $document['Nombre_Responsable'] ?></td>

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