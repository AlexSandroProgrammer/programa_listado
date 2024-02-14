<div class="container-fluid">
    <!-- Ventana emergente (Modal) para el formulario -->
    <div class="modal" id="formularioModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true" onclick="closeFormModal()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Crear Color</h1>
                    <form method="POST" action="modulo_crear.php" name="formcolor" autocomplete="off">
                        <!-- Group: Id color-->
                        <div class="form-group">
                            <label for="document" class="formulario__label">Codigo de color</label>
                            <div class="formulario__grupo-input">
                                <input type="hidden" autofocus oninput="maxlengthNumber(this);" class="formulario__input" name="documento" required value="<?php echo $documento ?>">

                                <input type="number" autofocus maxlength="5" oninput="maxlengthNumber(this);" class="formulario__input" name="id_color" id="id" required placeholder="Ingrese el codigo unico del color">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                        </div>


                        <!-- Group: Nuevo Color -->

                        <label for="document" class="formulario__label">Nuevo color</label>
                        <div class="formulario__grupo-input">
                            <input type="text" maxlength="20" oninput="soloLetrasEspacios(event)" class="formulario__input" name="nombre_color" id="categoria" required placeholder="Ingrese el codigo del modelo">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Debe ingresar solo letras y espacios, maximo 20 letras. </p>
                        <div class="mt-4">

                            <input type="submit" class="btn btn-info" name="validar" value="Crear Color"></input>
                            <input type="hidden" name="MM_color" value="formcolor">
                            <a href="lista_clientes.php" class="btn btn-danger">Cancelar Registro</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</div>


<div class="container-fluid">
    <!-- Ventana emergente (Modal) para el formulario -->
    <div class="modal" id="formularioMarca">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true" onclick="closeFormMarca()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Crear Marca</h1>
                    <form method="POST" action="modulo_crear.php" name="formreg1" autocomplete="off">
                        <div class="form-group">
                            <!-- Container: Id_Marca -->

                            <label for="document" class="formulario__label">Codigo de Marca</label>
                            <div class="formulario__grupo-input">
                                <input autofocus type="number" maxlength="5" oninput="maxlengthNumber(this);" onkeypress="" class="formulario__input" name="id_marca" id="id" required placeholder="Ingrese el codigo de marca">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Debe ingresar solo 3 numeros</p>

                        </div>

                        <div class="form-group">
                            <!-- Container: Marca -->

                            <label for="username" class="formulario__label">Nueva Marca</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="marca" required id="input" maxlength="20" oninput="soloLetrasEspacios(event)" placeholder="Ingrese nueva marca">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Debes ingresar solo letras y espacios, y maximo 20 letras.</p>

                        </div>

                        <div class="mt-4">

                            <input type="submit" class="btn btn-info" name="validar" value="Crear Marca"></input>
                            <input type="hidden" name="MM_marca" value="formreg1">
                            <a href="lista_clientes.php" class="btn btn-danger">Cancelar Registro</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>




<div class="container-fluid">
    <!-- Ventana emergente (Modal) para el formulario -->
    <div class="modal" id="formularioMarcaProducto">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true" onclick="closeFormMarcProducto()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Crear Marca Producto</h1>
                    <form method="POST" action="modulo_crear.php" name="formMarcaProducto" autocomplete="off">

                        <div class="form-group">
                            <!-- Container: Marca -->

                            <label for="username" class="formulario__label">Nueva Marca Producto</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="marca" required id="input" maxlength="20" oninput="soloLetrasEspacios(event)" placeholder="Ingrese nueva marca">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Debes ingresar solo letras y espacios, y maximo 20 letras.</p>

                        </div>

                        <div class="mt-4">

                            <input type="submit" class="btn btn-info" name="validar" value="Crear Marca"></input>
                            <input type="hidden" name="MM_marcaProducto" value="formMarcaProducto">
                            <a href="lista_clientes.php" class="btn btn-danger">Cancelar Registro</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>




