<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contactos</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-gray-300 dark:bg-gray-700 h-screen w-full">

<div class="fixed inset-0 overflow-hidden brightness-50 -z-10">
    <img class="object-cover object-center w-full h-full blur-sm"
         src="https://www.adslzone.net/app/uploads-adslzone.net/2021/03/como-usar-teamviewer-control-remoto.jpg" alt="Imagen">
</div>
@livewire('login')

@livewireScripts

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="/highcharts/codigoJS.js"></script>
</body>

</html>
