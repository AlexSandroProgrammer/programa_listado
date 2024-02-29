<?php
session_start();
// CONEXION A BASE DE DATOS
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

//  REGISTRO DE PROCESO

if ((isset($_POST["MM_formProcedure"])) && ($_POST["MM_formProcedure"] == "formRegisterProcedure")) {

    // VARIABLES DE ASIGNACION DE VALORES QUE SE ENVIA DEL FORMULARIO REGISTRO DE PROCESOS
    $procedimiento = $_POST['procedimiento'];
    $proceso = $_POST['proceso'];



    // CONSULTA SQL PARA VERIFICAR SI EL REGISTRO YA EXISTE EN LA BASE DE DATOS
    $db_validation = $connection->prepare("SELECT * FROM procedimiento WHERE nombre_procedimiento = '$procedimiento'");
    $db_validation->execute();
    $register_validation = $db_validation->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {
        // SI SE CUMPLE LA CONSULTA ES PORQUE EL REGISTRO YA EXISTE
        echo '<script> alert ("// Estimado Usuario, el procedimiento ingresado ya esta registrado. //");</script>';
        echo '<script> window.location= "../views/lista-procedimientos.php"</script>';
    } else if ($procedimiento == "" || $proceso == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert ("Estimado Usuario, Existen Datos Vacios En El Formulario");</script>';
        echo '<script> windows.location= "../views/lista-procedimientos.php"</script>';
    } else {

        // traemos el nombre del directorio del proceso seleccionado para generar la ruta para el procedimiento 

        $getProccessSelected = $connection->prepare("SELECT * FROM proceso WHERE id_proceso = '$proceso'");
        $getProccessSelected->execute();
        $proccess = $getProccessSelected->fetch(PDO::FETCH_ASSOC);

        if ($proccess) {
            // colocamos la palabra en minuscula y quitamos los espacios
            $directory = strtolower($procedimiento);
            $directory_procedimiento = str_replace(' ', '', $directory);

            $ruta = '../documentos/' . $proccess['nombre_directorio_proceso'] . '/' . $directory_procedimiento;

            // Verificamos que el directorio no se haya creado
            if (!is_dir($ruta)) {
                if (!mkdir($ruta, 0755, true)) {
                    echo '<script> alert ("Error al crear el directorio.");</script>';
                    echo '<script> window.location= "../views/lista-procedimientos.php"</script>';
                    exit();
                }
            } else {
                echo '<script> alert ("Ya está creado un directorio con el nombre de ese proceso, por favor cámbielo.");</script>';
                echo '<script> window.location= "../views/lista-procedimientos.php"</script>';
                exit();
            }
        }

        // colocamos la palabra en minuscula y quitamos los espacios
        $directory_procedure = strtolower($procedimiento);
        $registerPorpcess = $connection->prepare("INSERT INTO procedimiento(nombre_procedimiento, id_proceso, nombre_directorio_procedimiento)VALUES('$procedimiento', '$proceso', '$directory_procedimiento')");
        if ($registerPorpcess->execute()) {
            echo '<script>alert ("Registro de procedimiento exitoso, se ha creado correctamente el directorio.");</script>';
            echo '<script>window.location="../views/lista-procedimientos.php"</script>';
        }
    }
}

// EDITAR AREA 
if ((isset($_POST["MM_formProcedureUpdate"])) && ($_POST["MM_formProcedureUpdate"] == "formUpdateProcedure")) {

    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO
    $id_procedimiento = $_POST['id_procedimiento'];
    $procedimiento = $_POST['procedimiento'];
    $proceso = $_POST['proceso'];



    $exami = $connection->prepare("SELECT * FROM procedimiento WHERE Id_Procedimiento='$id_procedimiento'");
    $exami->execute();
    $register_validation = $exami->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {

        $update = $connection->prepare("UPDATE procedimiento SET Nombre_Procedimiento ='$procedimiento', id_proceso = '$proceso' WHERE Id_Procedimiento='$id_procedimiento'");
        $update->execute();

        echo '<script> alert ("//Estimado Usuario la actualizacion se ha realizado exitosamente. //");</script>';
        echo '<script> window.location= "../views/lista-procedimientos.php"</script>';
    } else if ($id_procedimiento == "" || $proceso == "" || $procedimiento == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert (" //Estimado usuario existen datos vacios. //");</script>';
        echo '<script> windows.location= "../views/lista-procedimientos.php"</script>';
    } else {

        echo '<script>alert("// Error al momento de la actualizacion de los datos. //");</script>';
        echo '<script>windows.location="../views/lista-procedimientos.php"</script>';
    }
}

// ELIMINAR AREA

$id_procedure = $_GET["id_procedure-delete"];

if ($id_procedure !== null) {

    $delete = $connection->prepare("DELETE  FROM procedimiento WHERE Id_Procedimiento = ' " . $id_procedure . "'");
    $delete->execute();


    if ($delete) {
        echo '<script> alert ("// Los datos se eliminaron correctamente //");</script>';
        echo '<script> window.location= "../views/lista-procedimientos.php"</script>';
    } else {
        echo '<script> alert ("// error al momento de eliminar los datos  //");</script>';
        echo '<script> window.location= "../views/lista-procedimientos.php"</script>';
    }
}
