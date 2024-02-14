<?php
session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection = $db->conectar();


$sql = $connection->prepare("SELECT * FROM user,type_user WHERE  username ='" . $_SESSION['usuario'] . "' AND user.id_type_user = type_user.id_type_user");
$sql->execute();
$usua = $sql->fetch(PDO::FETCH_ASSOC);
$user_report = $connection->prepare("SELECT * FROM user INNER JOIN type_user INNER JOIN state INNER JOIN gender ON user.id_type_user = type_user.id_type_user AND user.id_gender=gender.id_gender AND user.id_state=state.id_state");
$user_report->execute();
$reporte = $user_report->fetch(PDO::FETCH_ASSOC);

$comando = $connection->prepare("SELECT * FROM datetime_entry INNER JOIN user INNER JOIN type_user ON datetime_entry.document = user.document AND user.id_type_user = type_user.id_type_user ORDER BY id_entry  DESC LIMIT 6");
$comando->execute();
$resultado = $comando->fetch(PDO::FETCH_ASSOC);

include('../../controller/validarSesion.php');

if (isset($_POST['btncerrar'])) {
    session_destroy();
    header("Location:../../index.php");
}

?>


<!-- CONSULTA PARA REGISTRAR UN NUEVO COLOR -->

<?php
if ((isset($_POST["MM_color"])) && ($_POST["MM_color"] == "formcolor")) {

    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO
    $id_color = $_POST['id_color'];
    $nombre_color = $_POST['nombre_color'];


    $examinar = $connection->prepare("SELECT * FROM colores_moto WHERE id_color='$id_color' OR nombre_color='$nombre_color' ");
    $examinar->execute();
    $register_valicolor = $examinar->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_valicolor) {
        // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE
        echo '<script> alert ("// El color ingresado ya se encuentra registrado //");</script>';
        echo '<script> window.location= "lista_clientes.php"</script>';
    } else if ($id_color == "" || $nombre_color == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert ("// estimado usuario existen datos vacios //");</script>';
        echo '<script> window.location= "lista_clientes.php"</script>';
    } else {
        $register_color = $connection->prepare("INSERT INTO colores_moto(id_color,nombre_color) VALUES ('$id_color','$nombre_color')");
        if ($register_color->execute()) {
            echo '<script>alert("// Estimado Usuario el registro del nuevo color de moto ha sido exitoso,Seleccionamente nuevamente al cliente. //");</script>';
            echo '<script> window.location= "lista_clientes.php"</script>';
        }
    }
}

?>


<!-- CONSULTA PARA REGISTRAR UNA NUEVA MARCA -->
<?php
if ((isset($_POST["MM_marca"])) && ($_POST["MM_marca"] == "formreg1")) {
    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO
    $id_marca = $_POST['id_marca'];
    $marca = $_POST['marca'];


    $examinar = $connection->prepare("SELECT * FROM marcas_motos WHERE id='$id_marca' OR nombre='$marca'");
    $examinar->execute();
    $register_valimarca = $examinar->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_valimarca) {

        // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE

        echo '<script> alert ("// La marca ya se encuentra registrada //");</script>';
        echo '<script> window.location= "lista_clientes.php"</script>';
    } else if ($id_marca == "" || $marca == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert (" // Estimado usuario existen datos vacios en el formulario. //");</script>';
        echo '<script> window.location= "lista_clientes.php"</script>';
    } else {
        $register_marca = $connection->prepare("INSERT INTO marcas_motos(id,nombre) VALUES('$id_marca','$marca')");
        if ($register_marca->execute()) {
            echo '<script>alert("// Estimado Usuario el registro de la nueva marca para moto ha sido exitosoa,Seleccionamente nuevamente al cliente. //");</script>';
            echo '<script>window.location="lista_clientes.php"</script>';
        }
    }
}
?>


