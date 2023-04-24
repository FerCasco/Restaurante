<div>
    @forelse($salas as $sala)
        <button wire:click="verMesas({{$sala->id}})"type="button">{{$sala->nombre}}</button>
    @empty
        <h3>No existen salas para mostrar</h3>
    @endforelse
</div>
