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
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
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
                                <td><?php echo $user['id_Usuario'] ?></td>
                                <td><?php echo $user['rol'] ?></td>
                                <td><?php echo $user['nombre_Usuario'] ?></td>
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