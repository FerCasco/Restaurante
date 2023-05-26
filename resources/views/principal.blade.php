<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            @guest
                @if (Route::has('login'))
                <li>
                    <a class="px-4 py-2 text-gray-800 dark:text-white hover:text-blue-500 hover:bg-blue-100 rounded" href="{{ route('login') }}">{{ __('auth.iniciarSesion') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li>
                    <a class="px-4 py-2 text-gray-800 dark:text-white hover:text-blue-500 hover:bg-blue-100 rounded" href="{{ route('register') }}">{{ __('auth.registrarse') }}</a>
                </li>
                @endif                
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Dropdown <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                        </li>
                        </ul>
                        <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Sign out</a>
                        </div>
                    </div>
                </li>
            @else
                <li class="relative">
                <a class="px-4 py-2 text-gray-800 dark:text-white hover:text-blue-500 hover:bg-blue-100 rounded" href="#" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>

                <ul class="absolute right-0 mt-2 space-y-2 bg-white dark:bg-gray-800 rounded-md shadow-lg hidden">
                    <li>
                    <a class="block px-4 py-2 text-gray-800 dark:text-white hover:text-blue-500 hover:bg-blue-100" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('auth.cerrarSesion') }}
                    </a>
                    </li>
                </ul>
                </li>
            @endguest
            </ul>
        </nav>
    </header>
    <main class="py-10">
        <div class="flex justify-center items-center h-screen">
            <div class="right-0 bg-white rounded-lg shadow-lg p-8">
                @foreach(Config::get('languages') as $lang => $language)
                    @if ($lang != App::getLocale())
                        <a class="block bg-pink-400 text-white py-4 px-6 rounded-lg mb-4 hover:bg-pink-500 hover:text-white" href="{{ route('lang', $lang) }}">{{ $language }}</a>
                    @endif
                @endforeach
            </div>
        </div>
    <main>

    @livewireScripts

    <script>


/*
* $targetEl: required
* $triggerEl: required
* options: optional
*/


            // set the dropdown menu element
    const $targetEl = document.getElementById('dropdownMenu');

    // set the element that trigger the dropdown menu on click
    const $triggerEl = document.getElementById('dropdownButton');

    // options with default values
    const options = {
    placement: 'bottom',
    triggerType: 'click',
    offsetSkidding: 0,
    offsetDistance: 10,
    delay: 300,
    onHide: () => {
        console.log('dropdown has been hidden');
    },
    onShow: () => {
        console.log('dropdown has been shown');
    },
    onToggle: () => {
        console.log('dropdown has been toggled');
    }
    };

    const dropdown = new Dropdown($targetEl, $triggerEl, options);

// show the dropdown menu
dropdown.show();

// hide the dropdown menu
dropdown.hide();

// toggle the dropdown menu
dropdown.toggle();

// check if dropdown is visible/open
dropdown.isVisible();

    </script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    </script><script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
