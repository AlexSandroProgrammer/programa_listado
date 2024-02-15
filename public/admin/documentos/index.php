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

<?php include('../menu.php') ?>
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
                                        <img src="../../assets/images/logoSenaEmpresa.png"
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
                <div class="table-responsive">
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

                                <td><a href="documentos/<?php echo $document['Nombre_Documento_Magnetico'] ?>"
                                        class="icon icon-download btn form-control">
                                    </a></td>
                                <td><?php echo $document['Nombre_Area'] ?></td>
                                <td><?php echo $document['Nombre_Proceso'] ?></td>
                                <td><?php echo $document['Nombre_Procedimiento'] ?></td>
                                <td><?php echo $document['Nombre_Documento'] ?></td>
                                <td><?php echo $document['Nombre_Documento_Magnetico'] ?> <a
                                        href="documentos/<?php echo $document['Nombre_Documento_Magnetico'] ?>"><?php echo $document['Nombre_Documento_Magnetico'] ?></a>
                                </td>
                                <td><?php echo $document['Tipo_Documento'] ?></td>
                                <td><?php echo $document['Codigo'] ?></td>
                                <td><?php echo $document['Version'] ?></td>
                                <td><?php echo $document['Fecha_Elaboracion'] ?></td>
                                <td><?php echo $document['Nombre_Responsable'] ?></td>

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


    <!------main-content-end----------->

    <!----footer-design------------->

    <?php
    require_once('../footer.php');

    ?>



    </body>

    </html>