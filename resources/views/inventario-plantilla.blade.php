<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<body class="bg-gray-300 dark:bg-gray-700 text-white">

<div class="fixed inset-0 overflow-hidden brightness-50 -z-10">
    <img class="object-cover object-center w-full h-full blur-sm"
         src="https://img.freepik.com/foto-gratis/donaciones-alimentos-recolectadas-caridad_23-2149230572.jpg?w=1060&t=st=1686165366~exp=1686165966~hmac=f2b49d1f4cfceaafd3e2b01b4b94816a742406e75212c354b82447efae1397a6"
         alt="Imagen">
</div>
<div class="h-screen overflow-y-auto">

    @livewire('inventario')
</div>

@livewireScripts
<script src="/highcharts/codigoJS.js">

</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventario</title>
    <script src="{{ asset('node_modules/toastr/toastr.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('node_modules/toastr/toastr.css') }}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

</html>
