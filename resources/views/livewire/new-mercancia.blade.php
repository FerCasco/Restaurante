<div class="text-center">
    <h1 class="mt-28 ml-12 text-4xl font-bold text-gray-900">Nueva Mercancia</h1>
    <form wire:submit.prevent="newMercancia">
        <!-- Input fields for Mercancia properties -->
        <div>
            <label for="nombre">Nombre:</label>
            <input wire:model="nombreMercancia" type="text" id="nombre">
        </div>
        <div class="mt-8">
            <label for="cantidad">Cantidad:</label>
            <input wire:model="cantidadMercancia" type="number" id="cantidad">
        </div>
        <div class="mt-8">
            <label for="cantidad">Stock Min:</label>
            <input wire:model="stockMinimoMercancia" type="number" id="cantidad">
        </div>
        <div class="mt-8">
            <label for="cantidad">Stock Max:</label>
            <input wire:model="stockMaximoMercancia" type="number" id="cantidad">
        </div>
        <div class="mt-8">
            <label for="cantidad">Precio Unid:</label>
            <input wire:model="precioUnidadMercancia" type="number" id="cantidad">
        </div>
        <div class="mt-8 flex justify-center">
            <label for="tipos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Escoja un tipo</label>
            <br>
            <select id="tipos" wire:model="tipoMercancia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($tipos as $tipo)
                <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-8 flex justify-center">
            <label for="proveedores" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Escoja un tipo</label>
            <br>
            <select id="proveedores" wire:model="proveedorMercancia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($proveedores as $proveedor)
                <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                @endforeach
            </select>
        </div>



        <!-- Submit button -->
        <div class="flex justify-end mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Guardar</button>
        </div>
    </form>
</div>