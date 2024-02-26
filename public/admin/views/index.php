<?php
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

// CONSULTA BASE DE DATOS PARA TRAER TODOS LOS DATOS RELACIONADOS CON LOS DOCUMENTOS 

$listUsers = $connection->prepare("SELECT * FROM usuarios");
$listUsers->execute();
$users = $listUsers->fetchAll(PDO::FETCH_ASSOC);

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

                    <input type="hidden" name="status" value="registrarProcedimiento">
                    <a class="btn btn-success text-white" href="crear-usuario.php"> Registrar Usuario</a>

                </div>
                <table id="example" class="table table-striped table-bordered mt-2" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>#</th>
                            <th>Rol</th>
                            <th>Nombre de Usuario</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users as $user) {
                        ?>
                        <tr>

                            <td>
                                <form method="GET" action="../controllers/UserController.php">
                                    <input type="hidden" name="id_procedure-delete" value="<?= $user['id_usuario'] ?>">
                                    <button class="btn btn-danger"
                                        onclick="return confirm('¿Desea eliminar el registro seleccionado?');"
                                        type="submit"><i class="material-icons" data-toggle="tooltip"
                                            title="Delete">&#xE872;</i>
                                    </button>
                                </form>
                                <form method="GET" action="actualizar-usuario.php">
                                    <input type="hidden" name="id_user-edit" value="<?= $user['id_usuario'] ?>">
                                    <button class="btn btn-success mt-2"
                                        onclick="return confirm('desea actualizar el registro seleccionado');"
                                        type="submit"><i class="material-icons" data-toggle="tooltip"
                                            title="Edit">&#xE254;</i>
                                    </button>
                                </form>
                            </td>
                            <td><?php echo $user['id_usuario'] ?></td>
                            <td><?php echo $user['rol'] ?></td>
                            <td><?php echo $user['nombre_usuario'] ?></td>
                            <td><?php echo $user['usuario'] ?></td>
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

<script src="../../../assets/js/jquery-3.3.1.slim.min.js"></script>
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