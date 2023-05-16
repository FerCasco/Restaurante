{{--<div class="flex h-screen">--}}
{{--    <!--Aside lateral de ingredientes-->--}}
{{--    <div class="z-50 h-full">--}}
{{--            <button id="ingredientes" class="inline fixed top-0 left-0 z-50 items-center justify-center bg-white w-20 h-12 rounded-full cursor-pointer">--}}
{{--                <a href="#">--}}
{{--                    <ion-icon name="menu" class="text-5xl"></ion-icon>--}}
{{--                </a>--}}
{{--            </button>--}}
{{--        <div id="menuIngredientes"--}}
{{--             class="mt-4 top-0 left-0 z-40 flex flex-col items-start justify-start w-96 h-full px-4 py-8 bg-white shadow-lg">--}}
{{--            <input class="bg-gray-300 mt-10 mb-8 mx-auto " type="text" wire:model="miIngrediente"--}}
{{--                   placeholder=" Buscar ingredientes">--}}

{{--            @foreach($this->mercancias as $mercancia)--}}
{{--                <button wire:click="$emit('cargarProductos',{{$mercancia->id}})"--}}
{{--                        class="mx-auto my-4 text-white rounded-lg bg-blue-800 shadow-md cursor-pointer">--}}
{{--                    <a href="#"--}}
{{--                       class="w-60 block px-4 text-white rounded-lg py-2 text-gray-800 hover:bg-blue-400 shadow-md cursor-pointer">{{$mercancia->nombre}}</a>--}}
{{--                </button>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!--Productos para buscar-->--}}
{{--    <div class="h-screen w-full bg-yellow-400 ">--}}
{{--        <input class="bg-gray-300 mb-8 w-2/5 block mx-auto mt-32" type="text" wire:model="miProducto"--}}
{{--               placeholder=" Buscar productos">--}}
{{--        @foreach($this->productos as $producto)--}}
{{--            <button wire:click="$emit('cargarEmplatado',{{$producto['id']}})"--}}
{{--                    class="mx-auto my-4 text-white rounded-lg flex items-center justify-center bg-orange-800 shadow-md cursor-pointer">--}}
{{--                <a href="#"--}}
{{--                   class="w-60 block px-4 text-white rounded-lg py-2 text-gray-800 hover:bg-red-400 shadow-md cursor-pointer">{{$producto['nombre']}}</a>--}}
{{--            </button>--}}
{{--        @endforeach--}}
{{--    </div>--}}

{{--    <!--Emplatado-->--}}

{{--    <div class="relative h-screen bg-red">--}}
{{--        <button id="emplatado"--}}
{{--                class="fixed top-0 right-0 z-50 flex items-center justify-center w-20 h-12 text-white bg-neutral-800 rounded-full shadow-md cursor-pointer">--}}

{{--        </button>--}}
{{--        @if($productoSeleccionado!=null)--}}
{{--            <div id="menuEmplatado"--}}
{{--                 class="mt-4 top-0 left-0 z-40 flex flex-col items-start justify-start w-96 h-full px-4 py-8 bg-white shadow-lg">--}}
{{--                <h2>{{$productoSeleccionado->nombre}}</h2>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--</div>--}}


{{--<script>--}}
{{--    const btnIngredientes = document.getElementById('ingredientes');--}}

{{--    btnIngredientes.addEventListener('click', function () {--}}
{{--        document.getElementById('menuIngredientes').classList.toggle('hidden');--}}
{{--        document.getElementById('menuIngredientes').classList.toggle('inline');--}}
{{--        //Livewire.emit('productoSeleccionadoNull');--}}
{{--    });--}}

{{--    const btnEmplatado = document.getElementById('emplatado');--}}

{{--    btnEmplatado.addEventListener('click', function () {--}}
{{--        document.getElementById('menuEmplatado').classList.toggle('hidden');--}}
{{--        document.getElementById('menuEmplatado').classList.toggle('inline');--}}
{{--        //Livewire.emit('productoSeleccionadoNull');--}}
{{--    });--}}
{{--</script>--}}

{{--<div>--}}
{{--    <!-- Navigation Toggle -->--}}
{{--    <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#docs-sidebar"--}}
{{--            aria-controls="docs-sidebar" aria-label="Toggle navigation">--}}
{{--        <span class="sr-only">Toggle Navigation</span>--}}
{{--        <svg class="w-5 h-5" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">--}}
{{--            <path fill-rule="evenodd"--}}
{{--                  d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>--}}
{{--        </svg>--}}
{{--    </button>--}}
{{--    <!-- End Navigation Toggle -->--}}

<div class="grid grid-cols-8">
    <aside id="docs-sidebar"
           class=" col-span-1 flex hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform top-0 left-0 bottom-0 bg-white border-r border-gray-200 pt-7 pb-10 overflow-y-auto scrollbar-y lg:block lg:translate-x-0 lg:right-auto lg:bottom-0 dark:scrollbar-y dark:bg-gray-800 dark:border-gray-700">
        <div class="px-6">
            <a class="flex-none text-xl font-semibold dark:text-white" href="javascript:;" aria-label="Brand">Buscar Ingredientes</a>
        </div>
        <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap">
            <ul class="space-y-1.5">
                <li>
                    <label>
                        <input type="text" wire:model="miIngrediente"
                               class="py-2 px-3 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                               placeholder="Buscar Ingredientes">
                    </label>
                </li>
                <li>
                    @foreach($this->mercancias as $mercancia)
                        <button wire:click="$emit('cargarProductos',{{$mercancia->id}})"
                                class="flex items-center border border-gray-200 py-2 my-4 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300">
                            <a href="#"
                               class="w-48">{{$mercancia->nombre}}</a>
                        </button>
                    @endforeach</li>
            </ul>
        </nav>
    </aside>
    <main class="flex-1 justify-center w-full h-screen col-span-6">
        <div class="flex flex-col flex-wrap justify-center items-center pt-24">
            <input type="text" wire:model="miProducto"
                   class="py-2 px-3 block w-1/6 h-12 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                   placeholder="Buscar Productos">
            @foreach($this->productos as $producto)
            <button wire:click="$emit('cargarEmplatado',{{$producto['id']}})"
                    class="flex items-center border border-gray-200 py-2 my-4 hover:color-gray-400 bg-white px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300">
                <a href="#"
                   class="w-60 ">{{$producto['nombre']}}</a>
            </button>
        @endforeach
        </div>
    </main>
    <aside id="docs-sidebar emplatado"
           class=" col-span-3 flex hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform top-0 left-0 bottom-0 bg-white border-r border-gray-200 pt-7 pb-10 overflow-y-auto scrollbar-y lg:block lg:translate-x-0 lg:right-auto lg:bottom-0 dark:scrollbar-y dark:bg-gray-800 dark:border-gray-700">
        <div class="px-6">
            <a class="flex-none text-xl font-semibold dark:text-white" onclick="showDrawer()" aria-label="Brand">Buscar Elaboraciones</a>
        </div>
        <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap">
            <ul class="space-y-1.5">
                <li>
                    @if($productoSeleccionado!=null)
                        <div id="menuEmplatado"
                             class="mt-4 top-0 left-0 z-40 flex flex-col items-start justify-start w-96 h-full px-4 py-8 bg-white shadow-lg">
                            <h2>{{$productoSeleccionado->nombre}}</h2>
                        </div>
                    @endif
                </li>
            </ul>
        </nav>
    </aside>
</div>

<script>
    function showDrawer(){
        const element = document.getElementById('docs-sidebar emplatado');

        element.classList.toggle('opacity-100');
        element.classList.toggle('opacity-0');
    }
</script>
