<div>
    @livewire('menu')
    @livewire('tipos')
    @if ($componenteActivo === 'gestionar-almacen')
        <div>
            @livewire('gestionar-almacen',['idTipo' => $idTipo])
        </div>
    @endif
</div>

