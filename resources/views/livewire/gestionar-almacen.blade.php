<center>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <h1 class="mt-28 ml-40 w-full text-center mb-4 text-l font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white inline-block">Tipo: {{$tipo->nombre}}</h1>

    <div class="grid grid-cols-3 gap-4 ml-52 mt-12 pl-28" wire:poll.5000ms>
        @foreach($mercancias as $mercancia)
        <div wire:key="mercancia-{{$mercancia->id}}" wire:ignore x-data="{ flipped: false }" class="border-2 border-black rounded-lg py-20 relative w-52 h-10 mx-auto mt-8 mb-8 cursor-pointer text-center font-bold tracking-light text-lg">
            <div x-show="!flipped" x-transition:enter="transition duration-300 transform ease-in-out" x-transition:enter-start="opacity-0 rotate-y-180" x-transition:enter-end="opacity-100 rotate-y-0" x-transition:leave="transition duration-300 transform ease-in-out" x-transition:leave-start="opacity-100 rotate-y-0" x-transition:leave-end="opacity-0 rotate-y-180" class="absolute text-center py-16 bg-gradient-to-br from-grey-500 via-white-300 to-transparent overflow-hidden inset-0 rounded-lg shadow-lg" @click="flipped = true;">
                {{$mercancia->nombre}}
                <br>
                {{$mercancia->cantidadActual}}
            </div>
            <div x-show="flipped" x-transition:enter="transition duration-300 transform ease-in-out" x-transition:enter-start="opacity-0 rotate-y-180" x-transition:enter-end="opacity-100 rotate-y-0" x-transition:leave="transition duration-300 transform ease-in-out" x-transition:leave-start="opacity-100 rotate-y-0" x-transition:leave-end="opacity-0 rotate-y-180" class="absolute text-center py-16 bg-gradient-to-br from-white via-yellow-200 to-green-300 bg-blue-300 overflow-hidden inset-0 rounded-lg shadow-lg" @click="flipped = false;">
                <button wire:click="deleteMercancia({{$mercancia->id}})">
                    Eliminar
                </button>
                <br>
                <button wire:click="openModal({{ $mercancia->id }})" data-modal-target="defaultModal" data-modal-toggle="defaultModal">
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
                    <label for="nombre">Nombre:</label>
                    <input wire:model="nombreMercancia" placeholder="{{$selectedMercancia->nombre}}" type="text" id="nombre">

                    <label for="cantidad">Cantidad:</label>
                    <input wire:model="cantidadMercancia" placeholder="{{$selectedMercancia->cantidadActual}}" type="number" id="cantidad">

                    <!-- Submit button -->
                    <div class="flex justify-end mt-4">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Guardar</button>
                    </div>
                </form>
            </div>

            <button wire:click="closeModalMercancia()" class="absolute top-0 right-0 p-4 text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg" aria-label="Close">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M14.293 14.293a1 1 0 11-1.414 1.414L10 11.414l-2.879 2.879a1 1 0 11-1.414-1.414L8.586 10 5.707 7.121a1 1 0 111.414-1.414L10 8.586l2.879-2.879a1 1 0 111.414 1.414L11.414 10l2.879 2.879z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
    @endif




    <!-- Main modal -->

</center>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalHideTriggers = document.querySelectorAll('[data-modal-hide]');

        modalHideTriggers.forEach(function(trigger) {
            const modalId = trigger.getAttribute('data-modal-hide');
            const modalElement = document.getElementById(modalId);

            if (modalElement) {
                trigger.addEventListener('click', function() {
                    modalElement.classList.add('hidden');
                });
            }
        });
    });
</script>
