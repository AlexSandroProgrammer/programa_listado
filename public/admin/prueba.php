<?php
session_start();
require_once("../../database/connection.php");
$db = new Database();
$connection = $db->conectar();
		
$servicio = $connection->prepare("SELECT * FROM services");
$servicio->execute();
$productos = $servicio->fetch(PDO::FETCH_ASSOC);

$consul = $connection->prepare("SELECT * FROM user WHERE id_type_user = 2");
$consul->execute();
$name = $consul->fetch();

$consul1 = $connection->prepare("SELECT * FROM motorcycles");
$consul1->execute();
$placa = $consul1->fetch();

$sql = $connection->prepare("SELECT * FROM user,type_user WHERE  username ='" . $_SESSION['usuario'] . "' AND user.id_type_user = type_user.id_type_user");
$sql->execute();
$usua = $sql->fetch(PDO::FETCH_ASSOC);
?>


<!----CONSULTAS SQL TIPO USUARIOS, GENERO, PAIS, CIUDAD Y ESTADO---->
<?php
if (isset($_POST['btncerrar'])) {
	session_destroy();
	header("Location:../../index.php");
}


?>
<?php
if (!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
<div class="col-xs-12">
	<?php
	if (isset($_GET["status"])) {
		if ($_GET["status"] === "1") {
	?>
			<div class="alert alert-success">
				<strong>¡Correcto!</strong> Venta realizada correctamente
			</div>
		<?php
		} else if ($_GET["status"] === "2") {
		?>
			<div class="alert alert-info">
				<strong>Venta cancelada</strong>
			</div>
		<?php
		} else if ($_GET["status"] === "3") {
		?>
			<div class="alert alert-info">
				<strong>Retiroso exitoso</strong>, Producto quitado de la lista.
			</div>
		<?php
		} else if ($_GET["status"] === "4") {
		?>
			<div class="alert alert-warning">
				<strong>Error:</strong> El producto que buscas no existe
			</div>
		<?php
		} else if ($_GET["status"] === "5") {
		?>
			<div class="alert alert-danger">
				<strong>Error: </strong>El producto está agotado
			</div>
		<?php
		} else {
		?>
			<div class="alert alert-danger">
				<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
			</div>
	<?php
		}
	}
	?>

	<!doctype html>
	<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<title>MENU PRINCIPAL ADMINISTRADOR</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../../controller/CSS/bootstrap.min.css">
		<!----css3---->
		<link rel="stylesheet" href="../../controller/CSS/custom.css">
		<!--google fonts -->
		<link rel="shortcut icon" href="../../controller/image/favicon.png" type="image/x-icon">
		<link rel="stylesheet" href="./css/2.css">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
		<link rel="shortcut icon" href="../../controller/image/favicon.png" type="image/x-icon">

		<!--google material icon-->
		<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

	</head>

	<body>
		<div class="wrapper">

			<div id="sidebar">
				<div class="sidebar-header">
					<h3><img src="../../controller/image/favicon.png" class="img-fluid" /><span><?php echo $usua['type_user'] ?> <span><?php echo $usua['name'] ?></span></h3>
					<h3><span></span></h3>
				</div>
				<ul class="list-unstyled component m-0">
					<li class="active">
						<a href="index.php" class="dashboard"><i class="material-icons">dashboard</i>Menu Principal </a>
					</li>
					<li class="dropdown">
						<a href="#homeSubmen15" data-toggle="collapse" class="dropdown-toggle">
							<i class="material-icons">dashboard</i>Act. Recientes
						</a>
						<ul class="collapse list-unstyled menu" id="homeSubmen15">
							<li><a href="act_trabajador.php">Actividades Trabajadores</a></li>
							<li><a href="act_cliente.php">Actividades Clientes</a></li>

						</ul>
					</li>
					<li class="dropdown">
						<a href="#homeSubmen20" data-toggle="collapse" class="dropdown-toggle">
							<i class="material-icons">dashboard</i>Editar Cuenta
						</a>
						<ul class="collapse list-unstyled menu" id="homeSubmen20">
							<li><a href="./contrasena.php">Cambiar contraseña</a></li>

						</ul>
					</li>

					<li class="dropdown">
						<a href="#homeSubmen11" data-toggle="collapse" class="dropdown-toggle">
							<i class="material-icons">dashboard</i>Crear
						</a>
						<ul class="collapse list-unstyled menu" id="homeSubmen11">
							<li><a href="crear_color.php">Crear Color</a></li>
							<li><a href="crear_modelo.php">Crear Modelo</a></li>
							<li><a href="crear_marca.php">Crear Marca</a></li>
							<li><a href="crear_combustible.php">Crear Combustible</a></li>
							<li><a href="crear_tipo.php">Crear T.Usuario</a></li>
							<li><a href="categoria.php">Categoria Producto</a></li>
							<li><a href="carroceria.php">Crear Carroceria</a></li>
							<li><a href="crear_cilindraje.php">Crear Cilindraje</a></li>
							<li><a href="servicio_moto.php">Crear Serv. Moto</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
							<i class="material-icons">apps</i>Usuarios
						</a>
						<ul class="collapse list-unstyled menu" id="homeSubmenu2">
							<li><a href="crear_usu.php">Crear Usuario</a></li>
							<li><a href="lista_usu.php">Lista usuarios</a></li>
							<li><a href="lista_tipo_usu.php">Lista de tipos de usuarios</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#homeSubmenu9" data-toggle="collapse" class="dropdown-toggle">
							<i class="material-icons">date_range</i>Clientes
						</a>
						<ul class="collapse list-unstyled menu" id="homeSubmenu9">
							<li><a href="crear_cliente.php">Crear cliente</a></li>
							<li><a href="lista_clientes.php">Lista de Clientes</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
							<i class="material-icons">equalizer</i>Motos
						</a>
						<ul class="collapse list-unstyled menu" id="homeSubmenu4">
							<li><a href="list_motos.php">Lista de Motos</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#homeSubmen17" data-toggle="collapse" class="dropdown-toggle">
							<i class="material-icons">dashboard</i>Productos
						</a>
						<ul class="collapse list-unstyled menu" id="homeSubmen17">
							<li><a href="lista_products.php">Lista de Productos</a></li>
							<li><a href="formulario.php">Crear Producto</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#homeSubmenu12" data-toggle="collapse" class="dropdown-toggle">
							<i class="material-icons">date_range</i>Servicios
						</a>
						<ul class="collapse list-unstyled menu" id="homeSubmenu12">
							<li><a href="service.php">Crear Servicio</a></li>
							<li><a href="lista_service.php">Lista de Servicios</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#homeSubmenu19" data-toggle="collapse" class="dropdown-toggle">
							<i class="material-icons">date_range</i>Documentos Legales
						</a>
						<ul class="collapse list-unstyled menu" id="homeSubmenu19">
							<li><a href="documentos.php">Crear Documento Legal</a></li>
							<li><a href="lista_documento.php">Lista de Documentos legales</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
							<i class="material-icons">border_color</i>Generar Ventas
						</a>
						<ul class="collapse list-unstyled menu" id="homeSubmenu5">
							<li><a href="vender.php">Venta de Productos</a></li>
							<li><a href="vender_servicio.php">Venta de Servicios</a></li>
							<li><a href="vender_documento.php">Venta de Documentos</a></li>
							<li><a href="vender_completo.php">Venta completa</a></li>
							<li><a href="ventas.php">Listas de Ventas</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#homeSubmenu22" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
							<i class="material-icons">border_color</i>Compras
						</a>
						<ul class="collapse list-unstyled menu" id="homeSubmenu22">
							<li><a href="compras.php">Compras de Productos</a></li>


						</ul>
					</li>

					<li class="dropdown">
						<a href="#homeSubmenu7" data-toggle="collapse" class="dropdown-toggle">
							<i class="material-icons">content_copy</i>Reportes
						</a>
						<ul class="collapse list-unstyled menu" id="homeSubmenu7">
							<li><a href="reporte_usu.php">Reporte Usuarios</a></li>
							<li><a href="lista_products.php">Inventario Productos</a></li>
							<li><a href="ventas.php">Reporte de Ventas</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#homeSubmenu15" data-toggle="collapse" class="dropdown-toggle">
							<i class="material-icons">content_copy</i>Copia de seguridad
						</a>
						<ul class="collapse list-unstyled menu" id="homeSubmenu15">
							<li><a href="respaldo/respaldo.php">Generar Copia</a></li>
						</ul>
					</li>

				</ul>
			</div>

			<!-------sidebar--design- close----------->



			<!-------page-content start----------->

			<div id="content">

				<!------top-navbar-start----------->

				<div class="top-navbar">
					<div class="xd-topbar">
						<div class="row">
							<div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
								<div class="xp-menubar">
									<span class="material-icons text-white">signal_cellular_alt</span>
								</div>
							</div>

							<div class="col-md-5 col-lg-3 order-3 order-md-2">
								<div class="xp-searchbar">
									<form>
										<div class="input-group">
											<input type="search" class="form-control" placeholder="">

										</div>
									</form>
								</div>
							</div>


							<div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
								<div class="xp-profilebar text-right">
									<nav class="navbar p-0">
										<ul class="nav navbar-nav flex-row ml-auto">
											<li class="dropdown nav-item active">
												<a class="nav-link" href="#" data-toggle="dropdown">
													<span class="material-icons">notifications</span>
													<span class="notification">4</span>
												</a>
												<ul class="dropdown-menu">
													<li><a href="#">You Have 4 New Messages</a></li>
													<li><a href="#">You Have 4 New Messages</a></li>
													<li><a href="#">You Have 4 New Messages</a></li>
													<li><a href="#">You Have 4 New Messages</a></li>
												</ul>
											</li>

											<li class="nav-item">
												<a class="nav-link" href="#">
													<span class="material-icons">question_answer</span>
												</a>
											</li>

											<li class="dropdown nav-item">
												<a class="nav-link" href="#" data-toggle="dropdown">
													<img src="../../controller/image/favicon.png" style="width:40px; border-radius:50%;" />
													<span class="xp-user-live"></span>
												</a>
												<ul class="dropdown-menu small-menu">
													<li>
														<form method="POST">
															<tr><br>
																<td colspan="2" align="center">
																	<input type="submit" value="Cerrar sesion" id="btn_quote" name="btncerrar" class="btn__out" />
																</td>
															</tr>
														</form>
													</li>

												</ul>
											</li>


										</ul>
									</nav>
								</div>
							</div>

						</div>


						<div class="xp-breadcrumbbar text-center">
							<h4 class="page-title"><span>GENERAR VENTA</span></h4>
							<ol class="breadcrumb">
							</ol>
						</div>


					</div>
				</div>
				<!------top-navbar-end----------->
				<br>
				<form method="post" action="agregar_ser.php">
					<label for="codigo">Código de barras:</label>
					<input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">

				</form>
				<br><br>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID del servicio</th>
							<th>Código</th>
							<th>Nombre del servicio</th>
							<th>Precio del servicio</th>
							<th>Total</th>
							<th>quitar</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($_SESSION["carrito"] as $indice => $producto) {
							$granTotal += $producto->total;
						?>
							<tr>
								<td><?php echo $producto->id_services ?></td>
								<td><?php echo $producto->code_service ?></td>
								<td><?php echo $producto->service ?></td>
								<td><?php echo $producto->costo_service ?></td>
								<td><?php echo $producto->total ?></td>
								<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice ?>" Style='color:white;'>Eliminar<i class="fa fa-trash"></i></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>

				<h3>Total: <?php echo $granTotal; ?></h3>
				<form action="./terminarVenta.php" method="POST">
					<br>
					<label>Vendedor:</label>
					<select name="document" id="" class='form-control'>
						<option> Seleccione el vendedor</option>
						<?php

						do {

						?>
							<option value=<?php echo ($name['document']) ?>?><?php echo ($name['name']) ?> </option>
						<?php
						} while ($name = $consul->fetch());

						?>
					</select>
					<br>
					<label>Placa de la Moto</label>
					<select name="placa" id="" class='form-control'>
						<option> Seleccione la placa</option>
						<?php

						do {

						?>
							<option value=<?php echo ($placa['placa']) ?>><?php echo ($placa['placa']) ?> </option>
						<?php
						} while ($placa = $consul1->fetch());

						?>
					</select>
					<br>
					<input name="total" type="hidden" value="<?php echo $granTotal; ?>">
					<button type="submit" class="btn btn-info">Terminar venta</button>
					<a href="./cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
				</form>
			</div>

			<!----add-modal start--------->

			<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Crear Usuario</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="container">
							<form method="POST" name="form	reg" action="" autocomplete="off" id="formulario" class="formulario">

								<!-- Group: Document -->
								<div class="formulario__grupo" id="grupo__document">
									<label for="document" class="formulario__label">Numero de documento</label>
									<div class="formulario__grupo-input">
										<input type="number" class="formulario__input" name="document" id="document" required placeholder="Ingrese su numero de documento">
										<i class="formulario__validacion-estado fas fa-times-circle"></i>
									</div>
									<!-- <p class="formulario__input-error">El numero de documento debe ser de 6 a 10 numeros.</p> -->
								</div>


								<!-- Group: Nombre -->
								<div class="formulario__grupo" id="grupo__name">
									<label for="name" class="formulario__label">Nombre completo</label>
									<div class="formulario__grupo-input">
										<input type="text" class="formulario__input" name="name" required id="name" placeholder="Ingrese sus nombres">
										<i class="formulario__validacion-estado fas fa-times-circle"></i>
									</div>
									<p class="formulario__input-error">Debe ingresar su nombre completo, o en preferencia su primer nombre y apellido.</p>
								</div>


								<!-- Group: surname -->

								<div class="formulario__grupo" id="grupo__surnam">
									<label for="password2" class="formulario__label">Apellidos completos</label>
									<div class="formulario__grupo-input">
										<input type="password" class="formulario__input" name="surnam" required id="surnam" placeholder="Ingrese sus apellidos">
										<i class="formulario__validacion-estado fas fa-times-circle"></i>
									</div>
									<p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
								</div>

								<!-- Group: Username -->
								<div class="formulario__grupo" id="grupo__username">
									<label for="username" class="formulario__label">Nombre de Usuario</label>
									<div class="formulario__grupo-input">
										<input type="text" class="formulario__input" name="username" required id="username" placeholder="Ingrese su nombre">
										<i class="formulario__validacion-estado fas fa-times-circle"></i>
									</div>
									<p class="formulario__input-error">El usuario tiene que ser de 4 a 10 dígitos y solo puede contener numeros, letras y guion bajo.</p>
								</div>



								<!-- Group: Password -->

								<div class="formulario__grupo" id="grupo__password">
									<label for="password" class="formulario__label">Contraseña de Usuario</label>
									<div class="formulario__grupo-input">
										<input type="password" class="formulario__input" name="password" required id="password" placeholder="Ingrese su contraseña">
										<i class="formulario__validacion-estado fas fa-times-circle"></i>
									</div>
									<p class="formulario__input-error">La contraseña tiene que ser de 4 a 10 dígitos y solo puede contener numeros, letras y guion bajo.</p>
								</div>


								<!-- Group: telephone -->

								<div class="formulario__grupo" id="grupo__telephone">
									<label for="telephone" class="formulario__label">Numero de Telefono</label>
									<div class="formulario__grupo-input">
										<input type="text" class="formulario__input" name="telephone" required id="telephone" placeholder="Ingrese su numero de contacto">
										<i class="formulario__validacion-estado fas fa-times-circle"></i>
									</div>
									<p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
								</div>


								<!-- Group: email -->
								<div class="formulario__grupo" id="grupo__email">
									<label for="email" class="formulario__label">Correo Electronico</label>
									<div class="formulario__grupo-input">
										<input type="text" class="formulario__input" name="email" required id="email" placeholder="Ingrese su correo electronico">
										<i class="formulario__validacion-estado fas fa-times-circle"></i>
									</div>
									<p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
								</div>


								<!-- Group Type User -->

								<div class="formulario__grupo select">
									<label for="tipousuario" class="formulario__label label">Tipo de Usuario</label>
									<div class="formulario__grupo__input">
										<select name="id_type_user" class="formulario__input">
											<option value="">Seleccione Tipo de Usuario</option>

											<?php
											do {
											?>

												<option value="<?php echo ($type_user['id_type_user']) ?>"><?php echo ($type_user['type_user']) ?></option>


											<?php
											} while ($type_user = $control->fetch(PDO::FETCH_ASSOC));
											?>
										</select>
									</div>
								</div>

								<!-- Group Type Gender -->

								<div class="fomulario__grupo container_gender">
									<label for="" class="formulario__label label">
										<option value="">Selecccion Tipo de Genero</option>
									</label>
									<div class="formulario__grupo__input formulario__input">
										<?php
										do {

										?>
											<input class="gender" name="id_gender" type="radio" value="<?php echo ($gender['id_gender']) ?>"> <?php echo ($gender['gender']) ?></input>
										<?php

										} while ($gender = $select_gender->fetch(PDO::FETCH_ASSOC));
										?>
									</div>
								</div>


								<!-- Group: State_user -->
								<div class="state">
									<input class="cajas" type="hidden" value="2" name="id_state" placeholder="Ingrese su estado">
								</div>

								<div class="formulario__grupo formulario__grupo-btn-enviar">
									<input type="submit" name="validar" value="Crear Usuario" class="formulario__btn"></input>
									<input type="hidden" name="MM_insert" value="formreg">
									<a href="login.php" data-dismiss="modal" class="return">Regresar</a>
									<!-- <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p> -->
								</div>
						</div>
						</form>
					</div>
				</div>


			</div>
		</div>

		<!------main-content-end----------->

		<!----footer-design------------->

		<footer class="footer">
			<div class="container-fluid">
				<div class="footer-in">
					<p class="mb-0"> Derechos reservados &copy Sifer-App 2023</p>
				</div>
			</div>
		</footer>

</div>

</div>
<!-------complete html----------->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".xp-menubar").on('click', function() {
			$("#sidebar").toggleClass('active');
			$("#content").toggleClass('active');
		});

		$('.xp-menubar,.body-overlay').on('click', function() {
			$("#sidebar,.body-overlay").toggleClass('show-nav');
		});

	});
</script>

</body>

</html>