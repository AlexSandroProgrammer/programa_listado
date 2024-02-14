<?php
    require_once("../../database/connection.php");
    $db = new Database();
    $con = $db->conectar();

?>


<!----CONSULTA SQL TIPO USUARIOS---->

<?php

    $servi = $_GET["id_services"];

    //delete * from user  where id= $documento


    $delete=$con->prepare("DELETE  FROM  services WHERE id_services= ' ".$servi."'");
    $delete-> execute();
    $borrar=$delete -> fetch(PDO::FETCH_ASSOC);


    if($borrar == true){
        echo '<script> alert ("// LOS DATOS SE ELIMINARON CORRECTAMENTE //");</script>';
        echo '<script> window.location= "lista_documento.php"</script>';

    }else{
        echo '<script> alert ("// LOS DATOS SE ELIMINARON CORRECTAMENTE //");</script>';
        echo '<script> window.location= "lista_documento.php"</script>';

    }

?>