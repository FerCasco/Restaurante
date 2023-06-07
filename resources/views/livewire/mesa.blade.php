<center>
    @php
        $colors = ['red', 'blue', 'green'];
        $colorsHover = ['bg-red', 'bg-blue', 'bg-green'];
        $color = 'bg-yellow-300';
        $colorHover = 'bg-yellow-500'
    @endphp
    <div class="grid grid-cols-4 gap-4 ml-72 mt-40 pl-28">
        @forelse($mesas as $mesa)
            @php
                $color = $colors[$mesa->idSala - 1];
                $colorHover = $colorsHover[$mesa->idSala - 1];
            @endphp
            <button
                class="h-48 w-48 text-white hover:bg-{{$color}}-400 hover:shadow-inner shadow-lg border border-{{$color}}-500 transition-all shadow-inner from-green-400 bg-{{$color}}-300 focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2"
                wire:click="$emit('atenderMesa',{{$mesa->id}})" type="button">{{$mesa->nombre}}</button>
        @empty
            <h3>No existen mesas para mostrar</h3>
        @endforelse
    </div>
</center>