<!-- CONSULTA PARA REGISTRAR UNA NUEVA MARCA PARA PRODUCTOS -->
<?php
if ((isset($_POST["MM_marcaProducto"])) && ($_POST["MM_marcaProducto"] == "formMarcaProducto")) {
    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO

    $marca = $_POST['marca'];


    $examinar = $connection->prepare("SELECT * FROM marca WHERE marca = '$marca'");
    $examinar->execute();
    $register_valimarca = $examinar->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_valimarca) {

        // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE

        echo '<script> alert ("// La marca ya se encuentra registrada //");</script>';
        echo '<script> window.location= "lista_products.php"</script>';
    } else if ( $marca == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert (" // Estimado usuario existen datos vacios en el formulario. //");</script>';
        echo '<script> window.location= "lista_clientes.php"</script>';
    } else {
        $register_marca = $connection->prepare("INSERT INTO marca(marca) VALUES('$marca')");
        if ($register_marca->execute()) {
            echo '<script>alert("// Estimado Usuario el registro de la nueva marca para productos ha sido exitosa. //");</script>';
            echo '<script>window.location="formulario.php"</script>';
        }
    }
}
?>

<?php
if ((isset($_POST["MM_modelo"])) && ($_POST["MM_modelo"] == "formreg2")) {
    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO
    $id_modelos = $_POST['id_modelo'];
    $modelos = $_POST['modelo'];


    $examinar = $connection->prepare("SELECT * FROM modelos WHERE id_modelo='$id_modelos' OR modelo_año='$modelos'");
    $examinar->execute();
    $register_validation = $examinar->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {

        // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE

        echo '<script> alert ("//Estimado Usuario, el modelo ya se encuentra registrado //");</script>';
        echo '<script> window.location= "lista_clientes.php"</script>';
    } else if ($id_modelos == "" || $modelos == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert (" //Estimado usuario existen datos vacios. //");</script>';
        echo '<script> window.location= "lista_clientes.php"</script>';
    } else {
        // DECISION QUE PERMITE REALIZAR EL ENVIO DE LA INFORMACION MEDIANTE LA BASE DE DATOS //
        $register_modelo = $connection->prepare("INSERT INTO modelos(id_modelo,modelo_año) VALUES ('$id_modelos','$modelos')");


        if ($register_modelo->execute()) {

            echo '<script>alert("// Estimado Usuario el registro del nuevo modelo de moto ha sido exitoso,Seleccionamente nuevamente al cliente. //");</script>';
            echo '<script>window.location="lista_clientes.php"</script>';
        }
    }
}

// CONSULTA PARA REGISTRAR EL NUEVO TIPO DE COMBUSTIBLE


if ((isset($_POST["MM_combustible"])) && ($_POST["MM_combustible"] == "formCombustible")) {
    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO
    $combustible = $_POST['combustible'];


    $examinar = $connection->prepare("SELECT * FROM combustible WHERE combustible='$combustible'");
    $examinar->execute();
    $register_combustible = $examinar->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_combustible) {

        // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE

        echo '<script> alert ("// Estimado Usuario el tipo de combustible ya se encuentra registrado. //");</script>';
        echo '<script> window.location= "lista_clientes.php"</script>';
    } else if ($combustible == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert (" // Estimado usuario existen datos vacios en el formulario. //");</script>';
        echo '<script> window.location= "lista_clientes.php"</script>';
    } else {
        $nuevo_combustible = $connection->prepare("INSERT INTO combustible(combustible) VALUES('$combustible')");
        if ($nuevo_combustible->execute()) {
            echo '<script>alert("// Estimado Usuario el registro del nuevo combustible de moto ha sido exitoso,Seleccionamente nuevamente al cliente. //");</script>';
            echo '<script>window.location="lista_clientes.php"</script>';
        }
    }
}



