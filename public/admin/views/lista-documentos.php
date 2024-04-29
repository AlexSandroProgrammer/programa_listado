<?php
require_once "../../../database/connection.php";
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
<?php require_once('menu.php') ?>

<!--Ejemplo tabla con DataTables-->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 p-4">
            <div class="table-responsive py-4 px-1">
                <div class="col-xs-15">
                    <input type="hidden" name="status" value="registrarProcedimiento">
                    <a class="btn btn-success text-white" href="crear-documento.php">Registrar Documento</a>
                </div>
                <table id="example" class="table table-striped table-bordered top-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Acciones</th>
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
                                <a href="../documentos/<?php echo $document['nombre_directorio_proceso'] ?>/<?php echo $document['nombre_directorio_procedimiento'] ?>/<?php echo $document['nombre_documento_magnetico'] ?>"
                                    class=" btn btn-info "><i class="fa fa-download" download></i>
                                </a>
                                <a class=" btn btn-primary mt-2"
                                    href="../documentos/<?php echo $document['nombre_directorio_proceso'] ?>/<?php echo $document['nombre_directorio_procedimiento'] ?>/pdf/<?php echo $document['nombre_documento_visualizacion'] ?>"><i
                                        class="
                                    fa fa-eye"></i>
                                </a>
                                <form method="GET" action="archivar-documento.php">
                                    <input type="hidden" name="id_archive_document"
                                        value="<?= $document['id_documento'] ?>">
                                    <button class="btn btn-warning mt-2"
                                        onclick="return confirm('desea enviar a cuarentena el formato seleccionado');"
                                        type="submit"> <i class="fa fa-archive"></i></button>
                                </form>
                                <form method="GET" action="actualizar-documento.php">
                                    <input type="hidden" name="id_document-edit"
                                        value="<?= $document['id_documento'] ?>">
                                    <button class="btn btn-success mt-2"
                                        onclick="return confirm('desea actualizar el registro seleccionado');"
                                        type="submit"><i class="material-icons" data-toggle="tooltip"
                                            title="Edit">&#xE254;</i></button>
                                </form>
                            </td>

                            <td><?php echo $document['nombre_proceso'] ?></td>
                            <td><?php echo $document['nombre_procedimiento'] ?></td>
                            <td><?php echo $document['nombre_documento'] ?></td>
                            <td><?php echo $document['nombre_documento_magnetico'] ?> <a
                                    href="../documentos/<?php echo $document['nombre_directorio_proceso'] ?>/<?php echo $document['nombre_directorio_procedimiento'] ?>/<?php echo $document['nombre_documento_magnetico'] ?>"><?php echo $document['nombre_documento_magnetico'] ?></a>
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
<script>
function openPops(
    rutaDelArchivo
) {
    //rutaDelArchivo
    const hostname = window.location.hostname;
    const url = "http://" + hostname + "/programa_listado/public/admin/documentos/" + rutaDelArchivo;
    console.log(url);
    // Obtener la extensión del archivo
    const extension = url.split('.').pop().toLowerCase();


    // Verificar la extensión y asignar el tipo de contenido adecuado
    var contentType;
    if (extension == 'pdf') {
        contentType = 'application/pdf';
    } else if (extension === 'xlsx' || extension === 'xls') {
        contentType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
    } else if (extension === 'docx' || extension === 'doc') {
        contentType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
    } else {
        alert('Tipo de archivo no compatible');
        return;
    }

    // Crear un iframe para mostrar el archivo
    const iframe = document.createElement('iframe');
    iframe.src = `https://docs.google.com/viewer?url=${url}&embedded=true`;
    iframe.style.width = '100%';
    iframe.style.height = '100%';

    // Crear un div para el modal
    const modalContent = document.createElement('div');
    modalContent.style.display = 'block';
    modalContent.style.position = 'fixed';
    modalContent.style.zIndex = '1000';
    modalContent.style.top = '0';
    modalContent.style.left = '0';
    modalContent.style.width = '100%';
    modalContent.style.height = '100%';
    modalContent.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
    modalContent.style.overflow = 'auto';

    // Agregar el iframe al div modal
    modalContent.appendChild(iframe);

    // Agregar el div modal al cuerpo del documento
    document.body.appendChild(modalContent);

    // Evitar que el evento onclick del botón se propague y cierre el modal inmediatamente
    modalContent.children[0].onclick = function(event) {
        event.stopPropagation();
    };
}
</script>

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