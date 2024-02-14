<?php
    require_once("../../database/connection.php");
    $db = new Database();
    $connection = $db->conectar();

?>


<!----CONSULTA SQL TIPO USUARIOS---->

<?php


    $documento = $_GET["documento"];

    //delete * from user  where id= $documento


    $update=$connection->prepare("UPDATE user SET id_state= 1  WHERE document= ' ".$documento."'");
    $update-> execute();
    $state=$update -> fetch(PDO::FETCH_ASSOC);
    echo '<script> alert ("// SE ACTIVO EL USUARIO CORRECTAMENTE. //");</script>';
    echo '<script> window.location= "lista_usu.php"</script>';

?>
