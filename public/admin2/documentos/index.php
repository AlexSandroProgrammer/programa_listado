<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include '../conexion.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>LISTADO MAESTRO AREAS</title>

    <script src="../../../assets/js/jquery-3.2.1.min.js"></script>
    <style rel="stylesheet" href="../../../assets/css/bootstrap.min.css"></style>
</head>

<body>

    <?php include '../include/menu.php'; ?>
    <div class="container">
        <br>
        <br>
        <br>
        <form action="enviar_documento.php" id="formulario" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="help-block text-center">Ingresar Documentos</h3>
                    <hr>
                </div>

            </div>

            <div class="row">

                <div class="col-md-3">
                    <span class="help-block">Areas</span>
                    <select class="form-control" id="id_area" onchange="validar_id_area()" name="id_area">
                        <option value="Selecciona">Selecciona</option>
                        <?php

                        $consulta = "SELECT * FROM `area` order by Nombre_Area";
                        $resource = mysqli_query($conexion, $consulta);
                        while ($fila = mysqli_fetch_row($resource)) {
                        ?>


                            <option value="<?php echo $fila[0] ?>"><?php echo "$fila[1]" ?></option>

                        <?php

                        }

                        ?>
                    </select>
                </div>





                <div class="col-md-3">
                    <span class="help-block">Procesos</span>
                    <select class="form-control" id="id_proceso" onchange="validar_id_proceso()" name="id_proceso">
                        <option value="Selecciona">Selecciona</option>
                        <?php

                        $consulta = "SELECT * FROM `proceso` order by Nombre_Proceso ";
                        $resource = mysqli_query($conexion, $consulta);
                        while ($fila = mysqli_fetch_row($resource)) {
                        ?>


                            <option value="<?php echo $fila[0] ?>"><?php echo "$fila[1]" ?></option>

                        <?php

                        }

                        ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <span class="help-block">Procedimiento</span>
                    <select class="form-control" id="id_procedimiento" onchange="validar_id_procedimiento()" name="id_procedimiento">
                        <option value="Selecciona">Selecciona</option>
                        <?php

                        $consulta = "SELECT * FROM `procedimiento` order by Nombre_Procedimiento";
                        $resource = mysqli_query($conexion, $consulta);
                        while ($fila = mysqli_fetch_row($resource)) {
                        ?>


                            <option value="<?php echo $fila[0] ?>"><?php echo "$fila[1]" ?></option>

                        <?php

                        }

                        ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <span class="help-block">Nombre del Documento</span>
                    <input type="text" class="form-control" id="nombre_documento" name="nombre_documento">
                </div>


            </div>

            <div class="row">
                <br>

                <div class="col-md-3">
                    <span class="help-block">Tipo de Documento</span>
                    <select class="form-control" id="Id_tipo_doc" onchange="validar_Id_tipo_doc()" name="Id_tipo_doc">
                        <option value="Selecciona">Selecciona</option>
                        <option value="Formato">Formato</option>
                        <option value="Instructivo">Instructivo</option>
                        <option value="Manual">Manual</option>

                    </select>
                </div>
                <div class="col-md-3">
                    <span class="help-block">Codigo del Documento</span>
                    <input type="text" class="form-control" id="Codigo_documento" name="Codigo_documento">
                </div>

                <div class="col-md-1">
                    <span class="help-block">version</span>
                    <input type="number" class="form-control" id="version" onchange="validar_version()" name="version">
                </div>

                <div class="col-md-2">
                    <span class="help-block">fecha de Elaboracion</span>
                    <input type="date" class="form-control" id="Fecha_doc" name="Fecha_doc">
                </div>

                <input type="hidden" value="" id="xsdc" name="xsdc">

                <div class="col-md-3">
                    <span class="help-block">Responsable de Diligenciamiento</span>
                    <select class="form-control" id="Id_Responsable" name="Id_Responsable" onchange="validar_Id_Responsable()">
                        <option value="Selecciona">Selecciona</option>
                        <?php

                        $consulta = "SELECT * FROM `responsable` order by Nombre_Responsable";
                        $resource = mysqli_query($conexion, $consulta);
                        while ($fila = mysqli_fetch_row($resource)) {
                        ?>


                            <option value="<?php echo $fila[0] ?>"><?php echo "$fila[1]" ?></option>

                        <?php

                        }

                        ?>
                    </select>
                </div>



                <div class="col-md-3">
                    <span class="help-block">Anexar Documento</span>
                    <input type="file" class="form-control" id="documento" name="documento">
                </div>
            </div>

            <div class="row">
                <br>
                <div class="col-md-12 text-center">
                    <input type="button" value="Subir Documento" onclick="enviar_documento()" id="btnre" name="">
                    <input type="button" value="actualizar Documento" onclick="actualizar()" id="btnac" name="">
                </div>
            </div>
        </form>
        <br>
        <div class="row text-center">
            <div class="col-md-4 ">
            </div>
            <div class="col-md-3 ">
                Filtre los Documentos
                <input type="text" class="form-control" onkeyup="argumentos_registrados()" id="criterio">
                <br>
            </div>
        </div>
        <div id="contenedor_argumentos_registrados" style="height: 500px; overflow: auto;">

        </div>
        <div id="contenedor">

        </div>
    </div>

