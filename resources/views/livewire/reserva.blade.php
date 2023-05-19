<div>
    <div wire:submit.prevent="reservar" class="bg-white mt-36 mx-auto w-3/5 rounded-lg shadow-lg flex flex-col flex-wrap p-8">
        <div class="flex justify-between mb-8">
            <div>
                <label for="nombre">Nombre:</label>
                <input class="rounded-lg" type="text" id="nombre" name="nombre">
            </div>
            <div>
                <label for="apellidos">Apellidos:</label>
                <input class="w-96 rounded-lg" type="text" id="apellidos" name="apellidos">
            </div>
        </div>

        <label for="fecha">Fecha:</label>
        <input  class="w-80 mb-8 rounded-lg" type="date" id="fecha" name="fecha">

        <div class="flex justify-between mb-8">
            
            <div class="relative flex justify-center items-center gap-5 pt-20">
                <button class="relative flex justify-center items-center bg-white border focus:outline-none shadow text-gray-600 rounded focus:ring ring-gray-200 group" id="selectPersonas">
                    <p class="px-4"> <ion-icon name="accessibility-outline"></ion-icon> Número de personas </p>
                    <span class="border-l p-2 hover:bg-gray-100">
                                <ion-icon name="chevron-down-outline"></ion-icon>
                            </span>
                </button>
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
                <button class="relative flex justify-center items-center bg-white border focus:outline-none shadow text-gray-600 rounded focus:ring ring-gray-200 group" id="selectHoras">
                    <p class="px-4"><ion-icon name="time-outline"></ion-icon> Hora </p>
                    <span class="border-l p-2 hover:bg-gray-100">
                        <ion-icon name="chevron-down-outline"></ion-icon>
                    </span>
                </button>
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
            </div>
        </div>

        <label for="telefono">Teléfono:</label>
        <input  class="w-96 mb-8 rounded-lg" type="tel" id="telefono" name="telefono">        


        <label for="comments">Anotaciones:</label>
        <textarea class="mb-8 rounded-lg" id="comments" name="comments"></textarea>  
        <div class="text-center">
            <button class="mb-8 rounded-lg p-4 bg-red-100 w-1/4 mx-auto block" type="submit">Reservar</button>
        </div>
</div>
</div>



<script>
    document.getElementById('selectPersonas').addEventListener('click', function() {
        document.getElementById('opcionesPersonas').classList.toggle('hidden');
    }); 

    document.getElementById('selectHoras').addEventListener('click', function() {
        document.getElementById('opcionesHoras').classList.toggle('hidden');
    }); 

</script>