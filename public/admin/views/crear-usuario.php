<?php

require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();
?>




<?php require_once('menu.php') ?>



<div class="container-fluid p-3 bg-light-subtle">
    <div class="col-xs-12 bg-light-subtle border p-4">

        <h3 class="text-center">Registro de Usuario</h3>
        <form action="../controllers/UserController.php" method="POST" autocomplete="off" name="formRegisterUser">


            <label>Nombre Completo:</label>
            <input type="text" name="names" class='form-control'>
            <label>Nombre de Usuario:</label>
            <input type="text" name="username" class='form-control'>
            <label>Rol:</label>
            <input type="text" name="rol" class='form-control'>
            <label>Contraseña:</label>
            <input type="password" name="password" class='form-control'>

            <div class=" mt-4">
                <input type="submit" class="btn btn-success" value="Registrar"></input>
                <input type="hidden" class="btn btn-info" value="formRegisterUser" name="MM_forms"></input>
                <a href="index.php" class="btn btn-danger">Cancelar Registro</a>
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


<!------main-content-end----------->

<!----footer-design------------->

<?php
require_once('footer.php');

?>
</div>




</body>

</html>