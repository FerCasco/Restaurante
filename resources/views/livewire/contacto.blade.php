<div>
    <div>
        <div class="flex justify-between mb-1.5 bg-gray-100 mt-36 p-8 mx-8">
            <div>
                <input class="bg-pink-35" type="text" wire:model="buscarContacto" placeholder=" Buscar contacto">
            </div>
            <div>
                <button wire:click="verTabla('proveedores')" class="bg-orange-200 p-2 rounded">Proveedores</button>
                <button wire:click="verTabla('trabajadores')" class="bg-pink-200 p-2 rounded">Trabajadores</button>
            </div>
        </div>

        @if($tablaVisible=="proveedores")
        <div class="mx-8 p-8 bg-gray-100 rounded">
            <div class="flex justify-end mb-1.5">
                <button wire:click="verModal('proveedores')" class="block text-white bg-orange-400 hover:bg-orange-300 focus:ring-4 focus:outline-none focus:ring-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-300 dark:hover:bg-orange-400 dark:focus:ring-orange-500" type="button">Agregar Proveedor
                </button>
            </div>
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Teléfono
                        </th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Editar
                        </th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Eliminar
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($proveedores as $proveedor)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{$proveedor->nombre}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$proveedor->email}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$proveedor->telefono}}</td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            <a wire:click="openEditProveedor({{$proveedor->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                <ion-icon wire:ignore name='pencil'></ion-icon>
                            </a>
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            <a wire:click="deleteProveedor({{$proveedor->id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                <ion-icon wire:ignore name="trash"></ion-icon>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $proveedores->appends(['tab' => 'proveedores'])->links() }} <!-- Agregar la barra de paginación -->
            </div>
        </div>

        @endif

        @if($tablaVisible=="trabajadores")
        <div class="mx-8 p-8 bg-gray-100 rounded">
            <div class="flex justify-end mb-1.5">
                <button wire:click="verModal('trabajadores')" class="block text-white bg-pink-400 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Agregar Trabajador
                </button>
            </div>
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Apellidos
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Teléfono
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ver
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($trabajadores as $trabajador)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{$trabajador->name}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$trabajador->apellidos}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$trabajador->idRol}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$trabajador->email}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">telefono</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a wire:click="verContacto({{$trabajador->id}})">
                                <ion-icon wire:ignore name="eye-outline"></ion-icon>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $trabajadores->appends(['tab' => 'trabajadores'])->links() }}
            </div>
        </div>
        @endif
    </div>


    <!-- MODALES -->
    <div>
        <!-- Modal proveedores -->
        @if($modalVisible=="proveedores")
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <!-- Modal -->
            <div tabindex="-1" class="z-50 w-full h-screen">
                <div class="flex items-center justify-center h-full w-full">
                    <div class="relative bg-white w-2/5 rounded-lg shadow dark:bg-gray-700">
                        <button wire:click="verModal(' ')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Cerrar modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Dar de alta un
                                proveedor</h3>
                            <form class="space-y-6" wire:ignore>
                                <div>
                                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre:</label>
                                    <input type="text" wire:model="nombreProveedor" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Lechugas SL" required>
                                </div>
                                <div>
                                    <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo:</label>
                                    <input type="email" wire:model="correoProveedor" name="correo" id="correo" placeholder="example@gmail.es" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                </div>
                                <div>
                                    <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono:</label>
                                    <input type="text" wire:model="telefonoProveedor" name="telefono" id="telefono" placeholder="626626262" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                </div>
                                <button type="submit" wire:click="addProveedor()" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Alta
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($modalVisible=="editProveedor")
    <div id="editProveedor" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <!-- Modal -->
        <div tabindex="-1" class="z-50 w-full h-screen">
            <div class="flex items-center justify-center h-full w-full">
                <div class="relative bg-white w-2/5 rounded-lg shadow dark:bg-gray-700">
                    <button wire:click="verModal(' ')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Cerrar modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Editar proveedor {{$miProveedor->name}}</h3>
                        <form class="space-y-6" wire:ignore>
                            <div>
                                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre:</label>
                                <input type="text" wire:model="nombreProveedor" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Lechugas SL" required>
                            </div>
                            <div>
                                <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo:</label>
                                <input type="email" wire:model="correoProveedor" name="correo" id="correo" placeholder="example@gmail.es" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            </div>
                            <div>
                                <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono:</label>
                                <input type="text" wire:model="telefonoProveedor" name="telefono" id="telefono" placeholder="626626262" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            </div>
                            <button type="submit" wire:click="editProveedor()" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Actualizar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if($modalVisible=="trabajadores")
<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <!-- Modal -->
    <div tabindex="-1" class="z-50 w-full h-screen">
        <div class="flex items-center justify-center h-full w-full">
            <div class="relative bg-white w-2/5 rounded-lg shadow dark:bg-gray-700">
                <button wire:click="verModal(' ')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Cerrar modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Dar de alta un
                        trabajador</h3>
                    <form class="space-y-6" wire:ignore>
                        <div>
                            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre:</label>
                            <input type="text" wire:model="nombreTrabajador" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Lechugas SL" required>
                        </div>
                        <div>
                            <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos:</label>
                            <input type="text" wire:model="apellidosTrabajador" name="apellidos" id="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Lechugas SL" required>
                        </div>
                        <div>
                            <label for="dni" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DNI:</label>
                            <input type="text" wire:model="dniTrabajador" name="dni" id="dni" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Lechugas SL" required>
                        </div>
                        <div>
                            <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo:</label>
                            <input type="email" wire:model="correoTrabajador" name="correo" id="correo" placeholder="example@gmail.es" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <div>
                            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono:</label>
                            <input type="text" wire:model="telefonoTrabajador" name="telefono" id="telefono" placeholder="626626262" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <div>
                            <label for="roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                an option</label>
                            <select id="roles" wire:model="rolTrabajador" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($roles as $rol)
                                <option value="{{$rol->id}}">{{$rol->rol}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" wire:click="addTrabajador()" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Alta
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif


</div>
</div>