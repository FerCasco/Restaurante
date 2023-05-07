<div class="relative">
    <button id="toggleMenu" class="fixed top-0 left-0 z-50 flex items-center justify-center w-20 h-12 text-white bg-neutral-800 rounded-full shadow-md cursor-pointer">
        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <div id="menu" class="mt-4 fixed top-0 left-0 z-40 flex flex-col items-start justify-start w-64 h-full px-4 py-8 bg-white shadow-lg overflow-y-auto">

        <input class="bg-gray-300 mt-10 mb-8" type="text" wire:model="miIngrediente" placeholder=" Buscar ingredientes">

        @foreach($this->mercancias as $mercancia)
            <button class="flex items-center justify-center bg-indigo-500 rounded-full shadow-md cursor-pointer">
                <a href="#"
                   class="block px-4 py-2 text-gray-800 hover:bg-gray-200 rounded-full shadow-md cursor-pointer">{{$mercancia->nombre}}</a>
            </button>
        @endforeach
    </div>

    <div class="relative">

    </div>
</div>


<script>
    var btnMenu = document.getElementById('toggleMenu');

    btnMenu.addEventListener('click', function () {
        document.getElementById('menu').classList.toggle('hidden');
        document.getElementById('menu').classList.toggle('inline');
    });
</script>
