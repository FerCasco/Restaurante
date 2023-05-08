<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cocina</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-300 dark:bg-gray-700 h-screen w-full">

@livewire('menu')
@livewire('graficas')

@livewireScripts

<script src="/highcharts/JQuery/jquery-3.6.4.min.js"></script>
<script src="/highcharts/popper/popper.min.js"></script>

<script src="/highcharts/pluggins/Highcharts-10.3.3/code/highcharts.js"></script>
<script src="/highcharts/pluggins/Highcharts-10.3.3/code/modules/exporting.js"></script>
<script src="/highcharts/pluggins/Highcharts-10.3.3/code/modules/export-data.js"></script>
<script src="/highcharts/pluggins/Highcharts-10.3.3/code/modules/drilldown.js"></script>

<script src="/highcharts/codigoJS.js"></script>

</script><script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
