<div class="absolute bg-cover h-full w-full" style="background-image: url('/img/comida-ingredientes.jpg');">
    <!--<div class="absolute h-full w-full bg-white opacity-25">
    </div>-->
        <form wire:submit.prevent="reservar" class="rounded-full bg-white mt-36 mx-auto w-3/5 rounded-lg shadow-lg flex flex-col flex-wrap  p-8 ">
            <div class="flex justify-center mb-8 mt-6">
                <div>
                    <label for="nombre">Nombre:</label>
                    <input class="rounded-lg border border-gray-200 bg-gray-200" type="text" wire:model="miReserva.nombre" id="nombre" name="nombre">
                </div>
                <div >
                    <label class="ms-8" for="apellidos">Apellidos:</label>
                    <input class="w-72 rounded-lg border border-gray-200 bg-gray-200" type="text" wire:model="miReserva.apellidos" id="apellidos" name="apellidos">
                </div>
            </div>
            <div class="flex flex-col flex-wrap justify-center items-center">
            <label for="fecha">Fecha:</label>
            <input  class="w-80 mb-8 rounded-lg border border-gray-200 bg-gray-200" wire:model="miReserva.fecha" type="date" id="fecha" name="fecha">
            </div>

            <div class=" flex flex-col flex-wrap justify-center items-center">
                <div class="flex justify-between mb-8">       

                    <div class="w-64 pr-8">
                        <label for="fecha">Número de personas:</label></br>
                        <select wire:model="miReserva.comensales" type="number" id="comensales" name="comensales"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach(range(1, 10) as $personas)
                                <option value="{{$personas}}">{{$personas}}</option> 
                            @endforeach
                        </select>
                    </div>

                    <div class="w-64 px-8">
                        <label for="fecha">Horas:</label></br>
                        <select id="roles" wire:model="miReserva.hora"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                    <select id="roles" wire:model="miReserva.idMesa"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($mesas as $mesa)
                                <option value="{{$mesa->id}}">{{$mesa->nombre}}</option>
                            @endforeach
                    </select>
                    </div>
                </div>
            </div>

            <div class=" flex flex-col flex-wrap justify-center items-center">
                <label for="telefono">Teléfono:</label>
                <input  class="w-96 mb-8 rounded-lg border border-gray-200 bg-gray-200" wire:model="miReserva.telefono" type="tel" id="telefono" name="telefono">
            </div>

            <div class=" flex flex-col flex-wrap justify-center items-center">
                <label for="comments">Anotaciones:</label>
            </div>
            <textarea class="mb-8 h-48 rounded-lg border border-gray-200 bg-gray-200 w-10/12 mx-auto" wire:model="miReserva.anotaciones" id="anotaciones" name="anotaciones"></textarea>
            
            <div class="text-center">
                <button class="mb-8 rounded-lg p-4 bg-red-100 w-1/4 mx-auto block" type="submit">Reservar</button>
            </div>
        </form>
    
</div>

