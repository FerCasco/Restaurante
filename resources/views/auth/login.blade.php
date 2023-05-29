<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    @dd($contacto)
    @if($idTrabajador!=null)
        @php
            //$trabajador = \App\Models\User::find($idTrabajador);

            $nombreArchivo = uniqid() . '.png';
            // Ruta donde se guardará la imagen en una carpeta accesible desde la web
            $rutaImagen = public_path('img/' . $nombreArchivo);

            // Guardar el contenido del campo LONGBLOB como archivo PNG

            file_put_contents($rutaImagen, $trabajador->imagenQr);

        @endphp
        <img src="{{ asset('img/' . $nombreArchivo) }}" alt="Imagen QR">
    @else
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('auth.email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                              required autofocus autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('auth.contraseña')"/>

                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="current-password"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                           name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('auth.recordarme') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                       href="{{ route('password.request') }}">
                        {{ __('auth.olvidarCont') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('auth.iniciarSesion') }}
                </x-primary-button>
            </div>
        </form>
    @endif
</x-guest-layout>
