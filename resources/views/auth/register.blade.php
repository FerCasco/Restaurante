<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('auth.nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('auth.email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('auth.contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('auth.confirmadoCont')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>



        <div class="mb-4">
            <label for="idRol" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Rol:</label>
            <select name="idRol" id="idRol" class="form-select block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                <option value="2">Cocinero</option>
                <option value="1">Camarero</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="apellidos" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" class="form-input block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div class="mb-4">
            <label for="telefono" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-input block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div class="mb-4">
            <label for="dni" class="block font-medium text-sm text-gray-700 dark:text-gray-300">DNI:</label>
            <input type="text" name="dni" id="dni" class="form-input block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div class="mb-4">
            <label for="codigoQr" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Código QR:</label>
            <input type="text" name="codigoQr" id="codigoQr" class="form-input block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div class="mb-4">
            <label for="qrImagen" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Imagen del QR:</label>
            <input type="file" name="qrImagen" id="qrImagen" class="form-input block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
        </div>







        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('auth.existe') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('auth.registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
