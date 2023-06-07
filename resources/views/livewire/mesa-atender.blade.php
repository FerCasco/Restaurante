<div>
    @if($showFamilies)
    <h1 class="mt-40 w-full text-center mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-300 md:text-5xl lg:text-6xl dark:text-white inline-block">Mesa: {{$mesaAtender->id}}</h1>

    <div class="grid grid-cols-3 gap-4 ml-72 mt-12 pl-28">
        @foreach($familias as $familia)
        <button wire:click.defer="cargarProductos({{$familia->id}})" class="hover:shadow-inner cursor-pointer shadow-xl block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$familia->nombre}}</h5>
        </button>
        @endforeach
    </div>
    @else
    <button wire:click="resetProductos" class="ml-80 mt-32 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Back to Family List
    </button>

    <h2 class="mt-12 ml-72 text-3xl font-semibold">Product List</h2>
    <div class="ml-72 mt-6">
        @foreach($productos as $producto)
        <button wire:click="addComanda({{ $producto->id }})" class="hover:shadow-inner cursor-pointer shadow-xl block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$producto->nombre}}</h5>
        </button>
        @endforeach
    </div>
    @endif

    @if($showModal && !is_null($selectedProducto))
    <div class="h-full w-full fixed z-50 inset-0 flex items-center justify-center overflow-auto">
        <div class="bg-white p-8 rounded shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Enter Quantity</h2>
            <input type="number" wire:model="cantidad" min="0" class="w-24 px-4 py-2 border rounded">
            <div class="mt-4">
                <button wire:click="submitCantidad" class="px-4 py-2 bg-blue-500 text-white font-bold rounded">Submit</button>
                <button wire:click="closeModal" class="px-4 py-2 bg-gray-500 text-white font-bold rounded">Cancel</button>
            </div>
        </div>
    </div>
    @endif
    @if($showComanda)
    <div class="h-full w-full fixed z-50 inset-0 flex items-center justify-center overflow-auto">
        <div class="bg-white rounded-lg shadow-lg px-8 py-10 max-w-xl mx-auto">
            <div class="border-b-2 border-gray-300 pb-8 mb-8">
                <h2 class="text-2xl font-bold mb-4">Comanda Mesa: {{$mesaAtender->id}}</h2>
            </div>
            <table class="w-full text-left mb-8">
                <thead>
                    <tr>
                        <th class="px-4 text-gray-700 font-bold uppercase py-2">Producto</th>
                        <th class="px-4 text-gray-700 font-bold uppercase py-2">Cant</th>
                        <th class="px-4 text-gray-700 font-bold uppercase py-2">Precio</th>
                        <th class="px-4 text-gray-700 font-bold uppercase py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lineasComanda as $linea)
                    <tr>
                        <td class="px-4 py-4 text-gray-700">{{ App\Models\Producto::where('id', $linea->idProducto)->get()->first()->nombre }}</td>
                        <td class="px-4 py-4 text-gray-700">{{ $linea->cantidad }}</td>
                        <td class="px-4 py-4 text-gray-700">{{ App\Models\Producto::where('id', $linea->idProducto)->get()->first()->precio }}€</td>
                        <td class="px-4 py-4 text-gray-700">{{ $linea->precio }}€</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="flex justify-end mb-8">
                <div class="text-gray-700 mr-2">Subtotal:</div>
                <div class="text-gray-700">{{$comanda->precioTotal}}€</div>
            </div>
            <button wire:click="closeComanda" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                Close
            </button>
        </div>
    </div>
    @endif
    <div class="fixed z-50 w-full h-16 max-w-lg -translate-x-1/2 bg-white border border-gray-200 rounded-full bottom-4 left-1/2 dark:bg-gray-700 dark:border-gray-600">
        <div class="grid h-full max-w-lg grid-cols-3 mx-auto">
            <button wire:click="verComanda" data-tooltip-target="tooltip-wallet" type="button" class="m-auto border border-gray-200 hover:bg-gray-300 hover:shadow-inner py-3 inline-flex flex-col items-center justify-center px-5 rounded-full w-1/2 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-news" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11"></path>
                    <path d="M8 8l4 0"></path>
                    <path d="M8 12l4 0"></path>
                    <path d="M8 16l4 0"></path>
                </svg>
                <span class="sr-only">Ver Comanda</span>
            </button>
            <div id="tooltip-wallet" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Ver Comanda
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <div class="flex items-center justify-center">
                <button wire:click="enviarComanda" data-tooltip-target="tooltip-new" type="button" class="inline-flex items-center justify-center w-10 h-10 font-medium bg-blue-600 rounded-full hover:bg-blue-700 group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-telegram" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4"></path>
                    </svg>
                    <span class="sr-only">Enviar Comanda</span>
                </button>
            </div>
            <div id="tooltip-new" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Enviar Comanda
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <button data-tooltip-target="tooltip-settings" type="button" class="m-auto border border-gray-200 hover:bg-gray-300 hover:shadow-inner py-3 inline-flex flex-col items-center justify-center px-5 rounded-full w-1/2 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 7l16 0"></path>
                    <path d="M10 11l0 6"></path>
                    <path d="M14 11l0 6"></path>
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                </svg>
                <span class="sr-only">Eliminar Comanda</span>
            </button>
            <div id="tooltip-settings" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Eliminar Comanda
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    </div>
</div>
