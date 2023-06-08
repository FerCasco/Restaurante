<div>
    <div class="fixed inset-0 overflow-hidden brightness-75 -z-10">
        <img class="object-cover object-center w-full h-full blur-sm" src="https://287524.fs1.hubspotusercontent-na1.net/hubfs/287524/Imported_Blog_Media/estaciones-de-trabajo-cocina-profesional-2-Dec-17-2022-07-23-41-8269-PM.jpg" alt="Imagen">
    </div>
    <!--Ingredientes-->
    <div id="left-side-bar"
         class=" transition-transform translate-x-0 fixed top-0 left-0 bottom-0 w-64 bg-white border-r border-gray-200 pt-7 pb-10 lg:block lg:bottom-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-6 flex flex-nowrap flex-row">
            <a class="inline text-xl font-semibold dark:text-white" href="javascript:;">Buscar
                Ingredientes</a>
        </div>
        <nav class="p-6 w-full flex flex-col flex-wrap">
            <ul class="space-y-1.5">
                <li>
                    <input
                        class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm w-full text-slate-700 rounded-md hover:bg-gray-100 dark:bg-gray-900 dark:text-white "
                        type="text" wire:model="miIngrediente"
                        placeholder=" Buscar ingredientes">
                </li>
                <li>
                    @foreach($this->mercancias as $mercancia)
                        <button wire:click="$emit('cargarProductos',{{$mercancia->id}})"
                                class="relative w-full h-10 border border-gray-200 flex my-4 items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300">
                            <span class="ml-2 flex-grow text-center text-slate-800">{{$mercancia->nombre}}</span>
                            <span
                                class="min-w-min px-2 py-1 bg-red-300 text-white rounded-full">{{$mercancia->cantidadActual}}</span>
                        </button>
                    @endforeach
                </li>
            </ul>
        </nav>

    </div>
    <div class="w-10 h-10 m-6">

    </div>
    <!--Productos-->
    <main class="flex-1 justify-center w-full">
        <div class="flex flex-col flex-wrap justify-center items-center pt-24">
            <input type="text" wire:model="miProducto"
                   class="py-2 px-3 block w-1/6 h-12 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                   placeholder="Buscar Productos">
            @foreach($this->productos as $producto)
                <button id="open-right-side-bar-button-{{$producto['id']}}"
                        wire:click="$emit('cargarEmplatado',{{$producto['id']}})"
                        class="flex items-center border border-gray-200 py-2 my-4 hover:color-gray-400 bg-white px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300"
                        data-hs-overlay="#hs-overlay-body-scrolling">
                    <a id="open-right-side-bar-a-{{$producto['id']}}" href="#"
                       class="w-60 ">{{$producto['nombre']}}</a>
                </button>
            @endforeach
        </div>
    </main>
    <!--Emplatado-->
    @if($verEmplatado==true)
        <div id="right-side-bar"
             class="transition-transform translate-x-0 fixed top-0 right-0 bottom-0 w-96 bg-white border-r border-gray-200 pt-7 pb-10 lg:block lg:bottom-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-6 flex flex-nowrap flex-row justify-between">
                <a class="inline text-xl font-semibold dark:text-white">Elaboraciones</a>
                <button wire:click="cerrarEmplatado()" type="button"
                        class="h-8 w-8 mr-8 text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <nav class="p-6 w-full flex flex-col flex-wrap">
                <h2>{{$productoSeleccionado->nombre}}</h2>

                <div id="menuEmplatado"
                     class="w-auto border border-gray-200 flex my-4 items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300">

                    <img src="data:image/png;base64,{{ base64_encode($productoSeleccionado->imagen) }}"
                         alt="Imagen de {{$productoSeleccionado->nombre}}">
                </div>
                <div class="p-6">
                    <ul class="list-disc">
                        @foreach ($recetaProductoSeleccionado as $elemento)
                            <li>{{$elemento}}</li>
                        @endforeach
                    </ul>
                </div>

            </nav>
        </div>
    @endif
    <script>
    </script>
</div>

