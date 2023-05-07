<center>
    <div class="grid grid-cols-4 gap-4 ml-72 mt-40 pl-28">
        @forelse($mesas as $mesa)
            @if($mesa->idSala ==1)
                <button class="h-48 w-48 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2" wire:click="$emit('atenderMesa',{{$mesa->id}})" type="button">{{$mesa->id}}</button>
            @endif
            @if($mesa->idSala ==2)
                <button class="h-48 w-48 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2" wire:click="$emit('atenderMesa',{{$mesa->id}})" type="button">{{$mesa->id}}</button>
            @endif
            @if($mesa->idSala ==3)
                <button class="h-48 w-48 text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2" wire:click="$emit('atenderMesa',{{$mesa->id}})" type="button">{{$mesa->id}}</button>
            @endif
                @if($mesa->idSala ==4)
                    <button class="h-48 w-48 text-white bg-gradient-to-r from-yellow-200 via-purple-600 to-yellow-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2" wire:click="$emit('atenderMesa',{{$mesa->id}})" type="button">{{$mesa->id}}</button>
                @endif
        @empty
            <h3>No existen mesas para mostrar</h3>
        @endforelse
    </div>
</center>
