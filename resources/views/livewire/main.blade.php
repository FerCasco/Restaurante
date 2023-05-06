<?php
// Iniciar sesión
session_start();

?>
<div>
    @livewire('sala')
    @livewire('menu-lateral')
    @if ($componenteActivo === 'mesa')
        <div>
            @livewire('mesa',['idSala' => $idSala])
        </div>
    @endif
    @if ($componenteActivo === 'mesaAtender')
        <div>
            @livewire('mesa-atender',['idMesa' => $idMesa])
        </div>
    @endif
</div>
