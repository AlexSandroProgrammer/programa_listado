<?php
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

// CONSULTA BASE DE DATOS PARA TRAER TODOS LOS DATOS RELACIONADOS CON LOS PROCEDIMIENTOS 

$listProcedimientos = $connection->prepare("SELECT * FROM procedimiento INNER JOIN proceso ON procedimiento.id_proceso = proceso.Id_Proceso AND procedimiento.id_proceso = proceso.Id_Proceso");
$listProcedimientos->execute();
$procedimientos = $listProcedimientos->fetchAll(PDO::FETCH_ASSOC);
?>

<!-------page-content start----------->
<?php require_once('menu.php') ?>

<!------main-content-start----------->

<!--Ejemplo tabla con DataTables-->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 p-4">
            <div class="table-responsive py-4 px-1">
                <div class="col-xs-15">
                    <?php
                    if (isset($_GET["status"])) {
                        if ($_GET["status"] === "registrarProcedimiento") {

                            // CONSUMO DE DATOS DE LOS PROCESOS
                            $listProcesos = $connection->prepare("SELECT * FROM proceso");
                            $listProcesos->execute();
                            $procesos = $listProcesos->fetch(PDO::FETCH_ASSOC);

                    ?>
                            <h3 class="text-center">Registro de Procedimiento</h3>
                            <form action="../controllers/ProcedimientoController.php" autocomplete="off" method="POST" name="formRegisterProcedure">
                                <label>Nombre del Procedimiento:</label>
                                <input type="text" name="procedimiento" autofocus class='form-control'>
                                <label for="tipousuario" class="formulario__label ">Proceso:</label>
                                <div class="formulario__grupo__input">

                                    <select name="proceso" class="form-control">
                                        <option value="">Seleccionar Proceso</option>
                                        <?php
                                        do {
                                        ?>
                                            <option value="<?php echo ($procesos['Id_Proceso']) ?>">
                                                <?php echo ($procesos['Nombre_Proceso']) ?></option>
                                        <?php
                                        } while ($procesos = $listProcesos->fetch(PDO::FETCH_ASSOC));
                                        ?>
                                    </select>
                                </div>


                                <div class="my-3">
                                    <input type="submit" class="btn btn-success" value="Registrar"></input>
                                    <input type="hidden" class="btn btn-info" value="formRegisterProcedure" name="MM_formProcedure"></input>
                                    <a href="lista-procedimientos.php" class="btn btn-danger">Cancelar</a>
                                </div>
                            </form>

                        <?php
                        } else if ($_GET["status"] === null || $_GET["id_procedure-edit"] === null) {
                        ?>
                            <script>
                                alert("// No se cumplen los parametros requeridos //");
                                window.location = "lista-procedimiento.php";
                            </script>

                        <?php
                        } else if ($_GET["status"] === "updateProcedure" || $_GET["id_procedure-edit"] !== null) {


                            // RECIBIMOS EL ID DEL REGISTRO
                            $id_procedure = $_GET["id_procedure-edit"];

                            // TRAEMOS LOS DATOS DEL REGISTRO SELECCIONADO 
                            $listProcedures = $connection->prepare("SELECT * FROM procedimiento INNER JOIN proceso ON procedimiento.id_proceso = proceso.Id_Proceso AND procedimiento.id_proceso = proceso.Id_Proceso  WHERE procedimiento.Id_Procedimiento = ' " . $id_procedure . "'");
                            $listProcedures->execute();
                            $procedure = $listProcedures->fetch(PDO::FETCH_ASSOC);


                            // CONSUMO DE DATOS DE LOS PROCESOS
                            $getProcesos = $connection->prepare("SELECT * FROM proceso");
                            $getProcesos->execute();
                            $proccess = $getProcesos->fetch(PDO::FETCH_ASSOC);
                        ?>

                            <h3 class="text-center">Editar Procedimiento</h3>
                            <form action="../controllers/ProcedimientoController.php" method="POST" name="formUpdateProcedure">
                                <input type="hidden" name="id_procedimiento" value="<?php echo $procedure['Id_Procedimiento'] ?>" class='form-control'>
                                <label>Nombre del Procedimiento:</label>

                                <input type="text" name="procedimiento" value="<?php echo $procedure['Nombre_Procedimiento'] ?>" class='form-control'>

                                <label>Nombre del Proceso:</label>

                                <select name="proceso" class="form-control">
                                    <option value=<?php echo $procedure['Id_Proceso'] ?>>Seleccionar Proceso
                                    </option>
                                    <?php
                                    do {
                                    ?>
                                        <option value="<?php echo ($proccess['Id_Proceso']) ?>">
                                            <?php echo ($proccess['Nombre_Proceso']) ?></option>
                                    <?php
                                    } while ($proccess = $getProcesos->fetch(PDO::FETCH_ASSOC));
                                    ?>
                                </select>


                                <div class="my-3">
                                    <input type="submit" class="btn btn-success" value="Actualizar"></input>
                                    <input type="hidden" class="btn btn-info" value="formUpdateProcedure" name="MM_formProcedureUpdate"></input>
                                    <a href="lista-procedimientos.php" class="btn btn-danger">Cancelar</a>
                                </div>
                            </form>
                        <?php
                        } else {
                        ?>
                            <form class="mb-2" action="" method="GET">
                                <input type="hidden" name="status" value="registrarProcedimiento">
                                <input class="btn btn-success" type="submit" value="Registrar Procedimiento" />
                            </form>
                        <?php
                        }
                    }
                    if (!isset($_GET["status"])) {
                        ?>
                        <form class="mb-2" action="" method="GET">
                            <input type="hidden" name="status" value="registrarProcedimiento">
                            <input class="btn btn-success" type="submit" value="Registrar Procedimiento" />
                        </form>
                    <?php
                    }
                    ?>
                </div>
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Procedimiento</th>
                            <th>Proceso</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($procedimientos as $procedimiento) {
                        ?>
                            <tr>

                                <td>
                                    <form method="GET" action="../controllers/ProcedimientoController.php">
                                        <input type="hidden" name="id_procedure-delete" value="<?= $procedimiento['Id_Procedimiento'] ?>">
                                        <button class="btn btn-danger" onclick="return confirm('¿Desea eliminar el registro seleccionado?');" type="submit"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                                    </form>
                                    <form method="GET" action="">
                                        <input type="hidden" name="status" value="updateProcedure">
                                        <input type="hidden" name="id_procedure-edit" value="<?= $procedimiento['Id_Procedimiento'] ?>">
                                        <button class="btn btn-success mt-2" onclick="return confirm('desea actualizar el registro seleccionado');" type="submit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
                                    </form>


                                </td>
                                <td><?php echo $procedimiento['Nombre_Procedimiento'] ?></td>
                                <td><?php echo $procedimiento['Nombre_Proceso'] ?></td>


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