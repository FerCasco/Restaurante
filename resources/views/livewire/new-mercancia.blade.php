<div class="text-center">
    <div class="flex-row justify-center">
        <h1 class="mt-28 text-4xl font-bold text-gray-900 ml-40 mb-4">Nueva Mercancia</h1>

        <form wire:submit.prevent="newMercancia" class="border-2 border-black w-3/4 ml-80 p-4">
            <div class="mb-6">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Nombre:</label>
                <input wire:model="nombreMercancia" type="text" id="nombre" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
            <div class="mb-6">
                <label for="cantidad"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad:</label>
                <input wire:model="cantidadMercancia" type="number" id="cantidad" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
            <div class="mb-6">
                <label for="stockMinimo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock Minimo</label>
                <input wire:model="stockMinimoMercancia" type="number" id="stockMinimo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
            <div class="mb-6">
                <label for="stockMaximo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock Minimo</label>
                <input wire:model="stockMaximoMercancia" type="number" id="stockMaximo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
            <div class="mb-6">
                <label for="precioUnidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock Minimo</label>
                <input wire:model="precioUnidadMercancia" type="number" id="precioUnidad" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>

            <div class="mb-6">
                <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock Minimo</label>
                <select id="tipos" wire:model="tipoMercancia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($tipos as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="proveedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock Minimo</label>
                <select id="proveedores" wire:model="proveedorMercancia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($proveedores as $proveedor)
                        <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Añadir</button>
        </form>
    </div>



</div>
