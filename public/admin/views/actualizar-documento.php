<?php
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

// validamos que se reciba el id del documento seleccionado 
if (!empty($_GET["id_document-edit"])) {
    // realizamos consulta de los datos del documento seleccionado 
    $id_document = $_GET['id_document-edit'];

    $listDocument = $connection->prepare("SELECT 
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
proceso ON procedimiento.id_proceso = proceso.id_proceso WHERE documentos.id_documento = '$id_document'");
    $listDocument->execute();
    $document = $listDocument->fetch(PDO::FETCH_ASSOC);

?>
<?php require_once('menu.php') ?>
<!------main-content-start----------->
<!--Formulario -->
<div class="container-fluid p-3 bg-light-subtle">
    <div class="col-xs-12 bg-light-subtle border p-4">

        <h3 class="text-center">Actualizacion de Documento</h3>
        <form action="../controllers/DocumentoController.php" method="POST" autocomplete="off"
            name="formUpdateDocument">
            <div class="row">
                <div class="col-12 p-2">

                    <input type="text" hidden required class="form-control" id="id_document"
                        value="<?php echo $document['id_documento'] ?> " name="idDocument">
                </div>
                <div class="col-12 p-2">
                    <span class="help-block">Nombre del Documento</span>
                    <input type="text" autofocus required class="form-control" id="nombre_documento"
                        value="<?php echo $document['nombre_documento'] ?> " name="nombreDocumento">
                </div>
                <div class="col-12 p-2">
                    <span class="help-block">Procedimiento</span>
                    <select class="form-control" required id="id_procedimiento" name="idProcedimiento">
                        <option value=" <?php echo $document['id_procedimiento'] ?> ">Seleccionar Procedimiento
                        </option>
                        <?php
                            // CONSUMO DE DATOS DE LOS PROCESOS
                            $listProcedimientos = $connection->prepare("SELECT * FROM procedimiento");
                            $listProcedimientos->execute();
                            $procedimientos = $listProcedimientos->fetchAll(PDO::FETCH_ASSOC);
                            // Iterar sobre los procedimientos
                            foreach ($procedimientos as $procedimiento) {
                                echo "<option value='{$procedimiento['id_procedimiento']}'>{$procedimiento['nombre_procedimiento']}</option>";
                            }
                            ?>
                    </select>
                </div>

                <!-- Campo de solo lectura para mostrar los detalles del procedimiento -->
                <div class="col-12 p-2" id="detalle_procedimiento" style="display: none;">
                    <span class="help-block">Proceso Asignado</span>
                    <input type="text" required class="form-control" id="nombre_procedimiento"
                        value="<?php echo $document['id_proceso'] ?> " name="idProceso" readonly>
                </div>

                <div class="col-12 p-2">
                    <span class="help-block">Responsable</span>
                    <select class="form-control" required id="id_procedimiento" name="idResponsable">
                        <option value="<?php echo $document['id_responsable'] ?> ">Seleccionar Responsable</option>
                        <?php
                            // CONSUMO DE DATOS DE LOS PROCESOS 
                            $listResponsables = $connection->prepare("SELECT * FROM responsable");
                            $listResponsables->execute();
                            $responsables = $listResponsables->fetchAll(PDO::FETCH_ASSOC);

                            // Iterar sobre los procedimientos
                            foreach ($responsables as $responsable) {
                                echo "<option value='{$responsable['id_responsable']}'>{$responsable['nombre_responsable']}</option>";
                            }
                            ?>
                    </select>
                </div>
                <div class="col-12 p-2">
                    <span class="help-block">Tipo de Documento</span>
                    <select class="form-control" required id="Id_tipo_doc"
                        value="<?php echo $document['tipo_documento'] ?> " name="tipoDocumento">
                        <option value="Selecciona">Selecciona</option>
                        <option value="Formato">Formato</option>
                        <option value="Instructivo">Instructivo</option>
                        <option value="Manual">Manual</option>
                    </select>
                </div>
                <div class="col-12 p-2">
                    <span class="help-block">Codigo del Documento</span>
                    <input type="text" required class="form-control" id="codigo"
                        value="<?php echo $document['codigo'] ?> " name="codigo">
                </div>

                <div class="col-12 p-2">
                    <span class="help-block">Version</span>
                    <input type="text" required class="form-control" id="version"
                        value="<?php echo $document['version'] ?> " name="version">
                </div>
                <div class="mt-4">
                    <input type="submit" class="btn btn-success" value="Actualizar"></input>
                    <input type="hidden" required class="btn btn-info" value="formUpdateDocument"
                        name="MM_updateDocument">
                    <a href="lista-documentos.php" class="btn btn-danger">Cancelar Registro</a>
                </div>
            </div>

        </form>

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



<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectProcedimiento = document.getElementById('id_procedimiento');
    const detalleProcedimiento = document.getElementById('detalle_procedimiento');
    const inputNombreProcedimiento = document.getElementById('nombre_procedimiento');

    selectProcedimiento.addEventListener('change', function() {
        const selectedValue = this.value;
        // Realizar una solicitud AJAX para obtener los detalles del procedimiento
        fetch(`obtener_detalle_proceso.php?id=${selectedValue}`)
            .then(response => response.json())
            .then(data => {
                // Actualizar los campos con los detalles del procedimiento
                inputNombreProcedimiento.value = data.nombre_procedimiento;
                // Mostrar el campo de detalles del procedimiento
                detalleProcedimiento.style.display = 'block';
            })
            .catch(error => {
                console.error('Error al obtener los detalles del procedimiento:', error);
            });
    });
});
</script>
<!------main-content-end----------->
<!----footer-design------------->
<?php
    require_once('footer.php');

    ?>
</div>
</body>

</html>

<?php


} else {
    // Si no se recibe el id_document-edit, redireccionamos
    header("Location:lista-documentos.php");
    exit; // Aseguramos que no se ejecute más código después de la redirección
}
?>