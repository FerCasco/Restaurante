<html>

<head>
    <?php
    $nombre = "fernando" ?>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>
    <div class="w-full text-center border-2 p-2">
        Última venta: (cod), importe: XX
    </div>
    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 mt-12" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul>
                @foreach ($salas as $sala)
                <li>
                    <button>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700" id="{{ $sala->nombre }}">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3">{{ $sala->nombre }}</span>
                        </a>
                    </button>
                </li>
                @endforeach
            </ul>
        </div>
    </aside>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 h-full" id="contenido">

        </div>
    </div>
    <script>
        document.getElementById('Terraza').addEventListener('click', function(event) {
            fetch('principal/terraza').then(res => res.text()).then(html => {
                document.getElementById('contenido').innerHTML = html
            })
        })

        document.getElementById('Comedor').addEventListener('click', function(event) {
            fetch('principal/comedor').then(res => res.text()).then(html => {
                document.getElementById('contenido').innerHTML = html
            })
        })

        document.getElementById('Barra').addEventListener('click', function(event) {
            fetch('principal/barra').then(res => res.text()).then(html => {
                document.getElementById('contenido').innerHTML = html
            })
        })
    </script>
    <!--
    <script>
        const terraza = document.getElementById('terraza');
        const barra = document.getElementById('barra');
        const comedor1 = document.getElementById('comedor1');
        const comedor2 = document.getElementById('comedor2');
        const inventario = document.getElementById('inventario');
        const graficos = document.getElementById('graficos');
        const contenido = document.getElementById('contenido');

        terraza.addEventListener('click', function() {
            contenido.innerHTML = '<div class="grid grid-cols-6 gap-4 space-x-2"><h1 class="col-span-6 text-center font-bold text-4xl"> Terraza </h1> <button class="border-4 border-black w-20 h-20 mt-4 ml-2"> T1</button><button class="border-4 border-black w-20 h-20 mt-4">T1</button><button class="border-4 border-black w-20 h-20 mt-4"> T1</button><button class="border-4 border-black w-20 h-20 mt-4">T1</button><button class="border-4 border-black w-20 h-20 mt-4">T1</button><button class="border-4 border-black w-20 h-20 mt-4">T1</button><button class="border-4 border-black w-20 h-20 mt-4"> T1</button><button class="border-4 border-black w-20 h-20 mt-4"> T1</button></div>';
         });

        barra.addEventListener('click', function() {
            contenido.innerHTML = '<div class="grid grid-cols-6 gap-4 space-x-2"><h1 class="col-span-6 text-center font-bold text-4xl"> Barra</h1> <button class="border-4 border-black w-20 h-20 mt-4 ml-2"> B1</button><button class="border-4 border-black w-20 h-20 mt-4">B1</button><button class="border-4 border-black w-20 h-20 mt-4"> B1</button><button class="border-4 border-black w-20 h-20 mt-4">B1</button><button class="border-4 border-black w-20 h-20 mt-4">B1</button><button class="border-4 border-black w-20 h-20 mt-4">B1</button><button class="border-4 border-black w-20 h-20 mt-4"> B1</button><button class="border-4 border-black w-20 h-20 mt-4"> B1</button></div>';
        });
        comedor1.addEventListener('click', function() {
            contenido.innerHTML = '<div class="grid grid-cols-6 gap-4 space-x-2"><h1 class="col-span-6 text-center font-bold text-4xl"> Barra</h1> <button class="border-4 border-black w-20 h-20 mt-4 ml-2"> B1</button><button class="border-4 border-black w-20 h-20 mt-4">B1</button><button class="border-4 border-black w-20 h-20 mt-4"> B1</button><button class="border-4 border-black w-20 h-20 mt-4">B1</button><button class="border-4 border-black w-20 h-20 mt-4">B1</button><button class="border-4 border-black w-20 h-20 mt-4">B1</button><button class="border-4 border-black w-20 h-20 mt-4"> B1</button><button class="border-4 border-black w-20 h-20 mt-4"> B1</button></div>';
         });
        comedor2.addEventListener('click', function() {
            contenido.innerHTML = '<div class="grid grid-cols-6 gap-4 space-x-2"><h1 class="col-span-6 text-center font-bold text-4xl"> Barra</h1> <button class="border-4 border-black w-20 h-20 mt-4 ml-2"> B1</button><button class="border-4 border-black w-20 h-20 mt-4">B1</button><button class="border-4 border-black w-20 h-20 mt-4"> B1</button><button class="border-4 border-black w-20 h-20 mt-4">B1</button><button class="border-4 border-black w-20 h-20 mt-4">B1</button><button class="border-4 border-black w-20 h-20 mt-4">B1</button><button class="border-4 border-black w-20 h-20 mt-4"> B1</button><button class="border-4 border-black w-20 h-20 mt-4"> B1</button></div>';
        });
        inventario.addEventListener('click', function() {
            contenido.innerHTML = 'inventario';
        });
        graficos.addEventListener('click', function() {
            contenido.innerHTML = 'Contenido del botón 2';
        });
    </script>
    -->
</body>

</html>