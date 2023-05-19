<div>
    <form wire:submit.prevent="save">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Teléfono:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="comments">Tiene algún comensal intolerancia/alergia:</label>
        <textarea id="comments" name="comments"></textarea>

        <div class="relative flex justify-center items-center gap-5 pt-20">
            <button class="relative flex justify-center items-center bg-white border focus:outline-none shadow text-gray-600 rounded focus:ring ring-gray-200 group">
                <p class="px-4"><ion-icon name="time-outline"></ion-icon> Hora </p>
                <span class="border-l p-2 hover:bg-gray-100">
                            <ion-icon name="chevron-down-outline"></ion-icon>
                        </span>
            </button>
            <div class="absolute hidden group-focus:block top-full min-w-full w-max bg-white shadow-md mt-1 rounded transition">
                <ul class="text-left border rounded">
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

        <div class="relative flex justify-center items-center gap-5 pt-20">
            <button class="relative flex justify-center items-center bg-white border focus:outline-none shadow text-gray-600 rounded focus:ring ring-gray-200 group">
                <p class="px-4"> <ion-icon name="accessibility-outline"></ion-icon> Número de personas </p>
                <span class="border-l p-2 hover:bg-gray-100">
                            <ion-icon name="chevron-down-outline"></ion-icon>
                        </span>
            </button>
            <div class="absolute hidden group-focus:block top-full min-w-full w-max bg-white shadow-md mt-1 rounded transition">
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

        <button type="submit">Reservar</button>
        <button type="submit">Solicitud de grupo</button>
    </form>
</div>