<?php
require_once "../../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

// CONSULTA BASE DE DATOS PARA TRAER TODOS LOS DATOS RELACIONADOS CON LOS DOCUMENTOS 

$listDocuments = $connection->prepare("SELECT 
documentos.*, 
procedimiento.*, 
responsable.*, 
proceso.*
FROM 
documentos
INNER JOIN 
procedimiento ON documentos.id_procedimiento = procedimiento.id_procedimiento
INNER JOIN 
responsable ON documentos.id_responsable = responsable.id_responsable
INNER JOIN 
proceso ON procedimiento.id_proceso = proceso.id_proceso");
$listDocuments->execute();
$documents = $listDocuments->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Compromiso SE || Modulo de Consulta </title>
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
    <!-- favicion logo  -->
    <link rel="shortcut icon" href="../../../../assets/images/logoSenaEmpresa.png" type="image/x-icon">
</head>

<body>
    <header class="p-4">

        <h2 class="text-center text-light">
            CompromisoSE
        </h2>

        <div class="row justify-content-end px-3">
            <a href="../user/../../../module/" class="text-center text-light  btn btn-danger">
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

                                <td>
                                    <a href="../../../admin/documentos/<?php echo $document['nombre_directorio_proceso'] ?>/<?php echo $document['nombre_directorio_procedimiento'] ?>/<?php echo $document['nombre_documento_magnetico'] ?>"
                                        class=" btn btn-success "><i class="fa fa-download"></i>
                                    </a>
                                </td>
                                <td><?php echo $document['nombre_proceso'] ?></td>
                                <td><?php echo $document['nombre_procedimiento'] ?></td>
                                <td><?php echo $document['nombre_documento'] ?></td>
                                <td><?php echo $document['nombre_documento_magnetico'] ?> <a
                                        href="../../../admin/documentos/<?php echo $document['nombre_directorio_proceso'] ?>/<?php echo $document['nombre_directorio_procedimiento'] ?>/<?php echo $document['nombre_documento_magnetico'] ?>"><?php echo $document['nombre_documento_magnetico'] ?></a>
                                </td>
                                <td><?php echo $document['tipo_documento'] ?></td>
                                <td><?php echo $document['codigo'] ?></td>
                                <td><?php echo $document['version'] ?></td>
                                <td><?php echo $document['fecha_elaboracion'] ?></td>
                                <td class="texto_persona"><?php echo $document['nombre_responsable'] ?></td>

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