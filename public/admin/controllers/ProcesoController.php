<?php
session_start();
// CONEXION A BASE DE DATOS
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

//  REGISTRO DE PROCESO

if ((isset($_POST["MM_formProccess"])) && ($_POST["MM_formProccess"] == "formRegisterProccess")) {

    // VARIABLES DE ASIGNACION DE VALORES QUE SE ENVIA DEL FORMULARIO REGISTRO DE PROCESOS
    $proceso = $_POST['proceso'];

    // CONSULTA SQL PARA VERIFICAR SI EL REGISTRO YA EXISTE EN LA BASE DE DATOS
    $db_validation = $connection->prepare("SELECT * FROM proceso WHERE nombre_proceso=:proceso");
    $db_validation->execute(array(':proceso' => $proceso));
    $register_validation = $db_validation->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {
        // SI SE CUMPLE LA CONSULTA ES PORQUE EL REGISTRO YA EXISTE
        echo '<script> alert ("// Estimado Usuario, el proceso ingresado ya esta registrado. //");</script>';
        echo '<script> window.location= "../views/lista-procesos.php"</script>';
    } else if ($proceso == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert ("Estimado Usuario, Existen Datos Vacios En El Formulario");</script>';
        echo '<script> window.location= "../views/lista-procesos.php"</script>';
    } else {
        // colocamos la palabra en minuscula y quitamos los espacios
        $directory = strtolower($proceso);
        $directory_proccess = str_replace(' ', '', $directory);

        $ruta = '../documentos/' . $directory_proccess;

        // Verificamos que el directorio no se haya creado
        if (!is_dir($ruta)) {
            if (!mkdir($ruta, 0755, true)) {
                echo '<script> alert ("Error al crear el directorio.");</script>';
                echo '<script> window.location= "../views/lista-procesos.php"</script>';
                exit();
            }
        } else {
            echo '<script> alert ("Ya está creado un directorio con el nombre de ese proceso, por favor cámbielo.");</script>';
            echo '<script> window.location= "../views/lista-procesos.php"</script>';
            exit();
        }

        $registerProccess = $connection->prepare("INSERT INTO proceso(nombre_proceso,nombre_directorio_proceso) VALUES(:proceso, :directory)");
        if ($registerProccess->execute(array(':proceso' => $proceso, ':directory' => $directory_proccess))) {

            echo '<script>alert ("Registro de proceso exitoso.");</script>';
            echo '<script>window.location="../views/lista-procesos.php"</script>';
        } else {
            echo '<script>alert ("Error al momento de hacer los registros.");</script>';
            echo '<script>window.location="../views/lista-procesos.php"</script>';
        }
    }
}

// EDITAR AREA 
if ((isset($_POST["MM_formProccessUpdate"])) && ($_POST["MM_formProccessUpdate"] == "formUpdateProccess")) {

    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO
    $id_proceso = $_POST['id_proceso'];
    $proceso = $_POST['proceso'];


    $exami = $connection->prepare("SELECT * FROM proceso WHERE Id_Proceso='$id_proceso'");
    $exami->execute();
    $register_validation = $exami->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {

        $update = $connection->prepare("UPDATE proceso SET Nombre_Proceso ='$proceso' WHERE Id_Proceso='$id_proceso'");
        $update->execute();

        echo '<script> alert ("//Estimado Usuario la actualizacion se ha realizado exitosamente. //");</script>';
        echo '<script> window.location= "../views/lista-procesos.php"</script>';
    } else if ($id_proceso == "" || $proceso == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert (" //Estimado usuario existen datos vacios. //");</script>';
        echo '<script> windows.location= "../views/lista-procesos.php"</script>';
    } else {

        echo '<script>alert("// Error al momento de la actualizacion de los datos. //");</script>';
        echo '<script>windows.location="../views/lista-procesos.php"</script>';
    }
}

// ELIMINAR AREA

$id_proccess = $_GET["id_proccess-delete"];

if ($id_proccess !== null) {

    $delete = $connection->prepare("DELETE  FROM proceso WHERE Id_Proceso = ' " . $id_proccess . "'");
    $delete->execute();


    if ($delete) {
        echo '<script> alert ("// Los datos se eliminaron correctamente //");</script>';
        echo '<script> window.location= "../views/lista-procesos.php"</script>';
    } else {
        echo '<script> alert ("// error al momento de eliminar los datos  //");</script>';
        echo '<script> window.location= "../views/lista-procesos.php"</script>';
    }
}
