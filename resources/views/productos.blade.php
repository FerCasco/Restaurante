<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>

    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>
    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <button>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700" id="bebidas">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3">Bebidas</span>
                        </a>
                    </button>

                </li>
                <li>
                    <button>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700" id="entrantes">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Entrantes</span>
                        </a>
                    </button>
                </li>
                <li>
                    <button id="primeros">
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path>
                                <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Primeros</span>
                            <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                        </a>
                    </button>
                </li>
                <li>
                    <button id="segundos">
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Segundos</span>
                        </a>
                </li>
                <li>
                    <button id="postres">
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Postres</span>
                        </a>
                    </button>
                </li>
               
            </ul>
        </div>
    </aside>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 h-full" id="contenido">
            Contenido de prueba
        </div>
    </div>
    <script>
        const bebidas = document.getElementById('bebidas');
        const barra = document.getElementById('entrantes');
        const comedor1 = document.getElementById('primeros');
        const comedor2 = document.getElementById('segundos');
        const inventario = document.getElementById('postres');
        const contenido = document.getElementById('contenido');

        bebidas.addEventListener('click', function() {
            contenido.innerHTML = '<div class="grid grid-cols-6 gap-4 space-x-2"><h1 class="col-span-6 text-center font-bold text-4xl"> Bebidas</h1><button class="border-4 border-black w-20 h-20 mt-4 ml-2">Cruzcampo</button><button class="border-4 border-black w-20 h-20 mt-4">Águila</button><button class="border-4 border-black w-20 h-20 mt-4">Alhambra</button><button class="border-4 border-black w-20 h-20 mt-4">San Miguel</button><button class="border-4 border-black w-20 h-20 mt-4">Nestea</button><button class="border-4 border-black w-20 h-20 mt-4">Fanta</button><button class="border-4 border-black w-20 h-20 mt-4">CocaCola</button><button class="border-4 border-black w-20 h-20 mt-4">Trina</button></div>';
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
</body>


</html>