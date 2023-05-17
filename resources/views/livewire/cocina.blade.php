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
{{--                       class="w-60 block px-4 text-white rounded-lg py-2 hover:bg-blue-400 shadow-md cursor-pointer">{{$mercancia->nombre}}</a>--}}
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
{{--                   class="w-60 block px-4 text-white rounded-lg py-2  hover:bg-red-400 shadow-md cursor-pointer">{{$producto['nombre']}}</a>--}}
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
<div>
    <div id="left-side-bar"
         class=" transition-transform fixed top-0 left-0 bottom-0 w-64 bg-white border-r border-gray-200 pt-7 pb-10 lg:block lg:bottom-0 dark:bg-gray-800 dark:border-gray-700">
        <script>
            let sideBar = document.getElementById('left-side-bar');
        </script>
        <div class="px-6 flex flex-nowrap flex-row">
            <a class="inline text-xl font-semibold dark:text-white" href="javascript:;">Buscar
                Ingredientes</a>
            <button id="close-left-side-bar-button" type="button" class="h-8 w-8 text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                <svg id="close-left-side-bar-button" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
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
                                class="w-full border border-gray-200 flex my-4 items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300">
                            <a href="#"
                               class="w-full">{{$mercancia->nombre}}</a>
                        </button>
                    @endforeach
                </li>
            </ul>
        </nav>

    </div>
    <button id="open-left-side-bar-button" type="button" class="w-10 h-10 m-6 text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
        <svg id="open-left-side-bar-button" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z"></path>
        </svg>
    </button>
    <main class="flex-1 justify-center w-full">
        <div class="flex flex-col flex-wrap justify-center items-center pt-24">
            <input type="text" wire:model="miProducto"
                   class="py-2 px-3 block w-1/6 h-12 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                   placeholder="Buscar Productos">
            @foreach($this->productos as $producto)
                <button id="open-right-side-bar-button-{{$producto['id']}}" wire:click="$emit('cargarEmplatado',{{$producto['id']}})"
                        class="flex items-center border border-gray-200 py-2 my-4 hover:color-gray-400 bg-white px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300"
                        data-hs-overlay="#hs-overlay-body-scrolling">
                    <a id="open-right-side-bar-a-{{$producto['id']}}" href="#"
                       class="w-60 ">{{$producto['nombre']}}</a>
                </button>
            @endforeach
        </div>
    </main>
    <div id="right-side-bar"
         class=" transition-transform fixed top-0 right-0 bottom-0 w-64 bg-white border-r border-gray-200 pt-7 pb-10 lg:block lg:bottom-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-6 flex flex-nowrap flex-row justify-between">
            <a class="inline text-xl font-semibold dark:text-white" href="javascript:;">Elaboraciones</a>
            <button id="close-right-side-bar-button" type="button" class="h-8 w-8 mr-8 text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <nav class="p-6 w-full flex flex-col flex-wrap">
            <ul class="space-y-1.5">
                <li>
                    @if($productoSeleccionado!=null)
                        <div id="menuEmplatado"
                             class="w-full border border-gray-200 flex my-4 items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300">
                            <h2>{{$productoSeleccionado->nombre}}</h2>
                        </div>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
    <script>
        sideBar.classList.add('-translate-x-full');
        //Bool para comprobar si estaban o no cerrados los sideBars
        let openLeft = false;
        let openRight = false;

        //Botones
        let buttonClose = document.getElementById('close-left-side-bar-button');
        let buttonOpen = document.getElementById('open-left-side-bar-button');

        let rightSideBar = document.getElementById('right-side-bar');
        rightSideBar.classList.add('translate-x-full');
        rightSideBar.classList.add('opacity-0');

        //Método de comprobación de los open
        setInterval(() => {
            if(openLeft){
                sideBar.classList.remove('-translate-x-full');
                sideBar.classList.add('translate-x-0');
            } else {
                sideBar.classList.remove('translate-x-0');
                sideBar.classList.add('-translate-x-full');
            }

            if(openRight){
                rightSideBar.classList.remove('translate-x-full');
                rightSideBar.classList.remove('opacity-0');
                rightSideBar.classList.add('translate-x-0');
            } else {
                rightSideBar.classList.remove('translate-x-0');
                rightSideBar.classList.add('translate-x-full');
            }
        }, 500)

        //Cierra el sideBar de la izquierda
        buttonClose.addEventListener('click', () => {
            openLeft = false;
        });

        //Abre el sideBar de la izquierda
        buttonOpen.addEventListener('click', () => {
            openLeft = true;
            openRight = false;
        });

        /*
        * Cierra el sideBar de la izquierda cuando se clica fuera y abre el
        * de la derecha cuando se clica en uno de esos botones
        */
        document.addEventListener('click', function(event) {
            let isARightClicked = false;
            let isButtonClicked = false;

            const target = event.target;
            const isEvenInSideBar = sideBar.contains(target);

            if(target.id.includes('button')) isButtonClicked = true;
            if(target.id.includes('open-right-side-bar-a') || target.id.includes('open-right-side-bar-button')) {
                isARightClicked = true
            }

            if(!isEvenInSideBar && !isButtonClicked && !isARightClicked){
                openLeft = false;
                openRight = false;
            }

            if(isARightClicked) {
                openRight = true;
                openLeft = false;
            }

        })
    </script>
</div>

