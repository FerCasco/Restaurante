<div>
    <div class="fixed inset-0 overflow-hidden brightness-75 -z-10">
        <img class="object-cover object-center w-full h-full blur-sm"
             src="https://img.freepik.com/foto-gratis/concepto-escritorio-vista-superior-notebook_23-2148604912.jpg?w=1380&t=st=1686151777~exp=1686152377~hmac=4213371ad50feb1d38640bda2b4518dc50a2b6bc9db0b81bc698a3e3daf428fa"
             alt="Imagen">
    </div>
    <div>
        <div class="flex justify-between mb-1.5 bg-gray-100 mt-20 p-8 mx-8 rounded-xl">
            <div>
                <input class="bg-pink-35 rounded-lg" type="text" wire:model="buscarContacto" placeholder=" Buscar contacto">
            </div>
            <div>
                <button wire:click="verTabla('proveedores')" class="bg-yellow-300 border border-yellow-700 shadow-lg hover:shadow-inner hover:bg-yellow-600 transition-all p-2 rounded ">Proveedores</button>
                <button wire:click="verTabla('trabajadores')" class="bg-purple-300 border border-purple-700 shadow-lg hover:shadow-inner hover:bg-purple-600 transition-all p-2 rounded">Trabajadores</button>
            </div>
        </div>

        @if($tablaVisible=="proveedores")
            <div class="mx-8 p-8 bg-gray-100 rounded-xl">
                <div class="flex justify-end mb-1.5">
                    <button wire:click="verModal('proveedores')"
                            class="block text-white bg-orange-300 hover:shadow-inner border border-orange-700 transition-all shadow-lg hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-300 dark:hover:bg-orange-400 dark:focus:ring-orange-500"
                            type="button">Agregar Proveedor
                    </button>
                </div>
                <table class="w-full divide-y divide-gray-200 rounded-lg border-collapse">
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
                                <button wire:click="openEditProveedor({{$proveedor->id}})"
                                        class="transition-all shadow-lg border border-blue-700 hover:shadow-inner bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                        <path
                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                        <path d="M16 5l3 3"></path>
                                    </svg>
                                </button>
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap">
                                <button wire:click="deleteProveedor({{$proveedor->id}})"
                                        class="transition-all shadow-lg border border-red-700 hover:shadow-inner bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7l16 0"></path>
                                        <path d="M10 11l0 6"></path>
                                        <path d="M14 11l0 6"></path>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                </button>
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
            <div class="mx-8 p-8 bg-gray-100 rounded-xl">
                <div class="flex justify-end mb-1.5">
                    <button wire:click="verModal('trabajadores')"
                            class="block text-white bg-pink-300 hover:shadow-inner border shadow-lg border-pink-700 transition-all hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">Agregar Trabajador
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Editar
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Eliminar
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
                            <td class="px-2 py-4 whitespace-nowrap">
                                <button wire:click="openEditTrabajador({{$trabajador->id}})"
                                        class="transition-all shadow-lg border border-blue-700 hover:shadow-inner bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                        <path
                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                        <path d="M16 5l3 3"></path>
                                    </svg>
                                </button>
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap">
                                <button wire:click="deleteTrabajador({{$trabajador->id}})"
                                        class="transition-all shadow-lg border border-red-700 hover:shadow-inner bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7l16 0"></path>
                                        <path d="M10 11l0 6"></path>
                                        <path d="M14 11l0 6"></path>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                </button>
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
                            <button wire:click="verModal(' ')" type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Cerrar modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Dar de alta un
                                    proveedor</h3>
                                <form class="space-y-6" wire:ignore>
                                    <div>
                                        <label for="nombre"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre:</label>
                                        <input type="text" wire:model="nombreProveedor" name="nombre" id="nombre"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               placeholder="Lechugas SL" required>
                                    </div>
                                    <div>
                                        <label for="correo"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo:</label>
                                        <input type="email" wire:model="correoProveedor" name="correo" id="correo"
                                               placeholder="example@gmail.es"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               required>
                                    </div>
                                    <div>
                                        <label for="telefono"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono:</label>
                                        <input type="text" wire:model="telefonoProveedor" name="telefono" id="telefono"
                                               placeholder="626626262"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               required>
                                    </div>
                                    <button type="submit" wire:click="addProveedor"
                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                        <button wire:click="verModal(' ')" type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Cerrar modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Editar
                                proveedor {{$miProveedor->name}}</h3>
                            <form class="space-y-6" wire:ignore>
                                <div>
                                    <label for="nombre"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre:</label>
                                    <input type="text" wire:model="nombreProveedor" name="nombre" id="nombre"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                           placeholder="Lechugas SL" required>
                                </div>
                                <div>
                                    <label for="correo"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo:</label>
                                    <input type="email" wire:model="correoProveedor" name="correo" id="correo"
                                           placeholder="example@gmail.es"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                           required>
                                </div>
                                <div>
                                    <label for="telefono"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono:</label>
                                    <input type="text" wire:model="telefonoProveedor" name="telefono" id="telefono"
                                           placeholder="626626262"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                           required>
                                </div>
                                <button type="submit" wire:click="editProveedor"
                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                    <button wire:click="verModal(' ')" type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Cerrar modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Dar de alta un
                            trabajador</h3>
                        <form class="space-y-6" wire:submit.prevent="addTrabajador">
                            <div>
                                <label for="nombre"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre:</label>
                                <input type="text" wire:model="nombreTrabajador" name="nombre" id="nombre"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       placeholder="Lechugas SL" required>
                            </div>
                            <div>
                                <label for="apellidos"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos:</label>
                                <input type="text" wire:model="apellidosTrabajador" name="apellidos" id="apellidos"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       placeholder="Lechugas SL" required>
                            </div>
                            <div>
                                <label for="dni" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DNI:</label>
                                <input type="text" wire:model="dniTrabajador" name="dni" id="dni"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       placeholder="Lechugas SL" required>
                            </div>
                            <div>
                                <label for="correo"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo:</label>
                                <input type="email" wire:model="correoTrabajador" name="correo" id="correo"
                                       placeholder="example@gmail.es"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       required>
                            </div>
                            <div>
                                <label for="telefono"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono:</label>
                                <input type="text" wire:model="telefonoTrabajador" name="telefono" id="telefono"
                                       placeholder="626626262"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       required>
                            </div>
                            <div>
                                <label for="roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                    an option</label>
                                <select id="roles" wire:model="rolTrabajador"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach($roles as $rol)
                                        <option value="{{$rol->id}}">{{$rol->rol}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Alta
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($modalVisible=="editTrabajador")
            <div id="editTrabajador" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <!-- Modal -->
                <div tabindex="-1" class="z-50 w-full h-screen">
                    <div class="flex items-center justify-center h-full w-full">
                        <div class="relative bg-white w-2/5 rounded-lg shadow dark:bg-gray-700">
                            <button wire:click="verModal(' ')" type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Cerrar modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Editar
                                    trabajador {{$miTrabajador->name}}</h3>
                                <form class="space-y-6" wire:ignore>
                                    <div>
                                        <label for="nombre"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre:</label>
                                        <input type="text" wire:model="nombreTrabajador" name="nombre" id="nombre"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               placeholder="Lechugas SL" required>
                                    </div>
                                    <div>
                                        <label for="apellidos"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos:</label>
                                        <input type="text" wire:model="apellidosTrabajador" name="apellidos"
                                               id="apellidos"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               placeholder="Lechugas SL" required>
                                    </div>
                                    <div>
                                        <label for="dni"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DNI:</label>
                                        <input type="text" wire:model="dniTrabajador" name="dni" id="dni"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               placeholder="Lechugas SL" required>
                                    </div>
                                    <div>
                                        <label for="correo"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo:</label>
                                        <input type="email" wire:model="correoTrabajador" name="correo" id="correo"
                                               placeholder="example@gmail.es"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               required>
                                    </div>
                                    <div>
                                        <label for="telefono"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono:</label>
                                        <input type="text" wire:model="telefonoTrabajador" name="telefono" id="telefono"
                                               placeholder="626626262"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               required>
                                    </div>
                                    <div>
                                        <label for="foto"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto:</label>
                                        <input type="file" wire:model="fotoTrabajador" name="foto" id="foto"
                                               placeholder="626626262"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               required>
                                    </div>
                                    <div>
                                        <label for="roles"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                            an option</label>
                                        <select id="roles" wire:model="rolTrabajador"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @foreach($roles as $rol)
                                                <option value="{{$rol->id}}">{{$rol->rol}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" wire:click="editTrabajador"
                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Actualizar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
    </div>
