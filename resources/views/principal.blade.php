    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/modal-vanilla/dist/modal.min.css">

    <title>Restaurante</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
</head>

<body class="bg-gray-300 dark:bg-gray-700 h-screen w-full">

    <header class="bg-white dark:bg-gray-800 shadow">
        <nav class="flex items-center justify-between py-4 px-8">
            <a class="text-xl font-semibold text-gray-800 dark:text-white" href="#">Logo</a>

            <ul class="flex items-center space-x-4">
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">{{ __('auth.lenguaje') }}
                        <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            @foreach(Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                            <li>
                                <a href="{{ route('lang', $lang) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $language }}</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <main class="p-10">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-5">
            @foreach(\App\Models\User::all() as $trabajador)
            <div class="w-5/6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-1">
                <a href="{{url('login')}}">
                    <img class="rounded-t-lg w-full h-48 object-cover" src="data:image/jpeg;base64,{{ base64_encode($trabajador->foto) }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="{{url('login')}}" class="flex justify-center">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$trabajador->name}}</h5>
                    </a>
                    <div class="flex justify-center">
                        @if($trabajador->idRol != 3)
                        <a href="#" class="inline-flex justify-center items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="displayEnlargedImage('{{ $trabajador->imagenQrDataUrl }}')">
                            {{ __('auth.qr') }}
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>
    <div id="enlarged-image-container" class="rounded-lg fixed inset-0 flex items-center justify-center hidden">
        <div class="bg-white p-8 max-w-md mx-auto border-white rounded-3xl">
            <img id="enlarged-image" class="w-full" src="" alt="Enlarged Image">
        </div>
    </div>

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3"></script>

    <script>
        function displayEnlargedImage(src) {
            const container = document.getElementById('enlarged-image-container');
            const image = document.getElementById('enlarged-image');

            image.src = src;
            container.classList.remove('hidden');

            // Hide the enlarged image when clicking outside of it
            container.addEventListener('click', function(event) {
                if (event.target === container) {
                    container.classList.add('hidden');
                }
            });
        }
    </script>
</body>

</html>
