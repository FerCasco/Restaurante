<center>
    <div>
        @forelse($mesas as $mesa)
            <button wire:click="$emit('atenderMesa',{{$mesa->id}})" type="button">{{$mesa->id}}</button>
        @empty
            <h3>No existen mesas para mostrar</h3>
        @endforelse
    </div>
</center>
