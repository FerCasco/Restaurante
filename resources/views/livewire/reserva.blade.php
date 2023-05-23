<div>
    <form class="bg-white mt-36 mx-auto w-3/5 rounded-lg shadow-lg flex flex-col flex-wrap p-8">
        <div class="flex justify-between mb-8">
            <div>
                <label for="nombre">Nombre:</label>
                <input class="rounded-lg border border-gray-200" type="text" wire:model="nombre" id="nombre" name="nombre">
            </div>
            <div>
                <label for="apellidos">Apellidos:</label>
                <input class="w-96 rounded-lg border border-gray-200" type="text" wire:model="apellidos" id="apellidos" name="apellidos">
            </div>
        </div>

        <label for="fecha">Fecha:</label>
        <input  class="w-80 mb-8 rounded-lg border border-gray-200" wire:model="fecha" type="date" id="fecha" name="fecha">

        <div class="flex justify-between mb-8">

            <!--<div class="relative flex justify-center items-center gap-5 pt-20">
                <div class="relative flex justify-center items-center bg-white border focus:outline-none shadow text-gray-600 rounded focus:ring ring-gray-200 group" id="selectPersonas">
                    <p class="px-4"> <ion-icon name="accessibility-outline"></ion-icon> Número de personas </p>
                    <span class="border-l p-2 hover:bg-gray-100">
                                <ion-icon name="chevron-down-outline"></ion-icon>
                            </span>
                </div>
                <div class="absolute hidden group-focus:block top-full min-w-full w-max bg-white shadow-md mt-1 rounded transition" id="opcionesPersonas">
                    <ul class="text-left border rounded">
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >1 persona</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >2 personas</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >3 personas</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >4 personas</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >5 personas</li>
                        <li class="px-4 py-1 hover:bg-gray-100 " >6 personas</li>
                    </ul>
                </div>
            </div>

            <div class="inline-block relative">
                <select class="block appearance-none bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:ring focus:border-gray-500">
                    <option>1 persona</option>
                    <option>2 personas</option>
                    <option>3 personas</option>
                </select>
            </div>


            <div class="relative flex justify-center items-center gap-5">
                <div class="relative flex justify-center items-center bg-white border focus:outline-none shadow text-gray-600 rounded focus:ring ring-gray-200 group" id="selectHoras">
                    <p class="px-4"><ion-icon name="time-outline"></ion-icon> Hora </p>
                    <span class="border-l p-2 hover:bg-gray-100">
                        <ion-icon name="chevron-down-outline"></ion-icon>
                    </span>
                </div>
                <div class="absolute hidden group-focus:block top-full min-w-full w-max bg-white shadow-md mt-1 rounded transition" id="opcionesHoras">
                    <ul class="text-left border rounded h-64 overflow-auto">
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >13:00</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >13:15</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >13:30</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >13:45</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >14:00</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >14:15</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >14:30</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >14:45</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >15:00</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >15:15</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >15:30</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >20:30</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >20:45</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >21:00</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >21:15</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >21:30</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >21:45</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >22:00</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >22:15</li>
                        <li class="px-4 py-1 hover:bg-gray-100 border-b" >22:30</li>
                    </ul>
                </div>
            </div>-->
            <label for="fecha">Número de personas:</label>
            <input  class="w-80 mb-8 rounded-lg border border-gray-200" wire:model="numPersonas" type="number" id="numPersonas" name="numPersonas">

            <label for="fecha">Horas:</label>
            <select id="roles" wire:model="horas"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="13:00">13:00</option> 
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="13:15">13:15</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="13:30">13:30</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="13:45">13:45</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="14:00">14:00</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="14:15">14:15</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="14:30">14:30</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="14:45">14:45</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="15:00">15:00</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="15:15">15:15</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="15:30">15:30</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="20:30">20:30</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="20:45">20:45</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="21:00">21:00</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="21:15">21:15</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="21:30">21:30</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="21:45">21:45</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="22:00">22:00</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="22:15">22:15</option>
                <option class="px-4 py-1 hover:bg-gray-100 border-b" value="22:30">22:30</option>                                
            </select>

            <label for="fecha">Mesas: </label>
            <select id="roles" wire:model="idMesa"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($mesas as $mesa)
                        <option value="{{$mesa->id}}">{{$mesa->nombre}}</option>
                    @endforeach
            </select>
        </div>

        <label for="telefono">Teléfono:</label>
        <input  class="w-96 mb-8 rounded-lg border border-gray-200" wire:model="telefono" type="tel" id="telefono" name="telefono">


        <label for="comments">Anotaciones:</label>
        <textarea class="mb-8 rounded-lg border border-gray-200" wire:model="anotaciones" id="anotaciones" name="anotaciones"></textarea>
        <div class="text-center">
            <button class="mb-8 rounded-lg p-4 bg-red-100 w-1/4 mx-auto block" wire:click="reservar()" type="submit">Reservar</button>
        </div>
</form>
</div>



<script>
    document.getElementById('selectPersonas').addEventListener('click', function() {
        document.getElementById('opcionesPersonas').classList.toggle('hidden');
    });

    document.getElementById('selectHoras').addEventListener('click', function() {
        document.getElementById('opcionesHoras').classList.toggle('hidden');
    });

</script>
