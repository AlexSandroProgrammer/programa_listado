<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sistema de informacion para la asistencia de tecnoparque">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta name="author" content="Alexis Espinosa Vidal">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Maestro Docuementos</title>
    <link rel="shortcut icon" href="assets/img/SIE.png">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body>
    <div id="pagina_completa">
        <div class="bg-white-primary" id="Innovacion">
            <div class="container">
                <div class="row">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>


                    <h1 style="text-align: center;">Listado Maestro Documentos</h1>
                    <br>
                    <br>
                    <br>
                    <br>
                    <h4 style="text-align: center;">Iniciar Sesión </h4>

                    <form role="form" action="assets/conexion/sesion.php" method="post" id="formulario_login"
                        autocomplete="off">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group ">
                                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                                    <label class="form-control-label" for="usuario"><i class="fa fa-user"></i>
                                        Usuario</label>
                                    <input class="form-control" type="text" name="usuario" id="usuario">
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                                    <label class="form-control-label  " for="contrasena"> <i class="fa fa-key"></i>
                                        Contraseña</label>
                                    <input class="form-control" type="password" name="contrasena" id="contrasena">
                                </div>
                            </div>


                            <div class="col-xs-12" id="contenedor_login" style="text-align: center;"></div>
                            <div class="box col-xs-12 " style=" margin-top: 10px">



                                <button class="btn btn-primary" value="Acceder" type="button" onclick="acceder()"
                                    style="text-align: center; margin: auto; display: block;">
                                    <i class="icon fa fa-sign-in">
                                    </i>
                                    <span>
                                        Iniciar Sesion
                                    </span>
                                </button>
                                <a class="d-flex justify-content-center m-auto" href="./listado_maestro.php">
                                    <i class="icon fa fa-sign-in">
                                    </i>
                                    <span class="text-center">
                                        Descargar formatos
                                    </span>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <script>
    function acceder() {
        var usuario = document.getElementById("usuario").value;
        var contrasena = document.getElementById("contrasena").value;

        $("#contenedor_login").load("assets/conexion/login.php", {
            usuario: usuario,
            contrasena: contrasena
        })
    }
    </script>


</body>

</html>