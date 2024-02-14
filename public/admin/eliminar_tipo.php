<?php
    require_once("../../database/connection.php");
    $db = new Database();
    $connection = $db->conectar();

?>


<!----CONSULTA SQL TIPO USUARIOS---->

<?php

    $id_type_user = $_GET["id_type_user"];

    //delete * from user  where id= $id_type_user

    $delete=$connection->prepare("DELETE FROM type_user WHERE id_type_user='".$id_type_user."'");
    $delete-> execute();
    $borrar=$delete -> fetch(PDO::FETCH_ASSOC);

    if($borrar){
        echo '<script> alert ("// LOS DATOS SE ELIMINARON CORRECTAMENTE //");</script>';
        echo '<script> window.location= "index.php"</script>';

    }else{
        echo '<script> alert ("// LOS DATOS SE ELIMINARON CORRECTAMENTE //");</script>';
        echo '<script> window.location= "index.php"</script>';

    }

?>