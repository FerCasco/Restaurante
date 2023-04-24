<div>
    @forelse($mesas as $mesa)
        <button wire:click="atenderMesas({{$mesa->id}})" type="button">{{$mesa->id}}</button>
    @empty
        <h3>No existen mesas para mostrar</h3>
    @endforelse
</div>
