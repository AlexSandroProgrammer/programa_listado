<?php
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

// CONSULTA BASE DE DATOS PARA TRAER TODOS LOS DATOS RELACIONADOS CON LOS PROCEDIMIENTOS 

$listAreas = $connection->prepare("SELECT * FROM area");
$listAreas->execute();
$areas = $listAreas->fetchAll(PDO::FETCH_ASSOC);


?>

<!-------page-content start----------->
<?php require_once('menu.php') ?>


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