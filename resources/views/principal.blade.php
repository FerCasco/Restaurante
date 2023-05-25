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

    </script><script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
