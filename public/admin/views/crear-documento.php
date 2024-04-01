<?php
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();
?>
<?php require_once('menu.php') ?>
<!------main-content-start----------->
<!--Formulario -->
<div class="container-fluid bg-success-subtle p-3">
    <div class="col-xs-12 bg-success-subtle border p-4">
        <h3 class="text-center">Registro de Documento</h3>
        <form action="../controllers/DocumentoController.php" method="POST" enctype="multipart/form-data"
            autocomplete="off" name="formRegisterDocument">
            <div class="row">
                <div class="col-12 p-2">
                    <span class="help-block">Nombre del Documento</span>
                    <input type="text" autofocus required class="form-control" id="nombre_documento"
                        name="nombreDocumento">
                </div>
                <!-- Campo de solo lectura para mostrar los detalles del procedimiento -->
                <div class="col-12 p-2" id="detalle_procedimiento" style="display: none;">
                    <span class="help-block">Proceso Asignado</span>
                    <input type="text" required class="form-control" id="nombre_procedimiento" name="idProceso"
                        readonly>
                </div>
                <div class="col-12 p-2">
                    <span class="help-block">Procedimiento</span>
                    <select class="form-control" required id="id_procedimiento" name="idProcedimiento">
                        <option value="">Seleccionar Procedimiento</option>
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
                <div class="col-12 p-2">
                    <span class="help-block">Responsable</span>
                    <select class="form-control" required id="id_procedimiento" name="idResponsable">
                        <option value="">Seleccionar Responsable</option>
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
                    <span class="help-block" for="tipoDocumento">Tipo de Documento</span>
                    <select class="form-control" required id="Id_tipo_doc" name="tipoDocumento">
                        <option value="">Selecciona</option>
                        <option value="Formato">Formato</option>
                        <option value="Instructivo">Instructivo</option>
                        <option value="Manual">Manual</option>
                    </select>
                </div>
                <div class="col-12 p-2">
                    <span class="help-block">Codigo del Documento</span>
                    <input type="text" required class="form-control" id="codigo" name="codigo">
                </div>

                <div class="col-12 p-2">
                    <span class="help-block">Version</span>
                    <input type="number" required class="form-control" id="version" name="version">
                </div>

                <div class="col-12">
                    <span class="help-block">Anexar Documento</span>
                    <input type="file" required class="form-control" id="documento" name="documento">
                </div>

                <div class=" mt-4">
                    <input type="submit" class="btn btn-success" value="Registrar"></input>
                    <input type="hidden" required class="btn btn-info" value="formRegisterDocument"
                        name="MM_registerDocument">
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