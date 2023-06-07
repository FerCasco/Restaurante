<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>

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
<div class="fixed inset-0 overflow-hidden brightness-75 -z-10">
    <img class="object-cover object-center w-full h-full blur-sm" src="https://img.freepik.com/foto-gratis/lider-equipo-enfocado-que-presenta-plan-marketing-companeros-trabajo-multirraciales-interesados-ejecutivo-jefe-orador-serio-capacitador-negocios-que-explica-estrategia-desarrollo-empleados-motivados-raza-mixta_482257-13781.jpg?w=1380&t=st=1686141411~exp=1686142011~hmac=c810bd7e5219de924a456321f97ff41c0610f8c6befe71727ab1e8c01809087e" alt="Imagen">
</div>
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
