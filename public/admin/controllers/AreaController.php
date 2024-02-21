<?
// CONEXION A BASE DE DATOS
require_once "../../../database/connection.php";
$db = new Database();
$connection = $db->conectar();

//  REGISTRO DE AREA

if ((isset($_POST["MM_formArea"])) && ($_POST["MM_formArea"] == "formRegisterArea")) {

    // VARIABLES DE ASIGNACION DE VALORES QUE SE ENVIA DEL FORMULARIO REGISTRO DE AREAS
    $area = $_POST['area'];

    // CONSULTA SQL PARA VERIFICAR SI EL REGISTRO YA EXISTE EN LA BASE DE DATOS
    $db_validation = $connection->prepare("SELECT * FROM area WHERE Nombre_Area='$area'");
    $db_validation->execute();
    $register_validation = $db_validation->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {
        // SI SE CUMPLE LA CONSULTA ES PORQUE EL REGISTRO YA EXISTE
        echo '<script> alert ("// Estimado Usuario, el area ingresada ya esta registrada. //");</script>';
        echo '<script> window.location= "../views/lista-areas.php"</script>';
    } else if ($area == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert ("Estimado Usuario, Existen Datos Vacios En El Formulario");</script>';
        echo '<script> windows.location= "../views/lista-areas.php"</script>';
    } else {
        $registerarea = $connection->prepare("INSERT INTO area(Nombre_Area)VALUES('$area')");
        if ($registerarea->execute()) {
            echo '<script>alert ("Registro de area exitoso.");</script>';
            echo '<script>window.location="../views/lista-areas.php"</script>';
        }
    }
}

// EDITAR AREA 
if ((isset($_POST["MM_formAreaUpdate"])) && ($_POST["MM_formAreaUpdate"] == "formUpdateArea")) {

    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO
    $id_area = $_POST['id_area'];
    $area = $_POST['area'];


    $exami = $connection->prepare("SELECT * FROM area WHERE Id_Area='$id_area'");
    $exami->execute();
    $register_validation = $exami->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {

        $update = $connection->prepare("UPDATE area SET Nombre_Area='$area' WHERE Id_Area='$id_area'");
        $update->execute();

        echo '<script> alert ("//Estimado Usuario la actualizacion se ha realizado exitosamente. //");</script>';
        echo '<script> window.location= "../views/lista-areas.php"</script>';
    } else if ($id_area == "" || $area == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert (" //Estimado usuario existen datos vacios. //");</script>';
        echo '<script> windows.location= "../views/lista-areas.php"</script>';
    } else {

        echo '<script>alert("// Error al momento de la actualizacion de los datos. //");</script>';
        echo '<script>windows.location="../views/lista-areas.php"</script>';
    }
}

// ELIMINAR AREA

$id_area = $_GET["id_area-delete"];

if ($id_area !== null) {

    $delete = $connection->prepare("DELETE  FROM  area WHERE Id_Area = ' " . $id_area . "'");
    $delete->execute();


    if ($delete) {
        echo '<script> alert ("// Los datos se eliminaron correctamente //");</script>';
        echo '<script> window.location= "../views/lista-areas.php"</script>';
    } else {
        echo '<script> alert ("// error al momento de eliminar los datos  //");</script>';
        echo '<script> window.location= "../views/lista-areas.php"</script>';
    }
}
