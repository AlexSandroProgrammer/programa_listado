<?php
    require_once("../../database/connection.php");
    $db = new Database();
    $connection = $db->conectar();

?>


<!----CONSULTA SQL TIPO USUARIOS---->

<?php

    $placa = $_GET["placa"];

    //delete * from user  where id= $documento


    $delete=$connection->prepare("DELETE FROM motorcycles WHERE placa='".$placa."'");
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
