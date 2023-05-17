<aside class="absolute shadow-2xl left-0 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 "
       aria-label="Sidebar">
    <div class="h-full pt-8 px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach($salas as $sala)
                <button wire:click="$emit('enviarSalaId',{{$sala->id}})" type="button" class=" w-full flex items-center justify-center h-28 border border-gray-2 shadow-lg py-2 hover:color-gray-100 bg-white px-2.5 text-sm hover:shadow-inner text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300">
                    <li>
                        {{$sala->nombre}}
                    </li>
                </button>
            @endforeach
        </ul>
    </div>
</aside>