if ((isset($_POST["MM_carroceria"])) && ($_POST["MM_carroceria"] == "formCarroceria")) {
    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO
    $carroceria = $_POST['carroceria'];
    $examinar = $connection->prepare("SELECT * FROM carroceria WHERE carroceria='$carroceria'");
    $examinar->execute();
    $register_carroceria = $examinar->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_carroceria) {

        // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE

        echo '<script> alert ("//Estimado usuario, el tipo de carroceria ya se encuentra registrado. //");</script>';
        echo '<script> window.location= "lista_clientes.php"</script>';
    } else if ($carroceria == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert ("// estimado usuario existen datos vacios //");</script>';
        echo '<script> window.location= "lista_clientes.php"</script>';
    } else {
        $nueva_carroceria = $connection->prepare("INSERT INTO carroceria(carroceria) VALUES ('$carroceria')");
        if ($nueva_carroceria->execute()) {
            echo '<script>alert("// Estimado Usuario el registro del nuevo tipo de carroceria moto ha sido exitoso,Seleccionamente nuevamente al cliente. //");</script>';
            echo '<script>window.location="lista_clientes.php"</script>';
        }
    }
}





if ((isset($_POST["MM_cilindraje"])) && ($_POST["MM_cilindraje"] == "formCilindraje")) {
    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO
    $cilindraje = $_POST['cilindraje'];
    $examinar = $connection->prepare("SELECT * FROM cilindraje WHERE cilindraje='$cilindraje'");
    $examinar->execute();
    $register_validation = $examinar->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation) {
        // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE
        echo '<script> alert ("//Estimado Usuario, el cilindraje de moto ya se encuentra registrado. //");</script>';
        echo '<script> window.location= "lista_clientes.php"</script>';
    } else if ($cilindraje == "") {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert (" //Estimado usuario existen datos vacios. //");</script>';
        echo '<script> window.location= "lista_clientes.php"</script>';
    } else {
        // DECISION QUE PERMITE REALIZAR EL ENVIO DE LA INFORMACION MEDIANTE LA BASE DE DATOS //
        $register_user = $connection->prepare("INSERT INTO cilindraje(cilindraje) VALUES ('$cilindraje')");
        $register_user->execute();

        if ($register_user->execute()) {
            echo '<script>alert("// Estimado Usuario el registro del nuevo clindraje ha sido exitoso,Seleccionamente nuevamente al cliente. //");</script>';
            echo '<script>window.location="lista_clientes.php"</script>';
        }
    }
}



if((isset($_POST["MM_servicio"]))&&($_POST["MM_servicio"]=="formServicio"))

{
    // DECLARACION DE LOS VALORES DE LAS VARIABLES DEPENDIENDO DEL TIPO DE CAMPO QUE TENGA EN EL FORMULARIO
    $servicio_moto = $_POST['servicio_moto'];


    $examinar=$connection ->prepare("SELECT * FROM servicio_moto WHERE servicio_moto='$servicio_moto'");
    $examinar -> execute();
    $register_validation=$examinar->fetchAll();

    // CONDICIONALES DEPENDIENDO EL RESULTADO DE LA CONSULTA
    if ($register_validation){

        // SI SE CUMPLE LA CONSULTA ES PORQUE EL USUARIO YA EXISTE
        echo '<script> alert ("// El servicio de moto ya se encuentra registrado. //");</script>';
        echo '<script> window.location= "lista_clientes.php"</script>';

    }

    else if ($servicio_moto=="")
    {
        // CONDICIONAL DEPENDIENDO SI EXISTEN ALGUN CAMPO VACIO EN EL FORMULARIO DE LA INTERFAZ
        echo '<script> alert (" // Estimado usuario existen datos vacios en el formulario. //");</script>';
        echo '<script> window.location= "lista_clientes.php"</script>';
    }else
    {
        $register_user=$connection->prepare("INSERT INTO servicio_moto(servicio_moto) VALUES('$servicio_moto')");
        if( $register_user->execute()){
            echo '<script>alert("// Estimado Usuario el registro del nuevo servicio de moto ha sido exitoso,Seleccionamente nuevamente al cliente. //");</script>';
            echo '<script>window.location="lista_clientes.php"</script>';
        }
       

    }
}


?>