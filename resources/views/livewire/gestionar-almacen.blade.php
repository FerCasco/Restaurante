<center>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <div class="mt-28 flex justify-center items-center">
        <h1 class="ml-96 text-center mb-4 text-l font-extrabold leading-none tracking-tight md:text-5xl lg:text-4xl dark:text-white">
            Tipo: {{$tipo->nombre}}</h1>

        <div class="ml-auto">
            <button wire:click="openModalGraph"
                    class="px-4 py-2 font-semibold -translate-x-20 transition-all border border-indigo-500 flex justify-center text-white bg-indigo-400 rounded-md hover:bg-indigo-500 hover:shadow-inner shadow-2xl focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-50">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-2 w-6 h-6">
                    <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z" />
                </svg>

                Abrir Gráfica
            </button>
        </div>

    </div>
    <div class="grid grid-cols-3 gap-4 ml-52 pl-28 text-gray-800" wire:poll.5000ms>
        @foreach($mercancias as $mercancia)
            <div wire:key="mercancia-{{$mercancia->id}}" wire:ignore x-data="{ flipped: false }"
                 class="border border-gray-300 rounded-lg py-20 relative w-52 h-10 mx-auto mt-8 mb-8 cursor-pointer text-center font-bold tracking-light text-lg shadow-lg">
                <div x-show="!flipped" x-transition:enter="transition duration-300 transform ease-in-out"
                     x-transition:enter-start="opacity-0 rotate-y-180" x-transition:enter-end="opacity-100 rotate-y-0"
                     x-transition:leave="transition duration-300 transform ease-in-out"
                     x-transition:leave-start="opacity-100 rotate-y-0" x-transition:leave-end="opacity-0 rotate-y-180"
                     class="absolute text-center py-16 bg-gray-100 overflow-hidden inset-0 rounded-lg shadow-lg"
                     @click="flipped = true;">
                    {{$mercancia->nombre}}
                    <br>
                    {{$mercancia->cantidadActual}}
                </div>
                <div x-show="flipped" x-transition:enter="transition duration-300 transform ease-in-out"
                     x-transition:enter-start="opacity-0 rotate-y-180" x-transition:enter-end="opacity-100 rotate-y-0"
                     x-transition:leave="transition duration-300 transform ease-in-out"
                     x-transition:leave-start="opacity-100 rotate-y-0" x-transition:leave-end="opacity-0 rotate-y-180"
                     class="absolute grid justify-center grid-rows-2 items-center gap-1 text-center bg-gray-200 from-gray-700 to-white overflow-hidden inset-0 rounded-lg shadow-inner p-4"
                     @click="flipped = false;">
                    <button wire:click="$set('confirmingMercanciaDeletion', {{ $mercancia->id }})"
                            class=" flex justify-between p-2 rounded-lg text-white w-28 group shadow-lg border border-gray-100 bg-gray-200 border-opacity-50 hover:shadow-inner hover:bg-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="icon icon-tabler icon-tabler-trash-x-filled text-red-400" width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16zm-9.489 5.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z"
                                stroke-width="0" fill="currentColor"></path>
                            <path
                                d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z"
                                stroke-width="0" fill="currentColor"></path>
                        </svg>
                        <span class="text-red-500 text-sm"> Eliminar </span>
                    </button>
                    <br>
                    <button wire:click="openModal({{ $mercancia->id }})" data-modal-target="defaultModal"
                            data-modal-toggle="defaultModal"
                            class=" flex justify-between p-2 w-28 rounded-lg text-white group shadow-lg border border-gray-100 border-opacity-50 hover:shadow-inner hover:bg-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="icon icon-tabler icon-tabler-pencil text-blue-400" width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                            <path d="M13.5 6.5l4 4"></path>
                        </svg>
                        <span class="text-blue-500 text-sm"> Editar </span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    @if($showModalMercancias)
{{--        <div class="absolute top-0 h-full w-full bg-black bg-opacity-50"></div>--}}
        <div class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center h-full">
            <div class="absolute bg-gray-900 opacity-50 inset-0"></div>

            <div class="relative bg-white rounded-lg shadow-lg text-black">
                <div class="p-6">
                    <!-- Form to update Mercancia properties -->
                    <form wire:submit.prevent="updateMercancia">
                        <!-- Input fields for Mercancia properties -->
                        <div>
                            <label for="nombre">Nombre:</label>
                            <input wire:model="nombreMercancia" placeholder="{{$selectedMercancia->nombre}}" type="text"
                                   id="nombre">
                        </div>
                        <div class="mt-8">
                            <label for="cantidad">Cantidad:</label>
                            <input wire:model="cantidadMercancia" placeholder="{{$selectedMercancia->cantidadActual}}"
                                   type="number" id="cantidad">
                        </div>
                        <div class="mt-8">
                            <label for="cantidad">Stock Min:</label>
                            <input wire:model="stockMinimoMercancia" placeholder="{{$selectedMercancia->stockMin}}"
                                   type="number" id="cantidad">
                        </div>
                        <div class="mt-8">
                            <label for="cantidad">Stock Max:</label>
                            <input wire:model="stockMaximoMercancia" placeholder="{{$selectedMercancia->stockMax}}"
                                   type="number" id="cantidad">
                        </div>
                        <div class="mt-8">
                            <label for="cantidad">Precio Unid:</label>
                            <input wire:model="precioUnidadMercancia" placeholder="{{$selectedMercancia->precioUnidad}}"
                                   type="number" id="cantidad">
                        </div>
                        <br>


                        <!-- Submit button -->
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Guardar</button>
                        </div>
                    </form>
                </div>

                <button wire:click="closeModalMercancia()"
                        class="absolute top-0 h-4 w-4 right-0 p-4 text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg"
                        aria-label="Close">
                    <div class="flex justify-center align-center">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M14.293 14.293a1 1 0 11-1.414 1.414L10 11.414l-2.879 2.879a1 1 0 11-1.414-1.414L8.586 10 5.707 7.121a1 1 0 111.414-1.414L10 8.586l2.879-2.879a1 1 0 111.414 1.414L11.414 10l2.879 2.879z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    @endif

    @if ($confirmingMercanciaDeletion)
        <div class="fixed inset-0 flex items-center justify-center z-50 shadow-3xl">
            <div class="absolute bg-gray-900 opacity-50 inset-0" wire:click="$set('confirmingMercanciaDeletion', null)"></div>
            <div class="bg-white rounded-lg shadow-lg max-w-md mx-4 md:relative p-8">
                <div class="p-4">
                    <p class="font-bold text-center">¿Eliminar?</p>
                </div>
                <div class="flex justify-center mt-4">
                    <button wire:click="deleteMercancia({{ $confirmingMercanciaDeletion }})"
                            class="flex justify-between  px-4 py-2 bg-red-500 text-white rounded-md hover:shadow-inner hover:bg-red-700 group shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-filled"
                             width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z"
                                stroke-width="0" fill="currentColor"></path>
                            <path
                                d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z"
                                stroke-width="0" fill="currentColor"></path>
                        </svg>
                        <span> Confirmar </span>

                    </button>
                    <button wire:click="$set('confirmingMercanciaDeletion', null)"
                            class=" flex justify-between ml-8 px-4 py-2 bg-blue-500 hover:shadow-inner hover:bg-blue-700 group text-white rounded-md shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24"
                             height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M18 6l-12 12"></path>
                            <path d="M6 6l12 12"></path>
                        </svg>
                        <span> Cancelar </span>

                    </button>
                </div>
            </div>
        </div>
    @endif
    @if ($showModalGraph)
        <div class="rounded-xl bg-gray-500 flex items-center">
            <div class="absolute bg-gray-900 opacity-50 inset-0" wire:click="closeModalGraph"></div>
            <div class="absolute m-auto inset-0 w-1/2 h-1/2 flex justify-center rounded-xl bg-gray-300 backdrop-blur-sm" wire:ignore>
                <div id="container" class="mt-8 mb-8"></div>
                <button class="absolute top-0 right-0 m-2 text-white p-3 rounded-xl bg-red-500 hover:bg-red-700 transition-all hover:shadow-inner shadow-2xl     hover:text-black-700"
                        wire:click="closeModalGraph">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    @endif

</center>
