<?php

require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();
?>

<?php require_once('menu.php') ?>



<div class="container-fluid p-3 bg-light-subtle">
    <div class="col-xs-12 bg-light-subtle border p-4">

        <h3 class="text-center">Cambio de Contraseña</h3>
        <form action="../controllers/ChangePasswordController.php" method="POST" autocomplete="off"
            name="formChangePassword">
            <label>Contraseña:</label>
            <input type="password" autofocus name="password" class='form-control'>
            <label>Confirmar Contraseña:</label>
            <input type="password" name="password-two" class='form-control'>

            <div class=" mt-4">
                <input type="submit" class="btn btn-success" value="Actualizar Contraseña"></input>
                <input type="hidden" class="btn btn-info" value="formChangePassword" name="MM_forms"></input>
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