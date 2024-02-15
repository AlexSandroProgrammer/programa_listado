<div class="body-overlay"></div>

<!-------sidebar--design------------>
<div id="sidebar">
    <div class="sidebar-header">
        <h3><img src="../../assets/images/logoSenaEmpresa.png" class="img-fluid" /><span>Administrador</span>
        </h3>
    </div>
    <ul class="list-unstyled component m-0">
        <li class="active">
            <a href="index.php" class="dashboard"><i class="material-icons">dashboard</i>Menu Principal </a>
        </li>
        <li class="dropdown">
            <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">aspect_ratio</i>Usuarios
            </a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                <li><a href="user/index.php">Lista de Usuarios</a></li>
                <li><a href="user/crearUsuario.php">Crear Usuario</a></li>

            </ul>
        </li>

        <li class="dropdown">
            <a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">aspect_ratio</i>Areas
            </a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu6">
                <li><a href="#">Lista de Areas</a></li>
                <li><a href="#">Crear Area</a></li>

            </ul>
        </li>


        <li class="dropdown">
            <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">apps</i>Procesos
            </a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu2">
                <li><a href="#">Lista de Procesos</a></li>
                <li><a href="#">Crear Proceso</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">equalizer</i>Procedimientos
            </a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu3">
                <li><a href="#">Lista de Procedimientos</a></li>
                <li><a href="#">Crear Procedimiento</a></li>
            </ul>
        </li>


        <li class="dropdown">
            <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">extension</i>Responsables
            </a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu4">
                <li><a href="#">Lista de Responsables</a></li>
                <li><a href="#">Crear Responsable</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">border_color</i>Documentos
            </a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu5">
                <li><a href="documents/listaDocumentos.php">Lista de Documentos</a></li>
                <li><a href="#">Crear Documento</a></li>
            </ul>
        </li>
        <li class="">
            <a href="#" class=""><i class="material-icons">border_color</i>Cambiar Contraseña </a>
        </li>
        <li class="logout">
            <a href="#" class=""><i class="material-icons">logout</i>Cerrar Sesion </a>
        </li>
    </ul>
</div>