<center>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <div class="mt-28 flex justify-center items-center mb-4">
        <h1 class="ml-96 text-center mb-4 text-l font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
            Tipo: {{$tipo->nombre}}</h1>

        <div class="ml-auto">
            <button wire:click="openModalGraph"
                    class="px-4 py-2 font-semibold text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-50">
                Open Graph
            </button>
        </div>

    </div>
    <div class="grid grid-cols-3 gap-4 ml-52 mt-12 pl-28" wire:poll.5000ms>
        @foreach($mercancias as $mercancia)
            <div wire:key="mercancia-{{$mercancia->id}}" wire:ignore x-data="{ flipped: false }"
                 class="border-2 border-black rounded-lg py-20 relative w-52 h-10 mx-auto mt-8 mb-8 cursor-pointer text-center font-bold tracking-light text-lg">
                <div x-show="!flipped" x-transition:enter="transition duration-300 transform ease-in-out"
                     x-transition:enter-start="opacity-0 rotate-y-180" x-transition:enter-end="opacity-100 rotate-y-0"
                     x-transition:leave="transition duration-300 transform ease-in-out"
                     x-transition:leave-start="opacity-100 rotate-y-0" x-transition:leave-end="opacity-0 rotate-y-180"
                     class="absolute text-center py-16 bg-gradient-to-br from-grey-500 via-white-300 to-transparent overflow-hidden inset-0 rounded-lg shadow-lg"
                     @click="flipped = true;">
                    {{$mercancia->nombre}}
                    <br>
                    {{$mercancia->cantidadActual}}
                </div>
                <div x-show="flipped" x-transition:enter="transition duration-300 transform ease-in-out"
                     x-transition:enter-start="opacity-0 rotate-y-180" x-transition:enter-end="opacity-100 rotate-y-0"
                     x-transition:leave="transition duration-300 transform ease-in-out"
                     x-transition:leave-start="opacity-100 rotate-y-0" x-transition:leave-end="opacity-0 rotate-y-180"
                     class="absolute text-center bg-gradient-to-br from-white via-yellow-200 to-green-300 bg-blue-300 overflow-hidden inset-0 rounded-lg shadow-lg"
                     @click="flipped = false;">
                    <button wire:click="$set('confirmingMercanciaDeletion', {{ $mercancia->id }})"
                            class="border-2 border-black rounded-lg">
                        Eliminar
                    </button>
                    <br>
                    <button wire:click="openModal({{ $mercancia->id }})" data-modal-target="defaultModal"
                            data-modal-toggle="defaultModal" class="mt-24 border-2 border-black rounded-lg  ">
                        Editar
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    @if($showModalMercancias)
        <div class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center h-full">
            <div class="absolute bg-gray-900 opacity-50 inset-0"></div>

            <div class="relative bg-white rounded-lg shadow-lg">
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
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg max-w-md mx-4 md:relative p-8">
                <div class="p-4">
                    <p class="font-bold text-center">¿Eliminar?</p>
                </div>
                <div class="flex justify-center mt-4">
                    <button wire:click="deleteMercancia({{ $confirmingMercanciaDeletion }})"
                            class="px-4 py-2 bg-red-500 text-white rounded-md">Confirmar
                    </button>
                    <button wire:click="$set('confirmingMercanciaDeletion', null)"
                            class="ml-8 px-4 py-2 bg-gray-500 text-white rounded-md">Cancelar
                    </button>
                </div>
            </div>
        </div>
    @endif
    @if ($showModalGraph)
        <div class="flex items-center justify-center">
            <div class="fixed mt-28 inset-0 bg-red-500 w-full h-1/2 flex items-center justify-center mx-auto" wire:ignore>
                <div id="container"></div>
            </div>
        </div>
    @endif
</center>
