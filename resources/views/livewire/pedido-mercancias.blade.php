<div class="text-center">
    <h1 class="mt-28 text-4xl font-bold text-gray-900">Nuevo pedido</h1>

    <ul class="mt-6 space-y-4">
        @foreach($mercanciasBajoStockMinimo as $mercancia)
        <li class="inline-flex items-center justify-between w-96 h-16 bg-white rounded-lg p-4 shadow-md">
            <span class="mr-4">{{$mercancia->nombre}} -- ({{round($mercancia->cantidadActual)}}/{{round($mercancia->stockMin)}})</span>
            <div class="flex items-center">
                <input type="number" wire:model="inputValues.{{$mercancia->id}}" id="{{$mercancia->id}}" name="{{$mercancia->id}}" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mr-2 w-20">
            </div>
        </li>
        <br>
        @endforeach
        <button wire:click="createPedido" class="px-4 py-2 font-semibold text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-50">Crear pedido</button>
    </ul>

    @if (session()->has('message'))
    <div class="fixed bottom-4 right-4 z-50">
        <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">{{ session('message') }}</div>
            <button type="button" wire:click="dismissToast" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    <script>
        setTimeout(function() {
            @this.call('dismissToast');
        }, 2000);
    </script>
    @endif
</div>
