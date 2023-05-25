<center>
    <h1 class="mt-28 ml-40 text-center mb-4 text-l font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white inline-block">Nuevo pedido</h1>

    <ul>
        @foreach($mercanciasBajoStockMinimo as $mercancia)
            <li>{{$mercancia->nombre}} -- ({{round($mercancia->cantidadActual)}}/{{round($mercancia->stockMin)}}) -- <form><input type="number" id="{{$mercancia->id}}" name="{{$mercancia->id}}"> <button wire:click="">Enviar</button></form></li>
        @endforeach
    </ul>
</center>