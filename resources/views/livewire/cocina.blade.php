<div class="flex">
    <!--Aside lateral de ingredientes-->
    <div class="relative translate-x-0 h-screen transition-all duration-1000">
            <button id="ingredientes" class="inline fixed top-0 left-0 z-50 flex items-center justify-center w-20 h-12 rounded-full cursor-pointer">
                <a>
                    <ion-icon name="menu" class="text-5xl"></ion-icon>
                </a>
            </button>
        <div id="menuIngredientes"
             class="mt-4 top-0 left-0 z-40 flex flex-col items-start justify-start w-96 h-full px-4 py-8 bg-white shadow-lg">
            <input class="bg-gray-300 mt-10 mb-8 mx-auto " type="text" wire:model="miIngrediente"
                   placeholder=" Buscar ingredientes">

            @foreach($this->mercancias as $mercancia)
                <button wire:click="$emit('cargarProductos',{{$mercancia->id}})"
                        class="mx-auto my-4 text-white rounded-lg bg-blue-800 shadow-md cursor-pointer">
                    <a href="#"
                       class="w-60 block px-4 text-white rounded-lg py-2 text-gray-800 hover:bg-blue-400 shadow-md cursor-pointer">{{$mercancia->nombre}}</a>
                </button>
            @endforeach
        </div>
    </div>

    <div>

    </div>

    <!--Productos para buscar-->
    <div class="h-screen w-full relative bg-yellow-400 ">
        <input class="bg-gray-300 mb-8 w-2/5 block mx-auto mt-32" type="text" wire:model="miProducto"
               placeholder=" Buscar productos">
        @foreach($this->productos as $producto)
            @if(is_array($producto))
                <button wire:click="$emit('cargarEmplatado',{{$producto['id']}})"
                        class="mx-auto my-4 text-white rounded-lg flex items-center justify-center bg-orange-800 shadow-md cursor-pointer">
                    <a href="#"
                       class="w-60 block px-4 text-white rounded-lg py-2 text-gray-800 hover:bg-red-400 shadow-md cursor-pointer">{{$producto['nombre']}}</a>
                </button>
            @else
                <button wire:click="$emit('cargarEmplatado',{{$producto->id}})"
                        class="mx-auto my-4 text-white rounded-lg flex items-center justify-center bg-orange-800 shadow-md cursor-pointer">
                    <a href="#"
                       class="w-60 block px-4 text-white rounded-lg py-2 text-gray-800 hover:bg-red-400 shadow-md cursor-pointer">{{$producto->nombre}}</a>
                </button>
            @endif
        @endforeach
    </div>

    <!--Emplatado-->

    <div class="relative h-screen bg-red">
        <button id="emplatado"
                class="fixed top-0 right-0 z-50 flex items-center justify-center w-20 h-12 text-white bg-neutral-800 rounded-full shadow-md cursor-pointer">

        </button>
        @if($productoSeleccionado!=null)
            <div id="menuEmplatado"
                 class="mt-4 top-0 left-0 z-40 flex flex-col items-start justify-start w-96 h-full px-4 py-8 bg-white shadow-lg overflow-y-auto">
                <h2>{{$productoSeleccionado->nombre}}</h2>
            </div>
        @endif
    </div>
</div>


<script>
    const btnIngredientes = document.getElementById('ingredientes');

    btnIngredientes.addEventListener('click', function () {
        var elemento = document.getElementById('menuIngredientes');

        if (elemento.classList.contains("translate-x-full")) {
            elemento.classList.remove("translate-x-full");
        } else {
            elemento.classList.remove("translate-x-0");
            elemento.classList.add("translate-x-full");
        }
    });

    const btnEmplatado = document.getElementById('emplatado');

    btnEmplatado.addEventListener('click', function () {
        document.getElementById('menuEmplatado').classList.toggle('hidden');
        document.getElementById('menuEmplatado').classList.toggle('inline');
        //Livewire.emit('productoSeleccionadoNull');
    });
</script>
