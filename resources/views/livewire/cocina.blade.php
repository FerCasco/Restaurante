<div class="flex">
    <!--Aside lateral de ingredientes-->
    <div class="relative h-screen">
        <button id="ingredientes" class="fixed top-0 left-0 z-50 flex items-center justify-center w-20 h-12 text-white bg-neutral-800 rounded-full shadow-md cursor-pointer">

        </button>

        <div id="menuIngredientes" class="mt-4 top-0 left-0 z-40 flex flex-col items-start justify-start w-64 h-full px-4 py-8 bg-white shadow-lg overflow-y-auto">
            <input class="bg-gray-300 mt-10 mb-8" type="text" wire:model="miIngrediente" placeholder=" Buscar ingredientes">

            @foreach($this->mercancias as $mercancia)
                <button wire:click="$emit('cargarProductos',{{$mercancia->id}})" class="flex items-center justify-center bg-indigo-500 rounded-full shadow-md cursor-pointer">
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 rounded-full shadow-md cursor-pointer">{{$mercancia->nombre}}</a>
                </button>
            @endforeach
        </div>
    </div>

    <!--Productos para buscar-->
    <div class="h-screen w-full relative bg-yellow-400 ">
        <input class="bg-gray-300 mb-8 w-2/5 block mx-auto mt-32" type="text" wire:model="miProducto" placeholder=" Buscar productos">
    </dd>
        @foreach($this->productos as $producto)
            <button wire:click="$emit('cargarEmplatado',{{$producto->id}})" class="flex items-center justify-center bg-orange-800 rounded-full shadow-md cursor-pointer">
                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 rounded-full shadow-md cursor-pointer">{{$producto->nombre}}</a>
            </button>
        @endforeach
    </div>

    <!--Emplatado-->

    <div class="relative h-screen bg-red">
        <button id="emplatado" class="fixed top-0 right-0 z-50 flex items-center justify-center w-20 h-12 text-white bg-neutral-800 rounded-full shadow-md cursor-pointer">

        </button>
        @if($productoSeleccionado!=null)
            <div id="menuEmplatado" class="mt-4 top-0 left-0 z-40 flex flex-col items-start justify-start w-96 h-full px-4 py-8 bg-white shadow-lg overflow-y-auto">
                <h2>{{$productoSeleccionado->nombre}}</h2>
            </div>
        @endif
    </div>
</div>


<script>
    var btnIngredientes = document.getElementById('ingredientes');

    btnIngredientes.addEventListener('click', function() {
        document.getElementById('menuIngredientes').classList.toggle('hidden');
        document.getElementById('menuIngredientes').classList.toggle('inline');
    });

    var btnEmplatado = document.getElementById('emplatado');

    btnEmplatado.addEventListener('click', function() {
        document.getElementById('menuEmplatado').classList.toggle('hidden');
        document.getElementById('menuEmplatado').classList.toggle('inline');
        //Livewire.emit('productoSeleccionadoNull');
    });
</script>