</body>

<script>
    function actualizar() {

        if (validar_id_area() == true && validar_id_proceso() == true && validar_id_procedimiento() == true &&
            validar_nombre_documento() == true && validar_Id_tipo_doc() == true && validar_Codigo_documento() == true &&
            validar_version() == true && validar_Fecha_doc() == true && validar_Id_Responsable() == true) {



            var documento = document.getElementById('documento').value;

            if (documento == '') {
                var formulario = document.getElementById('formulario').action = 'enviar_documento1.php';
                var formulario = document.getElementById('formulario').submit();

            } else {
                var documento = document.getElementById('documento').files[0].name;

                $("#contenedor").load("validar_documentos1.php", {
                    documento: documento
                })
            }




        } else {



            alert("LLene Todos los campos")
        }


    }

    var btnre = document.getElementById("btnre").style.display = "block";
    var btnac = document.getElementById("btnac").style.display = "none";

    function actualizar_registro(id_registro) {
        this.id_registro_actualizar = id_registro;
        var btnre = document.getElementById("btnre").style.display = "none";
        var btnac = document.getElementById("btnac").style.display = "block";
        $("#contenedor").load("actualizar_registro.php", {
            id_registro_actualizar: id_registro_actualizar
        });

    }

    function Eliminar_registro(id_registro, nombre_mag) {
        var id_registro = id_registro;
        var nombre_mag = nombre_mag;


        $("#contenedor").load("Eliminar_registro.php", {
            id_registro: id_registro,
            nombre_mag: nombre_mag
        });


    }

    argumentos_registrados();

    function argumentos_registrados() {
        var criterio = document.getElementById("criterio").value;

        $("#contenedor_argumentos_registrados").load("cargar_argumentos.php", {
            criterio: criterio
        });
    }


    $("#nombre_documento").keyup(validar_nombre_documento);
    $("#Codigo_documento").keyup(validar_Codigo_documento);
    $("#Fecha_doc").keyup(validar_Fecha_doc);
    $("#documento").keyup(validar_documento);
    $("#version").keyup(validar_version);

    function enviar_documento() {

        if (validar_id_area() == true && validar_id_proceso() == true && validar_id_procedimiento() == true &&
            validar_nombre_documento() == true && validar_Id_tipo_doc() == true && validar_Codigo_documento() == true &&
            validar_version() == true && validar_Fecha_doc() == true && validar_Id_Responsable() == true &&
            validar_documento() == true) {


            var documento = document.getElementById('documento').files[0].name;

            $("#contenedor").load("validar_documentos.php", {
                documento: documento
            })



        } else {



            alert("LLene Todos los campos")
        }

    }


    function validar_documento() {
        var documento = document.getElementById('documento').value;
        if (documento.length == 0) {
            var documento = document.getElementById('documento').style.border = "1px solid red";
            return false
        } else {
            var documento = document.getElementById('documento').style.border = "1px solid green";


            return true
        }

    }


    function validar_Fecha_doc() {
        var Fecha_doc = document.getElementById('Fecha_doc').value;
        Fecha_doc = new Date(Fecha_doc);
        if (Fecha_doc == "Invalid Date") {

            var Fecha_doc = document.getElementById('Fecha_doc').style.border = "1px solid red";
            return false;
        } else {
            var Fecha_doc = document.getElementById('Fecha_doc').style.border = "1px solid green";
            return true;


        }

    }




    function validar_Id_Responsable() {

        var Id_Responsable = document.getElementById('Id_Responsable').value;

        if (Id_Responsable == "Selecciona") {
            var Id_Responsable = document.getElementById('Id_Responsable').style.border = "1px solid red";

            return false;



        } else {


            var Id_Responsable = document.getElementById('Id_Responsable').style.border = "1px solid green";
            return true;

        }



    }

    function validar_Id_tipo_doc() {

        var Id_tipo_doc = document.getElementById('Id_tipo_doc').value;

        if (Id_tipo_doc == "Selecciona") {
            var Id_tipo_doc = document.getElementById('Id_tipo_doc').style.border = "1px solid red";

            return false;



        } else {


            var Id_tipo_doc = document.getElementById('Id_tipo_doc').style.border = "1px solid green";
            return true;

        }
    }



    function validar_version() {
        var version = document.getElementById('version').value;

        if (version == null || version.length == 0 || version.length >= 500 || /[¿!"#$%&/=?¡'{}_+´´*;:.,']/.test(version)) {

            var version = document.getElementById('version').style.border = "1px solid red";

            return false;

        } else {
            var version = document.getElementById('version').style.border = "1px solid green";

            return true;



        }
    }

    function validar_Codigo_documento() {
        var Codigo_documento = document.getElementById('Codigo_documento').value;

        if (Codigo_documento == null || Codigo_documento.length == 0 || Codigo_documento.length >= 500) {

            var Codigo_documento = document.getElementById('Codigo_documento').style.border = "1px solid red";

            return false;

        } else {
            var Codigo_documento = document.getElementById('Codigo_documento').style.border = "1px solid green";

            return true;



        }
    }


    function validar_nombre_documento() {
        var nombre_documento = document.getElementById('nombre_documento').value;

        if (nombre_documento == null || nombre_documento.length == 0 || nombre_documento.length >= 500) {

            var nombre_documento = document.getElementById('nombre_documento').style.border = "1px solid red";

            return false;

        } else {
            var nombre_documento = document.getElementById('nombre_documento').style.border = "1px solid green";

            return true;
        }
    }




    function validar_id_area() {

        var id_area = document.getElementById('id_area').value;

        if (id_area == "Selecciona") {
            var id_area = document.getElementById('id_area').style.border = "1px solid red";

            return false;



        } else {
            var id_area = document.getElementById('id_area').style.border = "1px solid green";

            return true;

        }

    }


    function validar_id_procedimiento() {
        var id_procedimiento = document.getElementById('id_procedimiento').value;

        if (id_procedimiento == "Selecciona") {
            var id_procedimiento = document.getElementById('id_procedimiento').style.border = "1px solid red";

            return false;



        } else {


            var id_procedimiento = document.getElementById('id_procedimiento').style.border = "1px solid green";
            return true;

        }

    }

    function validar_id_proceso() {
        var id_proceso = document.getElementById('id_proceso').value;

        if (id_proceso == "Selecciona") {
            var id_proceso = document.getElementById('id_proceso').style.border = "1px solid red";

            return false;



        } else {


            var id_proceso = document.getElementById('id_proceso').style.border = "1px solid green";
            return true;

        }

    }
</script>


</html>