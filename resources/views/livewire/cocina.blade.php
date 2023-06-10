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

        @if($verEmplatado!=true)
        <div class="hidden absolute bottom-8 right-0 -translate-x-9 translate-y-4 w-1/4 px-3 shadow-2xl overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <button wire:click="verModalPlato('ver')" type="button"
                    class="w-full flex transition-all items-center justify-center mt-3 mb-3 border border-lime-500 shadow-lg hover:bg-lime-400 bg-lime-200 px-2.5 text-sm hover:shadow-inner text-slate-700 rounded-md dark:hover:bg-lime-900 dark:text-slate-400 dark:hover:text-slate-300 py-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-plus"
                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M9 12h6"></path>
                    <path d="M12 9v6"></path>
                    <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                </svg>
                Plato nuevo
            </button>
        </div>
        @endif

        <!--Modal agregar Plato-->
        @if($modalVisibleP=="ver")
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <!-- Modal -->
                    <div tabindex="-1" class="z-50 w-full h-screen">
                        <div class="flex items-center justify-center h-full w-full">
                            <div class="relative bg-white w-96 rounded-lg shadow dark:bg-gray-700">
                                <button wire:click="verModalPlato(' ')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Cerrar modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Agregar plato</h3>
                                    <form class="space-y-6" wire:ignore>
                                        <div>
                                            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingredientes:</label>
                                            <!--<select id="mercancia" wire:model="idMercanciaEm"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @foreach($mercancias as $a)
                                                    <option value="{{$a->id}}">{{$a->nombre}}</option>
                                                @endforeach
                                            </select>-->
                                            <input type="text" placeholder="patrón cantidad e ingrediente,..." wire:model="idMercanciaEm" class="w-full" />
                                        <div>
                                        @if($listElabMerc!=null)
                                            <table class="shadow-md">
                                                <thead>
                                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                                                        <th class="py-3 px-6 text-left">Ingrediente</th>
                                                        <th class="py-3 px-6 text-left">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-gray-600">
                                                    @foreach($listElabMerc as $m)
                                                        <tr class="border-b border-gray-200" >
                                                            <td class="px-4 py-2">{{$m['mercancia']}}</td>
                                                            <td class="px-4 py-2">
                                                                <!--<button wire:click="edit({{$m['id']}})" type="button" class="bg-indigo-400 px-2 py-1 text-white text-xs rounded">Editar</button>
                                                                <button wire:click="delete({{$m['id']}})"type="button" class="bg-red-500 px-2 py-1 text-white text-xs rounded">Eliminar</button>
                                                        --></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        @endif
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


</div>