<div class="container-fluid">
    <!-- Ventana emergente (Modal) para el formulario -->
    <div class="modal" id="formularioModelo">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true" onclick="closeFormModelo()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Crear Modelo</h1>
                    <form method="POST" action="modulo_crear.php" name="formreg2" autocomplete="off">
                        <div class="form-group">
                            <!-- Container: Id_Modelo -->

                            <label for="document" class="formulario__label">Codigo de modelo</label>
                            <div class="formulario__grupo-input">
                                <input autofocus type="number" maxlength="5" oninput="maxlengthNumber(this);" class="formulario__input" name="id_modelo" id="id" required placeholder="Ingrese el codigo del modelo">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El codigo de modelo debe contener solo 3 numeros</p>

                        </div>

                        <div class="form-group">


                            <!-- Container: Modelo -->

                            <label for="username" class="formulario__label">Nuevo Modelo</label>
                            <div class="formulario__grupo-input">
                                <input type="tel" class="formulario__input"  id="inputYear" minlength="4" maxlength="4" max="" oninput="validarAnio(event)" name="modelo" required placeholder="Ingrese el nuevo modelo">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El nuevo modelo debe contener solo 4 numeros</p>

                        </div>

                        <div class="mt-4">
                            <input type="submit" class="btn btn-info" name="validar" value="Crear Modelo"></input>
                            <input type="hidden" name="MM_modelo" value="formreg2">
                            <a href="lista_clientes.php" class="btn btn-danger">Cancelar Registro</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>





<div class="container-fluid">
    <!-- Ventana emergente (Modal) para el formulario -->
    <div class="modal" id="formularioCombustible">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true" onclick="closeFormCombustible()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Crer Tipo Combustible</h1>
                    <form method="POST" action="modulo_crear.php" name="formCombustible" autocomplete="off">

                        <div class="form-group">
                            <!-- Container: Tipo de combustible -->
                            <label for="username" class="formulario__label">Nuevo Tipo de Combustible</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="combustible" minlength="3" required maxlength="20" oninput="soloLetrasEspacios(event)" placeholder="Ingrese nuevo tipo de combustible para moto.">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Debes ingresar solo letras y espacios, y maximo 20 letras.</p>

                        </div>

                        <div class="mt-4">
                            <input type="submit" class="btn btn-info" name="validar" value="Crear"></input>
                            <input type="hidden" name="MM_combustible" value="formCombustible">
                            <a href="lista_clientes.php" class="btn btn-danger">Cancelar Registro</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>




<div class="container-fluid">
    <!-- Ventana emergente (Modal) para el formulario -->
    <div class="modal" id="formularioCarroceria">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true" onclick="closeFormCarroceria()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Crer Tipo Carroceria</h1>
                    <form method="POST" action="modulo_crear.php" name="formCarroceria" autocomplete="off">

                        <div class="form-group">
                            <!-- Container: Tipo de Carroceria -->
                            <label for="carroceria" class="formulario__label">Nueva Carroceria</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" minlength="4" maxlength="15" oninput="soloLetrasEspacios(event)" name="carroceria" id="categoria" required placeholder="Ingrese el nuevo tipo de carroceria">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Debe ingresar solo letras y espacios y debe ser mayor a 4 letras.</p>

                        </div>

                        <div class="mt-4">
                            <input type="submit" class="btn btn-info" name="validar" value="Crear"></input>
                            <input type="hidden" name="MM_carroceria" value="formCarroceria">
                            <a href="lista_clientes.php" class="btn btn-danger">Cancelar Registro</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>



<div class="container-fluid">
    <!-- Ventana emergente (Modal) para el formulario -->
    <div class="modal" id="formularioCilindraje">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true" onclick="closeFormCilindraje()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Crer Cilindraje</h1>
                    <form method="POST" action="modulo_crear.php" name="formCilindraje" onsubmit="return validarCilindraje()" autocomplete="off">

                        <div class="form-group">

                            <!-- CONTAINER CILINDRAJE  -->
                            <label for="username" class="formulario__label">Nuevo Cilindraje</label>
                            <div class="formulario__grupo-input">
                                <input type="number" min="100" max="1000" minlength="3" oninput="maxlengthNumber(this);" class="formulario__input" maxlength="4" onchange="validarCilindraje()" name="cilindraje" required id="cilindraje" placeholder="Ingrese el nuevo cilindraje">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p id="mensajeError"></p>
                        </div>

                        <div class="mt-4">
                            <input type="submit" class="btn btn-info" name="validar" value="Crear"></input>
                            <input type="hidden" name="MM_cilindraje" value="formCilindraje">
                            <a href="lista_clientes.php" class="btn btn-danger">Cancelar Registro</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>



