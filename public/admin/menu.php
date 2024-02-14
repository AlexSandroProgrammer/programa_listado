<div id="sidebar">
    <div class="sidebar-header">
        <h3><img src="../../assets/images/logoSenaEmpresa.png" class="img-fluid" /><span>Administrador
            </span></h3>
        <h3><span></span></h3>
    </div>
    <ul class="list-unstyled component">
        <li class="active">
            <a href="index.php" class="dashboard"><i class="material-icons">dashboard</i>Menu Principal </a>
        </li>
        <li class="dropdown">
            <a href="#homeSubmen15" data-toggle="collapse" class="dropdown-toggle">
                <i class="material-icons">dashboard</i>Areas
            </a>
            <ul class="collapse list-unstyled menu" id="homeSubmen15">
                <li><a href="act_trabajador.php">Lista de Areas</a></li>
                <li><a href="act_cliente.php">Crear Area</a></li>

            </ul>
        </li>
        <li class="dropdown">
            <a href="#homeSubmen20" data-toggle="collapse" class="dropdown-toggle">
                <i class="material-icons">dashboard</i>Documentos
            </a>
            <ul class="collapse list-unstyled menu" id="homeSubmen20">
                <li><a href="./contrasena.php">Lista de Documentos</a></li>
                <li><a href="./contrasena.php">Crear Documento</a></li>

            </ul>
        </li>

        <li class="dropdown">
            <a href="#homeSubmen11" data-toggle="collapse" class="dropdown-toggle">
                <i class="material-icons">dashboard</i>Procedimientos
            </a>
            <ul class="collapse list-unstyled menu" id="homeSubmen11">
                <li><a href="./contrasena.php">Lista de Procedimientos</a></li>
                <li><a href="./contrasena.php">Crear Procedimiento</a></li>

            </ul>
        </li>
        <li class="dropdown">
            <a href="#homeSubmenu25" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">apps</i>Procesos
            </a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu25">
                <li><a href="historial_documentos.php">Lista de Procesos</a></li>
                <li><a href="historial_documentos.php">Crear Proceso</a></li>

            </ul>
        </li>

        <li class="dropdown">
            <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">apps</i>Responsables
            </a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu2">
                <li><a href="crear_usu.php">Crear Rresponsable</a></li>
                <li><a href="lista_usu.php">Lista de Responsables</a></li>
            </ul>
        </li>

    </ul>
</div>


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
                            </div>
                        </form>
                    </div>
                </div>


                <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                    <div class="xp-profilebar text-right">
                        <nav class="navbar p-0">
                            <ul class="nav navbar-nav flex-row ml-auto">


                                <!-- NOTIFICACIONES AL USUARIO SOBRE LA ACTUALIZACION DE DOCUMENTOS -->
                                <li class="dropdown nav-item active">
                                    <a class="nav-link" href="#" data-toggle="dropdown">
                                        <span class="material-icons">
                                            <span class="material-symbols-sharp">
                                                two_wheeler
                                            </span>
                                        </span>
                                        </span> <span class="notification">4</span>
                                    </a>

                                </li>


                                <li class="dropdown nav-item active">
                                    <a class="nav-link" href="#" data-toggle="dropdown">
                                        <span class="material-icons">
                                            <span class="material-symbols-sharp">
                                                receipt_long
                                            </span>
                                        </span>
                                        </span> <span class="notification">4</span>
                                    </a>



                                </li>

                                <li class="dropdown nav-item active">
                                    <a class="nav-link" href="#" data-toggle="dropdown">
                                        <span class="material-icons">add_business</span>
                                    </a>

                                </li>

                                <li class="dropdown nav-item">
                                    <a class="nav-link" href="#" data-toggle="dropdown">
                                        <img src="../../controller/image/favicon.png"
                                            style="width:40px; border-radius:50%;" />
                                        <span class="xp-user-live"></span>
                                    </a>
                                    <ul class="dropdown-menu small-menu">
                                        <li>
                                            <form method="POST" action="">
                                                <tr><br>
                                                    <td colspan="2" align="center">
                                                        <input type="submit" value="Cerrar sesion" id="btn_quote"
                                                            name="btncerrar" class="btn__out" />
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