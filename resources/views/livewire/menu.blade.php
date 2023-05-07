<nav class="flex justify-center bg-white shadow-lg">
    <div class="fixed z-50 w-full h-4 bg-white">

    </div>

    <div class="fixed z-50 w-full h-16 max-w-lg bg-white border border-gray-200 rounded-b-xl sm:mt-4  dark:bg-gray-700 dark:border-gray-600">

        <div class="grid  h-full max-w-lg grid-cols-6 mx-auto">
            <button data-tooltip-target="tooltip-home" type="button" class="inline-flex flex-col items-center justify-center px-5 rounded-l-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href="{{ url('/') }}" >
                    <div class="text-3xl">
                        <ion-icon name="home"></ion-icon>
                    </div>
                </a>
            </button>
            <button data-tooltip-target="tooltip-wallet" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href="{{ url('/cocina') }}" >
                    <div class="text-3xl">
                        <ion-icon name="restaurant-sharp"></ion-icon>
                    </div>
                </a>
            </button>

            <button data-tooltip-target="tooltip-wallet" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href="{{ url('/inventario') }}" >
                    <div class="text-3xl">
                        <ion-icon name="cube"></ion-icon>
                    </div>
                </a>
            </button>

            <button data-tooltip-target="tooltip-wallet" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href="{{ url('/contactos') }}" >
                    <div class="text-3xl">
                        <ion-icon name="people"></ion-icon>
                    </div>
                </a>
            </button>

            <button data-tooltip-target="tooltip-wallet" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href="{{ url('/graficas') }}" >
                    <div class="text-3xl">
                        <ion-icon name="stats-chart"></ion-icon>
                    </div>
                </a>
            </button>

            <button data-tooltip-target="tooltip-wallet" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href="{{ url('/datosAlmacenados') }}" >
                    <div class="text-3xl">
                        <ion-icon name="create"></ion-icon>
                    </div>
                </a>
            </button>

        </div>
    </div>
</nav>



