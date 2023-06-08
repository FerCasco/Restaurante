<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<body class="bg-gray-300 dark:bg-gray-700 text-white">

<div class="fixed inset-0 overflow-hidden brightness-50 -z-10">
    <img class="object-cover object-center w-full h-full blur-sm"
         src="https://www.busquetsgalvez.com/web/wp-content/uploads/2018/09/Veride-tienda-Madrid-1.jpg"
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
