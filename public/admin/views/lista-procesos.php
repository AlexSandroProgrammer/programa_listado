<?php
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

// CONSULTA BASE DE DATOS PARA TRAER TODOS LOS DATOS RELACIONADOS CON LOS PROCEDIMIENTOS 

$listProcesos = $connection->prepare("SELECT * FROM proceso");
$listProcesos->execute();
$procesos = $listProcesos->fetchAll(PDO::FETCH_ASSOC);
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
                    if (!empty($_GET["status"])) {
                        if ($_GET["status"] === "createProcess") {
                    ?>
                    <h3 class="text-center">Registro de Proceso</h3>
                    <form action="../controllers/ProcesoController.php" autocomplete="off" method="POST"
                        name="formRegisterProccess">
                        <label>Nombre del Proceso:</label>
                        <input type="text" autofocus name="proceso" class='form-control'>

                        <div class="my-3">
                            <input type="submit" class="btn btn-success" value="Registrar"></input>
                            <input type="hidden" class="btn btn-info" value="formRegisterProccess"
                                name="MM_formProccess"></input>
                            <a href="lista-procesos.php" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>

                    <?php
                        } else if (empty($_GET["status"]) or empty($_GET["id_proccess-edit"])) {

                        ?>
                    <script>
                    alert("// No se cumplen los parametros requeridos //");
                    window.location = "lista-procesos.php";
                    </script>

                    <?php
                        } else if ($_GET["status"] === "updateProccess" and (!empty($_GET["id_proccess-edit"]))) {

                            $id_proccess = $_GET["id_proccess-edit"];

                            $listProccess = $connection->prepare("SELECT * FROM proceso WHERE id_proceso = ' " . $id_proccess . "'");
                            $listProccess->execute();
                            $proccess = $listProccess->fetch(PDO::FETCH_ASSOC);
                        ?>

                    <h3 class="text-center">Editar Proceso</h3>
                    <form action="../controllers/ProcesoController.php" method="POST" name="formUpdateProccess">
                        <label>Nombre del Procesos:</label>
                        <input type="hidden" name="id_proceso" value="<?php echo $proccess['id_proceso'] ?>"
                            class='form-control'>
                        <input type="text" name="proceso" autofocus value="<?php echo $proccess['nombre_proceso'] ?>"
                            class='form-control'>

                        <div class="my-3">
                            <input type="submit" class="btn btn-success" value="Actualizar"></input>
                            <input type="hidden" class="btn btn-info" value="formUpdateProccess"
                                name="MM_formProccessUpdate"></input>
                            <a href="lista-procesos.php" class="btn btn-danger">Cancelar Registro</a>
                        </div>
                    </form>
                    <?php
                        }
                        ?>
                    <?php
                    }
                    if (!isset($_GET["status"])) {
                    ?>
                    <form class="mb-2" action="" method="GET">
                        <input type="hidden" name="status" value="createProcess">
                        <input class="btn btn-success" type="submit" value="Registrar Proceso" />
                    </form>
                    <?php
                    }
                    ?>
                </div>
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Proceso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($procesos as $proceso) {
                        ?>
                        <tr>
                            <td>
                                <form method="GET" action="../controllers/ProcesoController.php">
                                    <input type="hidden" name="id_proccess-delete"
                                        value="<?= $proceso['id_proceso'] ?>">
                                    <button class="btn btn-danger"
                                        onclick="return confirm('¿Desea eliminar el registro seleccionado?');"
                                        type="submit"><i class="material-icons" data-toggle="tooltip"
                                            title="Delete">&#xE872;</i></button>
                                </form>
                                <form method="GET" action="">
                                    <input type="hidden" name="status" value="updateProccess">
                                    <input type="hidden" autofocus name="id_proccess-edit"
                                        value="<?= $proceso['id_proceso'] ?>">
                                    <button class="btn btn-success mt-2"
                                        onclick="return confirm('desea actualizar el registro seleccionado');"
                                        type="submit"><i class="material-icons" data-toggle="tooltip"
                                            title="Edit">&#xE254;</i></button>
                                </form>


                            </td>

                            <td><?php echo $proceso['nombre_proceso'] ?></td>


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