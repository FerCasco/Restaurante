<aside class="absolute shadow-2xl left-0 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 " aria-label="Sidebar">
    <div class="h-full pt-8 px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach($tipos as $tipo)
                <li class="border w-full text-center border-gray-500 rounded-md p-6 mr-6 inline-block">
                    <button wire:click="$emit('enviarTipoId',{{$tipo->id}})" type="button">{{$tipo->nombre}}</button>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