<div class="container-fluid">
    <!-- Ventana emergente (Modal) para el formulario -->
    <div class="modal" id="formularioServicio">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true" onclick="closeFormServicio()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Crer Servicio</h1>
                    <form method="POST" action="modulo_crear.php" name="formServicio" autocomplete="off">
                        <div class="form-group">

                            <!-- CONTAINER SERVICIO PARA MOTO  -->
                            <label for="username" class="formulario__label">Nuevo Servicio de Moto</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="servicio_moto" required id="marca" maxlength="20" oninput="soloLetrasEspacios(event)" placeholder="Ingrese nuevo servicio de moto">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Debes ingresar solo letras y espacios, y maximo 20 letras.</p>
                            <p id="mensajeError"></p>
                        </div>

                        <div class="mt-4">
                            <input type="submit" class="btn btn-info" name="validar" value="Crear"></input>
                            <input type="hidden" name="MM_servicio" value="formServicio">
                            <a href="lista_clientes.php" class="btn btn-danger">Cancelar Registro</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Agregar la referencia a jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Función para abrir el modal
    function openModal(modalId) {
        var modalOverlay = document.getElementById("modalOverlay" + modalId);
        var modalForm = document.getElementById(modalId);
        modalOverlay.style.display = "block";
        modalForm.style.display = "block";
    }

    // Función para cerrar el modal
    function closeModal(modalId) {
        var modalOverlay = document.getElementById("modalOverlay" + modalId);
        var modalForm = document.getElementById(modalId);
        modalOverlay.style.display = "none";
        modalForm.style.display = "none";
    }
</script>
<script>
    // Función para validar el cilindraje ingresado
    function validarCilindraje() {
        var cilindrajeInput = document.getElementById("cilindraje");
        var cilindrajeMinimo = 100; // Cilindraje más pequeño de una moto (valor de ejemplo)
        var cilindrajeMaximo = 1000; // Cilindraje más grande de una moto (valor de ejemplo)

        var cilindraje = parseInt(cilindrajeInput.value);


        if (cilindraje < cilindrajeMinimo || cilindraje > cilindrajeMaximo) {
            document.getElementById("mensajeError").textContent = "El cilindraje debe estar entre " + cilindrajeMinimo + " y " + cilindrajeMaximo + ".";
            cilindrajeInput.value = "";
            return false;
        } else {
            document.getElementById("mensajeError").textContent = "";
            return true;
        }
    }
</script>

<script>
    function setMaxYear() {
        const inputYear = document.getElementById('inputYear');
        const anioActual = new Date().getFullYear();
        inputYear.setAttribute('max', anioActual);
    }


    setMaxYear(); // Llamar a la función al cargar la página para establecer el año máximo inicial

    function validarAnio(event) {
        const input = event.target;
        const anioActual = new Date().getFullYear();
        const anioIngresado = parseInt(input.value);

        if (anioIngresado > anioActual) {
            input.setCustomValidity('El año no puede ser mayor al año actual');
            document.getElementById('btnRegistrar').disabled = true;
        }
    }
</script>


<script>
    function soloLetrasEspacios(event) {
        const input = event.target;
        const regex = /^[A-Za-z\s]+$/; // Expresión regular para letras y espacios

        if (!regex.test(input.value)) {
            input.value = input.value.replace(/[^A-Za-z\s]+/, ''); // Eliminar caracteres no permitidos
        }
    }
</script>




<!-- BUSCADORES EN TIEMPO REAL DEL SELECT AL CUAL FUE ASIGNADO CON EL ID UNICO -->

