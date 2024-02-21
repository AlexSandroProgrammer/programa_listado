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
                    if (isset($_GET["status"])) {
                        if ($_GET["status"] === "registrarProcedimiento") {
                    ?>
                            <h3 class="text-center">Registro de Responsable</h3>
                            <form action="../controllers/UserController.php" method="POST" name="formRegisterArea">
                                <label>Nombre del Responsable:</label>
                                <input type="text" name="area" class='form-control'>

                                <div class="my-3">
                                    <input type="submit" class="btn btn-success" value="Registrar"></input>
                                    <input type="hidden" class="btn btn-info" value="formRegisterArea" name="MM_forms"></input>
                                    <a href="lista-responsable.php" class="btn btn-danger">Cancelar Registro</a>
                                </div>
                            </form>
                        <?php
                        } else {
                        ?>
                            <form class="mb-2" action="" method="GET">
                                <input type="hidden" name="status" value="registrarProcedimiento">
                                <input class="btn btn-success" type="submit" value="Registrar Responsable" />
                            </form>
                        <?php
                        }
                    }
                    if (!isset($_GET["status"])) {
                        ?>
                        <form class="mb-2" action="" method="GET">
                            <input type="hidden" name="status" value="registrarProcedimiento">
                            <input class="btn btn-success" type="submit" value="Registrar Responsable" />
                        </form>
                    <?php

                    }

                    ?>


                </div>
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Responsable</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($responsables as $responsable) {
                        ?>
                            <tr>
                                <td><?php echo $responsable['Id_Responsable'] ?></td>
                                <td><?php echo $responsable['Nombre_Responsable'] ?></td>


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