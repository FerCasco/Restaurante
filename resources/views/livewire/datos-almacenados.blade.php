<div>
    <div class="m-8">

        @if ($componenteActivo === 'menu-diario')
            <div>
                <!--Menu diario-->
                @livewire('menu-diario')
            </div>
        @endif
        @if ($componenteActivo === 'reserva')
            <div>
                <!--Reserva-->
                @livewire('reserva')
            </div>
        @endif




        <!-- Menú inferior-->
        <div
            class="fixed z-50 w-full h-16 max-w-lg -translate-x-1/2 bg-white border border-gray-200 rounded-full bottom-8 left-1/2 dark:bg-gray-700 dark:border-gray-600">
            <div class="grid h-full max-w-lg grid-cols-3 mx-auto">

                <button wire:click="$emit('$componenteActivar','menu-diario')" data-tooltip-target="tooltip-wallet" type="button"
                        class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <div class="text-3xl">
                        <ion-icon name="reorder-four-outline"></ion-icon>
                    </div>
                </button>
                <div id="tooltip-wallet" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Wallet
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <div class="flex items-center justify-center">
                    <button data-tooltip-target="tooltip-new" type="button"
                            class="inline-flex items-center justify-center w-10 h-10 font-medium bg-blue-600 rounded-full hover:bg-blue-700 group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                  d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"></path>
                        </svg>
                        <span class="sr-only">New item</span>
                    </button>
                </div>
                <div id="tooltip-new" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Create new item
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button wire:click="$emit('$componenteActivar','reserva')" data-tooltip-target="tooltip-settings" type="button"
                        class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <div class="text-3xl">
                        <ion-icon name="calendar-outline"></ion-icon>
                    </div>
                </button>
                <div id="tooltip-settings" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 shadow-sm  rounded-lg opacity-0 tooltip dark:bg-gray-700">
                    Settings
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

            </div>
        </div>
    </div>
</div>
