<div>
    <aside class="absolute shadow-2xl left-0 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 "
       aria-label="Sidebar">
    <div class="h-full pt-8 px-3 py-4 flex flex-col justify-between overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <div class="overflow-y-auto">
            <ul class="space-y-2 font-medium">
                @foreach($salas as $sala)
                    <button wire:click="$emit('enviarSalaId',{{$sala->id}})" type="button" class=" w-full flex items-center justify-center h-28 border border-gray-2 shadow-lg py-2 hover:color-gray-100 bg-white px-2.5 text-sm hover:shadow-inner text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300">
                        <li>
                            <!--{{__('welcome.' . $sala->nombre)}}-->
                            {{$sala->nombre}}
                        </li>
                    </button>
                @endforeach
            </ul>

        </div>
        <div class="mt-8">
            <button wire:click="verModal('agregar')" type="button" class="w-full flex transition-all items-center justify-center border border-lime-500 shadow-lg hover:bg-lime-400 bg-lime-200 px-2.5 text-sm hover:shadow-inner text-slate-700 rounded-md dark:hover:bg-lime-900 dark:text-slate-400 dark:hover:text-slate-300 py-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M9 12h6"></path>
                    <path d="M12 9v6"></path>
                    <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                </svg>
                Nueva sala
            </button>
            <button wire:click="verModal('editar')" type="button" class="w-full flex transition-all items-center justify-center mt-3 border border-orange-500 shadow-lg hover:bg-orange-400 bg-orange-200 px-2.5 text-sm hover:shadow-inner text-slate-700 rounded-md dark:hover:bg-orange-900 dark:text-slate-400 dark:hover:text-slate-300 py-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                    <path d="M13.5 6.5l4 4"></path>
                </svg>
                Editar sala
            </button>
            <button wire:click="verModal('eliminar')" type="button" class="w-full transition-all flex items-center justify-center mt-3 border border-red-500 shadow-lg hover:bg-red-400 bg-red-200 px-2.5 text-sm hover:shadow-inner text-slate-700 rounded-md dark:hover:bg-red-900 dark:text-slate-400 dark:hover:text-slate-300 py-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 7h16"></path>
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                    <path d="M10 12l4 4m0 -4l-4 4"></path>
                </svg>
                Eliminar sala
            </button>
        </div>
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
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white"> Nueva sala</h3>
                                <form class="space-y-6" wire:ignore>
                                    <div>
                                        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre:</label>
                                        <input type="text" wire:model="miSala.nombre" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                    </div>
                                    <button type="submit" wire:click="agregarSala" class="w-full flex justify-center text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 icon icon-tabler icon-tabler-square-rounded-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M9 12h6"></path>
                                            <path d="M12 9v6"></path>
                                            <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                                        </svg>
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
                                    <button type="submit" wire:click="eliminarSala" class="w-full flex justify-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 7h16"></path>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                            <path d="M10 12l4 4m0 -4l-4 4"></path>
                                        </svg>
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
                                        <select id="salasEditar" wire:model="idSala"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @foreach($salas as $sala)
                                                    <option value="{{$sala->id}}">{{$sala->nombre}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        <div>
                                            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nuevo nombre:</label>
                                            <input type="text" wire:model="nombreSala" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                        </div>
                                        <button type="submit" wire:click="editarSala" class="w-full text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                                            Editar
                                        </button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif

    <script>
        function openModal(nombre){
            let edit = document.getElementById('toast-warning');
            let add = document.getElementById('toast-add');
            let del = document.getElementById('toast-delete');
            switch (nombre){
                case 'Edit':
                    edit.classList.remove('-translate-y-full');
                    edit.classList.add('translate-y-28');
                    break;
                case 'Add':
                    add.classList.remove('-translate-y-full');
                    add.classList.add('translate-y-28');
                    break;
                case 'Delete':
                    del.classList.remove('-translate-y-full');
                    del.classList.add('translate-y-28');
                    break;
            }
        }
    </script>
</div>
