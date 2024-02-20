<?php
require_once "../../../../database/connection.php";
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

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="#" />
    <title>Listado Maestro Documentos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css" />


    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../../../../assets/css/datatables.css" />
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../../../libraries/datatables/datatables.min.css" />
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css"
        href="../../../libraries/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css" />
    <!--font awesome con CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

</head>

<body>
    <header class="p-4">

        <h2 class="text-center text-light">
            Listado Maestro Documentos
        </h2>

        <div class="row justify-content-end px-3">

            <a href="../user/index.php" class="text-center text-light  btn btn-danger">
                Regresar
            </a>


        </div>

    </header>

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

                                <td><a href="../../../admin/documentos/<?php echo $document['Nombre_Documento_Magnetico'] ?>"
                                        class=" btn btn-outline-success form-control"><i class="fa fa-download"
                                            aria-hidden="true"></i>
                                    </a></td>

                                <td><?php echo $document['Nombre_Area'] ?></td>
                                <td><?php echo $document['Nombre_Proceso'] ?></td>
                                <td><?php echo $document['Nombre_Procedimiento'] ?></td>
                                <td><?php echo $document['Nombre_Documento'] ?></td>
                                <td><?php echo $document['Nombre_Documento_Magnetico'] ?> <a
                                        href="../../../admin/documentos/<?php echo $document['Nombre_Documento_Magnetico'] ?>"><?php echo $document['Nombre_Documento_Magnetico'] ?></a>
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

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../../../libraries/jquery/jquery-3.3.1.min.js"></script>
    <script src="../../../libraries/bootstrap/popper/popper.min.js"></script>
    <script src="../../../libraries/bootstrap/js/bootstrap.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="../../../libraries/datatables/datatables.min.js"></script>



    <!-- código JS propìo-->
    <script type="text/javascript" src="../../../../assets/js/props-datatable.js"></script>
</body>

</html>