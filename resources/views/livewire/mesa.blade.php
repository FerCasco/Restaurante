<center>
    @php
        $colors = ['bg-red-300', 'bg-blue-300', 'bg-green-300'];
        $color = 'bg-yellow-500'
    @endphp
    <div class="grid grid-cols-4 gap-4 ml-72 mt-40 pl-28">
        @forelse($mesas as $mesa)
            @php
                $color = $colors[$mesa->idSala - 1];
            @endphp
            <button
                class="h-48 w-48 text-white shadow-inner from-green-400 {{$color}} focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2"
                wire:click="$emit('atenderMesa',{{$mesa->id}})" type="button">{{$mesa->nombre}}</button>
        @empty
            <h3>No existen mesas para mostrar</h3>
        @endforelse
    </div>
</center>
