<nav class="flex justify-center bg-white shadow-lg sm:mt-4">
    <ul class="text-lg font-semibold mb-4">
        @foreach($salas as $sala)
            <li class="border border-gray-500 rounded-md p-6 mr-6 inline-block">
                <button wire:click="$emit('enviarSalaId',{{$sala->id}})" type="button">{{$sala->nombre}}</button>
            </li>
        @endforeach
    </ul>
</nav>
