<?php
session_start();
// CONEXION A BASE DE DATOS
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

//  REGISTRO DE PROCESO

if ((isset($_POST["MM_formResponsable"])) && ($_POST["MM_formResponsable"] == "formRegisterResponsable")) {

    // VARIABLES DE ASIGNACION DE VALORES QUE SE ENVIA DEL FORMULARIO REGISTRO DE PROCESOS
    $responsable = $_POST['responsable'];

    // CONSULTA SQL PARA VERIFICAR SI EL REGISTRO YA EXISTE EN LA BASE DE DATOS
    $db_validation = $connection->prepare("SELECT * FROM responsable WHERE nombre_responsable=:responsable");
    $db_validation->execute(array(':responsable' => $responsable));
    $register_validation = $db_validation->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {
        // SI SE CUMPLE LA CONSULTA ES PORQUE EL REGISTRO YA EXISTE
        echo '<script> alert ("// Estimado Usuario, el responsable ingresado ya esta registrado. //");</script>';
        echo '<script> window.location= "../views/lista-responsable.php"</script>';
    } else if ($responsable == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert ("Estimado Usuario, Existen Datos Vacios En El Formulario");</script>';
        echo '<script> window.location= "../views/lista-responsable.php"</script>';
    } else {

        $registerResponsable = $connection->prepare("INSERT INTO responsable(nombre_responsable) VALUES(:responsable)");
        if ($registerResponsable->execute(array(':responsable' => $responsable))) {

            echo '<script>alert ("Registro de responsable exitoso.");</script>';
            echo '<script>window.location="../views/lista-responsable.php"</script>';
        } else {
            echo '<script>alert ("Error al momento de hacer los registros.");</script>';
            echo '<script>window.location="../views/lista-responsable.php"</script>';
        }
    }
}

// EDITAR AREA 
if ((isset($_POST["MM_formResponsableUpdate"])) && ($_POST["MM_formResponsableUpdate"] == "formUpdateResponsable")) {

    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO
    $id_responsable = $_POST['id_responsable'];
    $responsable = $_POST['responsable'];


    $exami = $connection->prepare("SELECT * FROM responsable WHERE id_responsable='$id_responsable'");
    $exami->execute();
    $register_validation = $exami->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {
        $update = $connection->prepare("UPDATE responsable SET nombre_responsable ='$responsable' WHERE id_responsable='$id_responsable'");
        $update->execute();
        echo '<script> alert ("//Estimado Usuario la actualizacion se ha realizado exitosamente. //");</script>';
        echo '<script> window.location= "../views/lista-responsable.php"</script>';
    } else if ($id_responsable == "" || $responsable == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert (" //Estimado usuario existen datos vacios. //");</script>';
        echo '<script> windows.location= "../views/lista-responsable.php"</script>';
    } else {

        echo '<script>alert("// Error al momento de la actualizacion de los datos. //");</script>';
        echo '<script>windows.location="../views/lista-responsable.php"</script>';
    }
}

// ELIMINAR RESPONSABLE


if (!empty($_GET["id_responsable-delete"])) {
    $id_responsable_delete = $_GET["id_responsable-delete"];
    if (!empty($id_responsable_delete)) {
        $delete = $connection->prepare("DELETE  FROM responsable WHERE id_responsable = ' " . $id_responsable_delete . "'");
        $delete->execute();
        if ($delete) {
            echo '<script> alert ("// Los datos se eliminaron correctamente //");</script>';
            echo '<script> window.location= "../views/lista-responsable.php"</script>';
        } else {
            echo '<script> alert ("// error al momento de eliminar los datos  //");</script>';
            echo '<script> window.location= "../views/lista-responsable.php"</script>';
        }
    }
}
