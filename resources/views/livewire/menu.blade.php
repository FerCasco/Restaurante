<nav class="flex justify-center bg-white shadow-lg">
    <div class="fixed z-50 w-full h-4 bg-white">

    </div>

    <div class="fixed z-50 w-full h-16 max-w-lg bg-white border border-gray-200 rounded-b-xl sm:mt-4 dark:bg-gray-700 dark:border-gray-600 hover:bg-blue-100">

        <div class="grid h-full max-w-lg grid-cols-6 mx-auto">

            <button data-tooltip-target="tooltip-home" type="button" class="inline-flex flex-col items-center justify-center px-5 py-2 hover:rounded-b-xl hover:bg-gray-50 dark:hover:bg-gray-800 group ">
                <a href="{{ url('/') }}" >
                    <div class="relative">
                        <ion-icon name="home" class="text-lg desplazamiento w-8 h-8 group-hover:-translate-y-2 group-hover:shadow-lg transition-all" style="font-size: 1.5rem;"></ion-icon>
                        <div class="absolute bottom-0 left-0 right-0 text-center opacity-0 group-hover:opacity-100 group-hover:translate-y-2 group-hover:transition-all">Salas</div>
                    </div>
                </a>
            </button>

            <button data-tooltip-target="tooltip-wallet" type="button" class="inline-flex flex-col items-center justify-center px-5 py-2 hover:rounded-b-xl hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href="{{ url('/cocina') }}" >
                    <div class="relative">
                        <ion-icon name="restaurant-sharp" class="text-lg desplazamiento w-8 h-8 group-hover:-translate-y-2 group-hover:shadow-lg transition-all" style="font-size: 1.5rem;"></ion-icon>
                        <div class="relative">
                            <div class="absolute bottom-0 left-0 right-0 text-center opacity-0 group-hover:opacity-100 group-hover:translate-y-2 group-hover:transition-all">Cocina</div>
                        </div>
                    </div>
                </a>
            </button>

            <button data-tooltip-target="tooltip-wallet" type="button" class="inline-flex flex-col items-center justify-center px-5 py-2 hover:rounded-b-xl hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href="{{ url('/inventario') }}" >
                    <div class="relative">
                        <ion-icon name="cube" class="text-lg desplazamiento w-8 h-8 group-hover:-translate-y-2 group-hover:shadow-lg transition-all" style="font-size: 1.5rem;"></ion-icon>
                        <div class="absolute bottom-0 left-0 right-0 text-center opacity-0 group-hover:opacity-100 group-hover:translate-y-2 group-hover:transition-all">Inventario</div>
                    </div>
                </a>
            </button>

            <button data-tooltip-target="tooltip-wallet" type="button" class="inline-flex flex-col items-center justify-center px-5 py-2 hover:rounded-b-xl hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href="{{ url('/contactos') }}" >
                    <div class="relative">
                        <ion-icon name="people" class="text-lg desplazamiento w-8 h-8 group-hover:-translate-y-2 group-hover:shadow-lg transition-all" style="font-size: 1.5rem;"></ion-icon>
                        <div class="absolute bottom-0 left-0 right-0 text-center opacity-0 group-hover:opacity-100 group-hover:translate-y-2 group-hover:transition-all">Contactos</div>
                    </div>
                </a>
            </button>

            <button data-tooltip-target="tooltip-wallet" type="button" class="inline-flex flex-col items-center justify-center px-5 py-2 hover:rounded-b-xl hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href="{{ url('/graficas') }}" >
                    <div class="relative">
                        <ion-icon name="stats-chart" class="text-lg desplazamiento w-8 h-8 group-hover:-translate-y-2 group-hover:shadow-lg transition-all" style="font-size: 1.5rem;"></ion-icon>
                        <div class="absolute bottom-0 left-0 right-0 text-center opacity-0 group-hover:opacity-100 group-hover:translate-y-2 group-hover:transition-all">Gráficas</div>
                    </div>
                </a>
            </button>

            <button data-tooltip-target="tooltip-wallet" type="button" class="inline-flex flex-col items-center justify-center px-5 py-2 hover:rounded-b-xl hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href="{{ url('/datosAlmacenados') }}" >
                    <div class="relative">
                        <ion-icon name="calendar-outline" class="text-lg desplazamiento w-8 h-8 group-hover:-translate-y-2 group-hover:shadow-lg transition-all" style="font-size: 1.5rem;"></ion-icon>
                        <div class="absolute bottom-0 left-0 right-0 text-center opacity-0 group-hover:opacity-100 group-hover:translate-y-2 group-hover:transition-all">Diario</div>
                    </div>
                </a>
            </button>
        </div>
    </div>
</nav>



