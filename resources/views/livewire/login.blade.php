<div>
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
        </div>
    </div>
    @if($registerForm)
    <form>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Name :</label>
                    <input type="text" wire:model="name" class="form-control">
                    @error('name') <span id="listener" class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>  :</label>
                    <input type="text" wire:model="email" class="form-control">
                    @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Password :</label>
                    <input type="password" wire:model="password" class="form-control">
                    @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button class="btn text-white btn-success" wire:click.prevent="registerStore">Register</button>
            </div>
            <div class="col-md-12">
                <a class="text-primary" wire:click.prevent="register"><strong>Login</strong></a>
            </div>
        </div>
    </form>
    @else
    <div class="bg-white-400 h-screen overflow-hidden flex items-center justify-center">
        <div class="bg-white lg:w-5/12 md:6/12 w-10/12 rounded-2xl backdrop-blur-sm bg-opacity-75">
            <div class="bg-indigo-400 border border-indigo-600 shadow-lg absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-full p-4 md:p-8">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="#FFF">
                    <path
                        d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/>
                </svg>
            </div>
            <form class="p-12 md:p-24">
                <div class="flex items-center text-lg mb-6 md:mb-8">
{{--                    <svg class="absolute ml-3" width="24" viewBox="0 0 24 24">--}}
{{--                        <path d="M20.822 18.096c-3.439-.794-6.64-1.49-5.09-4.418 4.72-8.912 1.251-13.678-3.732-13.678-5.082 0-8.464 4.949-3.732 13.678 1.597 2.945-1.725 3.641-5.09 4.418-3.073.71-3.188 2.236-3.178 4.904l.004 1h23.99l.004-.969c.012-2.688-.092-4.222-3.176-4.935z" />--}}
{{--                    </svg>--}}
                    <svg xmlns="http://www.w3.org/2000/svg" class=" absolute ml-3 icon icon-tabler icon-tabler-at" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                        <path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28"></path>
                    </svg>
                    <input type="text" wire:model="email" placeholder="{{__('auth.email')}}" class="rounded-lg shadow-lg bg-gray-200 pl-12 py-2 md:py-4 focus:outline-none w-full">
                    @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="flex items-center text-lg mb-6 md:mb-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute ml-3 icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path>
                        <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                        <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                    </svg>
                    <input type="password" wire:model="password" placeholder="{{__('auth.contraseña')}}" class="rounded-lg shadow-lg bg-gray-200 pl-12 py-2 md:py-4 focus:outline-none w-full">
                    @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <button class="bg-indigo-400 hover:bg-indigo-600 border border-indigo-700 shadow-lg hover:shadow-inner font-medium p-2 md:p-4 text-white w-full rounded-xl" wire:click.prevent="login" >Iniciar Sesión</button>
            </form>
        </div>
    </div>

    @endif
    <script>
        document.getElementById('listener').addEventListener(function () {
            document.getElementById('divPrueba').classList.remove('hidden');
        })
    </script>
</div>
