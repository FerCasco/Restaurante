<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Restaurante</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
</head>
    <body class="bg-gray-800 dark:bg-gray-700 h-screen w-full">
    <div class="fixed inset-0 overflow-hidden brightness-50 -z-10">
        <img class="object-cover object-center w-full h-full blur-sm" src="https://www.momobel.com/sites/default/files/mesas_para_restaurante_de_forma_cuadrada.jpg" alt="Imagen">
    </div>
    @livewire('main')

    @livewireScripts
    <script src="/highcharts/codigoJS.js">

    </script><script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
