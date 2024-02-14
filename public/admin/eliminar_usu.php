<?php
    require_once("../../database/connection.php");
    $db = new Database();
    $connection = $db->conectar();

?>


<!----CONSULTA SQL TIPO USUARIOS---->

<?php


    $documento = $_GET["documento"];

    //delete * from user  where id= $documento


    $delete=$connection->prepare("DELETE  FROM  user WHERE document= ' ".$documento."'");
    $delete-> execute();
    $borrar=$delete -> fetch(PDO::FETCH_ASSOC);


    if($borrar == true){
        echo '<script> alert ("// LOS DATOS SE ELIMINARON CORRECTAMENTE //");</script>';
        echo '<script> window.location= "lista_usu.php"</script>';

    }else{
        echo '<script> alert ("// LOS DATOS SE ELIMINARON CORRECTAMENTE //");</script>';
        echo '<script> window.location= "lista_usu.php"</script>';

    }

?>
