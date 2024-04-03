<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizador de Excel</title>
    <!-- Agrega la biblioteca de jQuery (requerida para Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Agrega la biblioteca de Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Agrega la biblioteca de Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Agrega SheetJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
</head>

<body>

    <!-- Botón para abrir el modal -->
    <button class="btn btn-primary" onclick="openModal('archivo.xlsx')">Abrir Modal</button>

    <!-- Modal -->
    <div class="modal fade" id="excelModal" tabindex="-1" role="dialog" aria-labelledby="excelModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="excelModalLabel">Visualizador de Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="excelTable" class="table table-bordered"></table>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para abrir el modal con el archivo Excel -->
    <script>
    function openModal(excelPath) {
        // Ruta del archivo Excel
        var url = 'http://localhost/programa_listado/public/admin/documentos/' + excelPath;

        // Descarga del archivo Excel
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.responseType = 'arraybuffer';

        xhr.onload = function(e) {
            if (this.status == 200) {
                var data = new Uint8Array(xhr.response);
                var workbook = XLSX.read(data, {
                    type: 'array'
                });

                // Convertir la primera hoja del archivo Excel a HTML
                var html = XLSX.utils.sheet_to_html(workbook.Sheets[workbook.SheetNames[0]]);

                // Insertar el HTML generado en el modal
                $('#excelTable').html(html);

                // Abrir el modal
                $('#excelModal').modal('show');
            }
        };

        xhr.send();
    }
    </script>

</body>

</html>