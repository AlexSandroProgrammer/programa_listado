<?php
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

// Verificamos si se recibió el id del usuario
if (!empty($_GET["id_user-edit"])) {

    $id_user = $_GET['id_user-edit'];
    // Traemos los datos del usuario seleccionado
    $dataUser = $connection->prepare("SELECT * FROM usuarios WHERE id_usuario = '$id_user'");
    $dataUser->execute();
    $user = $dataUser->fetch(PDO::FETCH_ASSOC);
?>

<?php require_once('menu.php') ?>

<div class="container-fluid p-3 bg-light-subtle">
    <div class="col-xs-12 bg-light-subtle border p-4">
        <h3 class="text-center">Actualizacion de Usuario</h3>
        <form action="../controllers/UserController.php" method="POST" autocomplete="off" name="formUpateUser">
            <input type="number" hidden name="id_usuario" value="<?php echo $user['id_usuario'] ?>">
            <label>Nombre Completo:</label>
            <input type="text" autofocus name="names" value="<?php echo $user['nombre_usuario'] ?>" class='form-control'
                maxlength="50">
            <label>Nombre de Usuario:</label>
            <input type="text" name="username" value="<?php echo $user['usuario'] ?>" class='form-control'>
            <label>Rol:</label>
            <input type="text" name="rol" value="<?php echo $user['rol'] ?>" class='form-control'>
            <div class=" mt-4">
                <input type="submit" class="btn btn-success" value="Actualizar"></input>
                <input type="hidden" class="btn btn-info" value="formUpateUser" name="MM_formsUpdate"></input>
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

<!-- código JS propio-->
<script type="text/javascript" src="../../../assets/js/props-datatable.js"></script>

<!------main-content-end----------->
<!----footer-design------------->

<?php
    require_once('footer.php');
    ?>
</div>
</body>

</html>

<?php
} else {
    // Si no se recibe el id_user-edit, redireccionamos
    header("Location: index.php");
    exit; // Aseguramos que no se ejecute más código después de la redirección
}
?>