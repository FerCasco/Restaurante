<aside class="absolute shadow-2xl h-full left-0 w-64 transition-transform -translate-x-full sm:translate-x-0 " aria-label="Sidebar">
    <div class="h-full pt-8 px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium flex flex-col justify-between h-full">
            @foreach($tipos as $tipo)
            <button wire:click="$emit('enviarTipoId',{{$tipo->id}})" type="button" class="w-full flex items-center justify-center h-28 border border-gray-2 shadow-lg py-2 hover:color-white bg-white px-2.5 text-sm hover:shadow-inner text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300">
                <li>
                    {{$tipo->nombre}}
                </li>
            </button>
            @endforeach

            <button  wire:click="$emit('newMercancia')" type="button" class="w-full flex items-center justify-center h-28 border border-gray-2 shadow-lg py-2 hover:color-white bg-white px-2.5 text-sm hover:shadow-inner text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300">
                <li>
                    Añadir Mercancía
                </li>
            </button>

            <button wire:click="$emit('addMercancia')" type="button" class="w-full flex items-center justify-center h-28 border border-gray-2 shadow-lg py-2 hover:color-white bg-white px-2.5 text-sm hover:shadow-inner text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300">
                <li>
                    Abrir Pedido
                </li>
            </button>
        </ul>
    </div>
</aside>
