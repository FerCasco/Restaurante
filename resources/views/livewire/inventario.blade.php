<div>
    @livewire('menu')
    @livewire('tipos')
    @if ($componenteActivo === 'gestionar-almacen')
    <div>
        @livewire('gestionar-almacen',['idTipo' => $idTipo])
    </div>
    @endif
    @if($componenteActivo === 'pedido-mercancias')
    <div>
        @livewire('pedido-mercancias')
    </div>
    @endif
    @if($componenteActivo === 'new-mercancia')
    <div>
        @livewire('new-mercancia')
    </div>
    @endif
</div>