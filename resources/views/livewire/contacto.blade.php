<div>
    <div id="tablas">

        <div class="flex justify-end mx-8 my-8 bg-gray-100">
            <input class="bg-pink-35 mt-10 mb-8" type="text" wire:model="miContacto" placeholder=" Buscar contacto">
            <button>Proveedores</button>
            <button>Trabajadores</button>
        </div>

        <div class="w-3/4 mx-auto p-8 bg-gray-100 rounded">
            <div class="flex justify-between mb-1.5">
                <h3>Proveedores</h3>
                <button id="nuevoProveedor" class=" inline-block bg-pink-100 p-4 rounded">Agregar Proveedor</button>
            </div>
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ver</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($proveedores as $proveedor)
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{$proveedor->nombre}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$proveedor->email}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$proveedor->telefono}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            <ion-icon name="eye-outline"></ion-icon>
                        </button>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                <div>
                    <!--{$proveedores->links()}}-->
                </div>
        </div>


        <div class="w-3/4 mx-auto p-8 bg-gray-100 rounded">
            <div class="flex justify-between mb-1.5">
                <h3>Trabajadores</h3>
                <button id="nuevoTrabajador" class=" inline-block bg-pink-300 p-4 rounded">Agregar Trabajador</button>
            </div>
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Apellidos</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ver</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($trabajadores as $trabajador)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{$trabajador->nombre}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$trabajador->apellidos}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$trabajador->rol}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$trabajador->email}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">telefono</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                <ion-icon name="eye-outline"></ion-icon>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <!--{$trabajadores->links()}}-->
            </div>
        </div>
    </div>

    <div>
        <!-- Modal proveedor
        <div class="fixed inset-0 z-50 overflow-auto flex items-center justify-center">
            <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
            <div class="bg-white rounded-lg p-8">
                <h2 class="text-xl font-bold mb-4">Nuevo proveedor</h2>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="nombre">Nombre:</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" type="text" placeholder="Nombre del trabajador">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="apellido">Apellido:</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="apellido" type="text" placeholder="Apellido del trabajador">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="email">Email:</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email del trabajador">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="telefono">Teléfono:</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="telefono" type="tel" placeholder="Teléfono del trabajador">
                    </div>
                </form>
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Close</button>
            </div>
        </div>-->

        <!-- Modal trabajador-->
        <div id="trabajadorModal" class="hidden shadow-lg overflow-y-auto fixed inset-0 z-50 overflow-auto flex items-center justify-center">
            <div id="opacidad" class="absolute inset-0 bg-gray-900 opacity-50"></div>
            <div class="bg-white rounded-lg p-8">
                <h2 class="text-xl font-bold mb-4">Nuevo trabajador</h2>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="nombre">Nombre:</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" type="text" placeholder="Nombre del trabajador">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="apellido">Apellido:</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="apellido" type="text" placeholder="Apellido del trabajador">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="puesto">Rol:</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="rol">
                            <option>Selecciona el puesto del trabajador</option>
                            <option>Camarero</option>
                            <option>Cocinero</option>
                            <option>X</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="email">Email:</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email del trabajador">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="telefono">Teléfono:</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="telefono" type="tel" placeholder="Teléfono del trabajador">
                    </div>

                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Agregar Trabajador</button>
                </form>
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    var btnTrabajador = document.getElementById('nuevoTrabajador');

    btnTrabajador.addEventListener('click', function () {
        document.getElementById("trabajadorModal").classList.remove("hidden");
    });

    /*var modal = document.getElementById("opacidad");
    modal.addEventListener("click", function(event) {
        if (event.target !== modal && !modal.contains(event.target)) {
            document.getElementById("trabajadorModal").classList.Add("hidden");
        }
    });*/

   /* var btnProveedor = document.getElementById('nuevoProveedor');

    btnProveedor.addEventListener('click', function () {
        document.getElementById('').classList.toggle('hidden');
        document.getElementById('').classList.toggle('inline');
    });*/
</script>
