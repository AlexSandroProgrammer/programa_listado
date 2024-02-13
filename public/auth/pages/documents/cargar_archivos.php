<div class="col-12">

    <table class="table table-bordered table-condensed" onclick="cambiar_color()" style="color: black;font-size: 8px;border: #000 .4em solid;box-shadow: 7.5px 7.5px 7.5px #999;max-width: 1000px;;
">
        <tr>
            <td colspan="12" class="text-center">
                <h3 class="help-block"> LISTADO MAESTRO DE DOCUMENTOS Y REGISTROS (SENA EMPRESA 2016)</h3>
            </td>
        </tr>


        <tr>
            <td>#</td>
            <td>DESCARGA</td>
            <td>AREA</td>
            <td>PROCESO</td>
            <td>PROCEDIMIENTO</td>
            <td>NOMBRE DEL DOCUMENTO</td>
            <td>NOMBRE DEL ARCHIVO MEDIO MAGNETICO</td>
            <td>TIPO DE DOCUMENTO</td>
            <td>CODIGO</td>
            <td>VERSION</td>
            <td>FECHA DE ELABORACION</td>
            <td>RESPONSABLE DE DILIGENCIAMIENTO Y/O USO</td>

        </tr>


        <?php

        include 'assets/conexion/conexion.php';

        $criterio = $_POST["criterio"];
        $query = "SELECT Id_Documento, area.Nombre_Area, proceso.Nombre_Proceso, procedimiento.Nombre_Procedimiento,`Nombre_Documento`, `Nombre_Documento_Magnetico`, `Tipo_Documento`, `Codigo`,`Version`,`Fecha_Elaboracion`,responsable.Nombre_Responsable FROM `documentos` 
INNER JOIN area ON documentos.Id_Area=area.Id_Area 
INNER join proceso ON documentos.Id_Proceso=proceso.Id_Proceso
INNER JOIN  procedimiento ON documentos.Id_Procedimiento=procedimiento.Id_Procedimiento 
INNER JOIN responsable ON documentos.Id_Responsable=responsable.Id_Responsable 
WHERE area.Nombre_Area LIKE '%$criterio%' OR proceso.Nombre_Proceso LIKE '%$criterio%' OR procedimiento.Nombre_Procedimiento LIKE'%$criterio%' OR documentos.Nombre_Documento_Magnetico LIKE '%$criterio%' or documentos.Tipo_Documento LIKE '%$criterio%' OR documentos.Codigo LIKE '%$criterio%' OR Nombre_Documento LIKE '%$criterio%' order by area.Nombre_Area , proceso.Nombre_Proceso , procedimiento.Nombre_Procedimiento, documentos.Nombre_Documento_Magnetico";
        $resource = mysqli_query($conexion, $query);
        $contador = 0;
        while ($fila = mysqli_fetch_row($resource)) {
            $contador++;
        ?>

        <tr>
            <td><?php echo $contador ?></td>
            <td><a href=" pages/admin/documentos/documentos/<?php echo $fila[5] ?>"
                    class="icon icon-download btn form-control">
                </a></td>
            <td><?php echo $fila[1] ?></td>
            <td><?php echo $fila[2] ?></td>
            <td><?php echo $fila[3] ?></td>
            <td><?php echo $fila[4] ?></td>
            <td><a href="pages/admin/documentos/documentos/<?php echo $fila[5] ?>"><?php echo $fila[5] ?></a></td>
            <td><?php echo $fila[6] ?></td>
            <td><?php echo $fila[7] ?></td>
            <td><?php echo $fila[8] ?></td>
            <td><?php echo $fila[9] ?></td>
            <td><?php echo $fila[10] ?></td>


        </tr>

        <?php

        }


        ?>

    </table>
</div>