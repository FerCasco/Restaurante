<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="shortcut icon" href="#">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!--Prueba maria-->
        <link rel="stylesheet" href="/css/styles.css">
    </head>

    <body>
        <header>
            <h2 class="text-center text-light">Tutorial</h2>
            <h2>Cómo usar <span class="badge badge-success">Highcharts Js</span></h2>
        </header>

        <div class="text-center">
            <div class="btn-group" role="group"aria-label="">
                <button id="btnColumnas" type="button" class="btn btn-secondary">Columnas</button>
                <button id="btnLineas" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-1">Líneas</button>
                <button id="btnArea" type="button" class="btn btn-info">Área</button>
                <button id="btnTorta" type="button" class="btn btn-dark">Torta</button>
                <button id="btnPrueba" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-1">Gráfico de prueba</button>
            </div>
        </div>

        <!--En este container se muestran los gráficos-->
        <div id="contenedor" style="min-width: 320px; height: 400px; margin: 0 auto"></div>

        <!--Modal para gráficos-->
        <div class="modal" tabindex="-1" id="modal-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--En este container se muestran los gráficos-->
                        <div id="contenedor-modal" style="min-width: 320px; height: 400px; margin: 0px auto"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="/highcharts/JQuery/jquery-3.6.4.min.js"></script>

        <script src="/highcharts/pluggins/Highcharts-10.3.3/code/highcharts.js"></script>
        <script src="/highcharts/pluggins/Highcharts-10.3.3/code/modules/exporting.js"></script>
        <script src="/highcharts/pluggins/Highcharts-10.3.3/code/modules/export-data.js"></script>

        <script src="/highcharts/codigoJS.js"></script>
    </body>
</html>
