<center>
<h1 class="mt-24 w-full text-center mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white inline-block">Tipo: {{$tipo->nombre}}</h1>

<div class="grid grid-cols-3 gap-4 ml-52 mt-12 pl-28">
    @foreach($mercancias as $mercancia)
        <a class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$mercancia->nombre}}</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Cantidad: {{$mercancia->cantidadActual}}</p>
        </a>
    @endforeach

</div>
</center> 