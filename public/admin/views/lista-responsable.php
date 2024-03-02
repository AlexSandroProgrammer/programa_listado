<?php
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

// CONSULTA BASE DE DATOS PARA TRAER TODOS LOS DATOS RELACIONADOS CON LOS PROCEDIMIENTOS 

$listResponsables = $connection->prepare("SELECT * FROM responsable");
$listResponsables->execute();
$responsables = $listResponsables->fetchAll(PDO::FETCH_ASSOC);
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
                        if ($_GET["status"] === "registrarResponsable") {
                    ?>
                            <h3 class="text-center">Registro de Responsable</h3>
                            <form action="../controllers/ResponsableController.php" autocomplete="off" method="POST" name="formRegisterResponsable">
                                <label>Nombre del Responsable:</label>
                                <input type="text" name="responsable" autofocus class='form-control'>
                                <div class="my-3">
                                    <input type="submit" class="btn btn-success" value="Registrar"></input>
                                    <input type="hidden" class="btn btn-info" value="formRegisterResponsable" name="MM_formResponsable"></input>
                                    <a href="lista-responsable.php" class="btn btn-danger">Cancelar Registro</a>
                                </div>
                            </form>

                        <?php
                        } else if ($_GET["status"] === "updateResponsable" and (!empty($_GET["id_responsable-edit"]))) {

                            $id_responsable_edit = $_GET["id_responsable-edit"];
                            $listResponsables = $connection->prepare("SELECT * FROM responsable WHERE id_responsable = ' " . $id_responsable_edit . "'");
                            $listResponsables->execute();
                            $responsable = $listResponsables->fetch(PDO::FETCH_ASSOC);
                        ?>

                            <h3 class="text-center">Editar Responsable</h3>
                            <form action="../controllers/ResponsableController.php" autocomplete="off" method="POST" name="formUpdateResponsable">
                                <label>Nombre del Responsable:</label>
                                <input type="hidden" name="id_responsable" value="<?php echo $responsable['id_responsable'] ?>" class='form-control'>
                                <input type="text" name="responsable" value="<?php echo $responsable['nombre_responsable'] ?>" class='form-control'>
                                <div class="my-3">
                                    <input type="submit" class="btn btn-success" value="Actualizar"></input>
                                    <input type="hidden" class="btn btn-info" value="formUpdateResponsable" name="MM_formResponsableUpdate"></input>
                                    <a href="lista-responsable.php" class="btn btn-danger">Cancelar Registro</a>
                                </div>

                            </form>
                        <?php
                        }
                        ?>
                    <?php
                    } else {
                    ?>
                        <form class="mb-2" action="" method="GET">
                            <input type="hidden" name="status" value="registrarResponsable">
                            <input class="btn btn-success" type="submit" value="Registrar Responsable" />
                        </form>
                    <?php
                    }
                    ?>
                </div>
                <table id="example" class="table table-striped table-bordered top-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Responsable</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($responsables as $responsable) {
                        ?>
                            <tr>
                                <td>
                                    <form method="GET" action="../controllers/ResponsableController.php">
                                        <input type="hidden" name="id_responsable-delete" value="<?= $responsable['id_responsable'] ?>">
                                        <button class="btn btn-danger" onclick="return confirm('¿Desea eliminar el registro seleccionado?');" type="submit"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                                    </form>
                                    <form method="GET" action="">
                                        <input type="hidden" name="status" value="updateResponsable">
                                        <input type="hidden" name="id_responsable-edit" value="<?= $responsable['id_responsable'] ?>">
                                        <button class="btn btn-success mt-2" onclick="return confirm('desea actualizar el registro seleccionado');" type="submit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
                                    </form>
                                </td>

                                <td><?php echo $responsable['nombre_responsable'] ?></td>


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