<script>
    $('#buscador').select2();
</script>
<!-- BUSCADORES EN TIEMPO REAL DEL SELECT AL CUAL FUE ASIGNADO CON EL ID UNICO -->

<script>
    $('#controlbuscador').select2();
</script>

<!-- BUSCADORES EN TIEMPO REAL DEL SELECT AL CUAL FUE ASIGNADO CON EL ID UNICO -->

<script>
    $('#control').select2();
</script>

<!-- BUSCADORES EN TIEMPO REAL DEL SELECT AL CUAL FUE ASIGNADO CON EL ID UNICO -->

<script>
    $('#combustible').select2();
</script>

<!-- BUSCADORES EN TIEMPO REAL DEL SELECT AL CUAL FUE ASIGNADO CON EL ID UNICO -->

<script>
    $('#carroceria').select2();
</script>

<!-- BUSCADORES EN TIEMPO REAL DEL SELECT AL CUAL FUE ASIGNADO CON EL ID UNICO -->

<script>
    $('#cilindraje').select2();
</script>

<!-- BUSCADORES EN TIEMPO REAL DEL SELECT AL CUAL FUE ASIGNADO CON EL ID UNICO -->

<script>
    $('#servicio').select2();
</script>

<script>
    function mayusculas() {
        let input = document.getElementById("placa");
        input.value = input.value.toUpperCase();
    }
</script>
<script>
    function mayusculas() {
        let input = document.getElementById("placa");
        input.value = input.value.toUpperCase();
    }
</script>

<!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO EL NUMERO VALORES REQUERIDOS DE ACUERDO A LA LONGITUD MAXLENGTH DEL CAMPO -->

<script>
    function maxlengthNumber(obj) {

        if (obj.value.length > obj.maxLength) {
            obj.value = obj.value.slice(0, obj.maxLength);
            alert("Debe ingresar solo el numeros de digitos requeridos");
        }
    }
</script>

<script>
    function maxcelNumber(obj) {

        if (obj.value.length > obj.maxLength) {
            obj.value = obj.value.slice(0, obj.maxLength);
            alert("Debe ingresar solo 10 numeros.");
        }
    }
</script>
<!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO LETRAS -->

<script>
    function multipletext(e) {
        key = e.keyCode || e.which;

        teclado = String.fromCharCode(key).toLowerCase();

        letras = "qwertyuiopasdfghjklñzxcvbnm";

        especiales = "8-37-38-46-164-46";

        teclado_especial = false;

        for (var i in especiales) {
            if (key == especiales[i]) {
                teclado_especial = true;
                alert("Debe ingresar solo letras y espacios en el campo");

                break;
            }
        }

        if (letras.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
            alert("Debe ingresar solo letras y espacios en el campo");
        }
    }
</script>



<script src="../../controller/JS/motos.js"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>


<!-- datatables JS -->
<script type="text/javascript" src="datatables/datatables.min.js"></script>
<script>
    function maxlengthNumber(obj) {

        if (obj.value.length > obj.maxLength) {
            obj.value = obj.value.slice(0, obj.maxLength);
            alert("Debe ingresar solo el numeros de digitos requeridos");
        }
    }
</script>


<script>
    function maxcelNumber(obj) {

        if (obj.value.length > obj.maxLength) {
            obj.value = obj.value.slice(0, obj.maxLength);
            alert("Debe ingresar solo 10 numeros.");
        }
    }
</script>
<!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO LETRAS -->

<script>
    function multipletext(e) {
        key = e.keyCode || e.which;

        teclado = String.fromCharCode(key).toLowerCase();

        letras = "qwertyuiopasdfghjklñzxcvbnm123456789";

        especiales = "8-37-38-46-164-46";

        teclado_especial = false;

        for (var i in especiales) {
            if (key == especiales[i]) {
                teclado_especial = true;
                alert("Debe ingresar solo letras y espacios en el campo");

                break;
            }
        }

        if (letras.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
            alert("Debe ingresar solo letras y espacios en el campo");
        }
    }
</script>