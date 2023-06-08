<div class="absolute bg-cover h-full w-full text-white bg-opacity-50">
    {{-- <img class="absolute bg-cover bg-blend-screen w-full h-full  brightness-75 -z-10" src="https://img.freepik.com/vector-gratis/fondo-plano-dia-mundial-vegetariano_23-2149639655.jpg?w=1380&t=st=1686138666~exp=1686139266~hmac=ce7b55ad198a479268660b00b3f1904d006446c5b38f0b8a388c7b6a2eb98f2c"/>--}}
    <div class="fixed inset-0 overflow-hidden brightness-75 -z-10">
        <img class="object-cover object-center w-full h-full blur-sm" src="https://img.freepik.com/foto-gratis/mesa-reservada-restaurante_53876-41412.jpg?w=1380&t=st=1686140756~exp=1686141356~hmac=863065cd50da8e732ccecc958e5e0611dde21510014d652cc7ee3e303fee0666" alt="Imagen">
    </div>
    <div class="bg-black bg-opacity-25">

        <form wire:submit.prevent="reservar" class="rounded-full mt-32 mx-auto w-3/5  flex flex-col flex-wrap py-8">
            <div class="flex justify-center mb-8">
                <div>
                    <label for="nombre">Nombre:</label>
                    <input class="rounded-lg border border-gray-200 bg-gray-200 text-black" type="text" wire:model="miReserva.nombre" id="nombre" name="nombre">
                </div>
                <div>
                    <label class="ms-8" for="apellidos">Apellidos:</label>
                    <input class="w-72 rounded-lg border border-gray-200 bg-gray-200 text-black" type="text" wire:model="miReserva.apellidos" id="apellidos" name="apellidos">
                </div>
            </div>
            <div class="flex flex-col flex-wrap justify-center items-center">
                <label for="fecha">Fecha:</label>
                <input class="w-80 mb-8 rounded-lg border border-gray-200 bg-gray-200 text-black" wire:model="miReserva.fecha" type="date" id="fecha" name="fecha">
            </div>


            <div class=" flex flex-col flex-wrap justify-center items-center">
                <div class="flex justify-between mb-8">

                    <div class="w-64 pr-8">
                        <label for="fecha">Número de personas:</label></br>
                        <select wire:model="miReserva.comensales" type="number" id="comensales" name="comensales" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach(range(1, 10) as $personas)
                            <option value="{{$personas}}">{{$personas}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-64 px-8">
                        <label for="fecha">Horas:</label></br>
                        <select id="roles" wire:model="miReserva.hora" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="13:00">13:00</option>
                            <option value="13:15">13:15</option>
                            <option value="13:30">13:30</option>
                            <option value="13:45">13:45</option>
                            <option value="14:00">14:00</option>
                            <option value="14:15">14:15</option>
                            <option value="14:30">14:30</option>
                            <option value="14:45">14:45</option>
                            <option value="15:00">15:00</option>
                            <option value="15:15">15:15</option>
                            <option value="15:30">15:30</option>
                            <option value="20:30">20:30</option>
                            <option value="20:45">20:45</option>
                            <option value="21:00">21:00</option>
                            <option value="21:15">21:15</option>
                            <option value="21:30">21:30</option>
                            <option value="21:45">21:45</option>
                            <option value="22:00">22:00</option>
                            <option value="22:15">22:15</option>
                            <option value="22:30">22:30</option>
                        </select>
                    </div>

                    <div class="w-64 px-8">
                        <label for="fecha">Mesas: </label></br>
                        <select id="roles" wire:model="miReserva.idMesa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($mesas as $mesa)
                            <option value="{{$mesa->id}}">{{$mesa->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class=" flex flex-col flex-wrap justify-center items-center">
                <label for="telefono">Teléfono:</label>
                <input class="w-96 mb-8 rounded-lg border border-gray-200 bg-gray-200 text-black" wire:model="miReserva.telefono" type="tel" id="telefono" name="telefono">
            </div>

            <div class=" flex flex-col flex-wrap justify-center items-center">
                <label for="comments">Anotaciones:</label>
            </div>
            <textarea class="mb-8 h-40 rounded-lg border border-gray-200 bg-gray-200 w-9/12 mx-auto text-black" wire:model="miReserva.anotaciones" id="anotaciones" name="anotaciones"></textarea>

            <div class="text-center">
                <button class="flex justify-center rounded-lg p-4 bg-red-100 w-1/4 mx-auto block text-gray-600" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class=" mr-2 icon icon-tabler icon-tabler-pencil-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 20l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4h4z"></path>
                        <path d="M13.5 6.5l4 4"></path>
                        <path d="M16 18h4m-2 -2v4"></path>
                    </svg>
                    Reservar
                </button>
            </div>
        </form>
    </div>
    @if (session()->has('message'))
    <div class="fixed bottom-4 right-4 z-50">
        <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">{{ session('message') }}</div>
            <button type="button" wire:click="dismissToast" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    <script>
        setTimeout(function() {
            @this.call('dismissToast');
        }, 2000);
    </script>
    @endif