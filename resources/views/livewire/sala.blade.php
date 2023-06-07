<div>
    <aside class="absolute shadow-2xl left-0 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 "
       aria-label="Sidebar">
    <div class="h-full pt-8 px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach($salas as $sala)
                <button wire:click="$emit('enviarSalaId',{{$sala->id}})" type="button" class=" w-full flex items-center justify-center h-28 border border-gray-2 shadow-lg py-2 hover:color-gray-100 bg-white px-2.5 text-sm hover:shadow-inner text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300">
                    <li>
                        {{__('welcome.' . $sala->nombre)}}                      
                    </li>
                </button>
            @endforeach
        </ul>
    </div>
    <div class="absolute bottom-0 left-0 w-full p-8 ">
        <button wire:click="verModal('agregar')" type="button" class="w-full flex items-center justify-center h-28 border border-gray-2 shadow-lg py-2 hover:color-lime-100 bg-lime-200 px-2.5 text-sm hover:shadow-inner text-slate-700 rounded-md hover:bg-lime-100 dark:hover:bg-lime-900 dark:text-slate-400 dark:hover:text-slate-300">
        Nueva sala              
        </button>
        <button wire:click="verModal('editar')" type="button" class="w-full flex items-center justify-center h-28 border border-gray-2 shadow-lg py-2 hover:color-orange-100 bg-orange-200 px-2.5 text-sm hover:shadow-inner text-slate-700 rounded-md hover:bg-orange-100 dark:hover:bg-orange-900 dark:text-slate-400 dark:hover:text-slate-300">
        Editar sala             
        </button>
        <button wire:click="verModal('eliminar')" type="button" class="w-full flex items-center justify-center h-28 border border-gray-2 shadow-lg py-2 hover:color-red-100 bg-red-200 px-2.5 text-sm hover:shadow-inner text-slate-700 rounded-md hover:bg-red-100 dark:hover:bg-red-900 dark:text-slate-400 dark:hover:text-slate-300">
        Eliminar sala             
        </button>
    </div>
    
    
</aside>
    @if($modalVisible=="agregar")
            <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <!-- Modal -->
                <div tabindex="-1" class="z-50 w-full h-screen">
                    <div class="flex items-center justify-center h-full w-full">
                        <div class="relative bg-white w-96 rounded-lg shadow dark:bg-gray-700">
                            <button wire:click="verModal(' ')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Cerrar modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Nueva sala</h3>
                                <form class="space-y-6" wire:ignore>
                                    <div>
                                        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre:</label>
                                        <input type="text" wire:model="miSala.nombre" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                    </div>
                                    <button type="submit" wire:click="agregarSala" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Añadir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif

    @if($modalVisible=="eliminar")
            <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <!-- Modal -->
                <div tabindex="-1" class="z-50 w-full h-screen">
                    <div class="flex items-center justify-center h-full w-full">
                        <div class="relative bg-white w-96 rounded-lg shadow dark:bg-gray-700">
                            <button wire:click="verModal(' ')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Cerrar modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Eliminar sala</h3>
                                <form class="space-y-6" wire:ignore>
                                    <div>
                                        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salas:</label>
                                        <select id="salas" wire:model="miSala.nombre"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @foreach($salas as $sala)
                                                    <option value="{{$sala->nombre}}">{{$sala->nombre}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" wire:click="eliminarSala" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif

    @if($modalVisible=="editar")
            <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <!-- Modal -->
                <div tabindex="-1" class="z-50 w-full h-screen">
                    <div class="flex items-center justify-center h-full w-full">
                        <div class="relative bg-white w-96 rounded-lg shadow dark:bg-gray-700">
                            <button wire:click="verModal(' ')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Cerrar modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Editar sala</h3>                                    
                                    <form class="space-y-6" wire:ignore>
                                    <div>
                                        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sala a editar:</label>
                                        <select id="salas" wire:model="miSala.editar"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @foreach($salas as $sala)
                                                    <option value="{{$sala->nombre}}">{{$sala->nombre}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        <div>
                                            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre nuevo:</label>
                                            <input type="text" wire:model="miSala.nombre2" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                        </div>
                                        <button type="submit" wire:click="editarSala" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Añadir
                                        </button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif
</div>