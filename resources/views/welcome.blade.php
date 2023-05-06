<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Restaurante</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
    <body class="bg-gray-300 dark:bg-gray-700 h-screen w-full">

    @livewire('main')

    @livewireScripts
    <script src="/highcharts/codigoJS.js"></script>
    </body>
</html>
