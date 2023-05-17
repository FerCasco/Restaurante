<div class="grid grid-cols-12 h-screen">

    {{--    <!--Comidas-->--}}
    {{--    <div id="left-side-bar"--}}
    {{--         class="transition-transform col-span-2 fixed top-0 left-0 bottom-0 bg-white border-r border-gray-200 pt-7 pb-10 lg:block lg:bottom-0 dark:bg-gray-800 dark:border-gray-700">--}}
    {{--        <script>--}}
    {{--            let sideBar = document.getElementById('left-side-bar');--}}
    {{--        </script>--}}
    {{--        <div class="px-6 flex flex-nowrap flex-row">--}}
    {{--            <a class="inline text-xl font-semibold dark:text-white" href="javascript:;">Buscar--}}
    {{--                Ingredientes</a>--}}
    {{--            <button id="close-left-side-bar-button" type="button" class="h-8 w-8 text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">--}}
    {{--                <svg id="close-left-side-bar-button" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">--}}
    {{--                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>--}}
    {{--                </svg>--}}
    {{--            </button>--}}
    {{--        </div>--}}
    {{--        <nav class="p-6 w-full flex flex-col flex-wrap">--}}
    {{--            <ul class="space-y-1.5">--}}
    {{--                <li>--}}
    {{--                    <input--}}
    {{--                        class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm w-full text-slate-700 rounded-md hover:bg-gray-100 dark:bg-gray-900 dark:text-white "--}}
    {{--                        type="text" wire:model="miComida"--}}
    {{--                        placeholder=" Buscar Comida">--}}
    {{--                </li>--}}
    {{--                <li>--}}
    {{--                    @if($productos!=null)--}}
    {{--                        @foreach($productos as $producto)--}}
    {{--                            <div id="{{$producto['nombre']}}" class="w-full p-4 bg-gray-100" draggable="true" ondragstart="drag(event)">--}}
    {{--                                <div class="flex justify-between">--}}
    {{--                                    <span>{{$producto['nombre']}}</span>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        @endforeach--}}
    {{--                    @endif--}}
    {{--                </li>--}}
    {{--            </ul>--}}
    {{--        </nav>--}}

    <div id="Comidas" class="col-span-3 bg-gray-200 box-border w-full p-4 mb-8 h-full" ondrop="drop(event)"
         ondragover="allowDrop(event)">

        <h1 class="text-center text-3xl italic mt-4 mb-16">Comidas</h1>

        <input
            class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm w-full text-slate-700 rounded-md hover:bg-gray-100 dark:bg-gray-900 dark:text-white mb-8"
            type="text" wire:model="miComida" placeholder=" Buscar comida">
        @if($productos!=null)
            @foreach($productos as $producto)
                <div id="{{$producto['nombre']}}"
                     class="w-38 border-dashed border-gray-200 border-2 flex my-4 items-center gap-x-3.5 bg-white m-5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 cursor-pointer"
                     draggable="true"
                     ondragstart="drag(event)">
                    <div class="flex justify-between">
                        <span class="text-elipsis w-full min-w-full">{{$producto['nombre']}}</span>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!--Menú del día-->
    <div class="bg-blue-50 col-span-9 flex w-full h-full justify-center flex-col px-4 py-8 shadow-lg mb-8">

        <div class="w-3/4 m-auto border-2 border-dashed border-gray-400 p-5">
            <h1 class="text-center text-3xl italic mt-4 mb-4">Menú del día</h1>
            <h4 class="text-center">Entrantes</h4>
            <div id="Entrantes" class="flex-col flex sm:flex-row justify-center bg-gray-300 shadow-inner shadow-blue-50 w-full mb-8 p-2 min-h-fit"
                 ondrop="drop(event)" ondragover="allowDrop(event)">
                @if($menu!=null)
                    @foreach ($menu as $m)
                        @if ($m->plato=="Entrantes")
                            <div id="{{$m->nombre}}"
                                 class="w-full border-dashed border-gray-200 border-2 flex my-4 items-center gap-x-3.5 bg-white m-5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 cursor-pointer"
                                 draggable="true"
                                 ondragstart="drag(event)">
                                <h4>{{$m->nombre}}</h4>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <h4 class="text-center">1º Plato</h4>
            <div id="Primeros" class="flex-col flex sm:flex-row justify-center bg-gray-300 shadow-inner shadow-blue-50 w-full mb-8 p-2 min-h-fit"
                 ondrop="drop(event)"
                 ondragover="allowDrop(event)">
                @if($menu!=null)
                    @foreach ($menu as $m)
                        @if ($m->plato=="Primeros")
                            <div id="{{$m->nombre}}"
                                 class="w-full border-dashed border-gray-200 border-2 flex my-4 items-center gap-x-3.5 bg-white m-5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 cursor-pointer"
                                 draggable="true"
                                 ondragstart="drag(event)">
                                <h4>{{$m->nombre}}</h4>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <h4 class="text-center">2º Plato</h4>
            <div id="Segundos" class="flex-col flex sm:flex-row justify-center bg-gray-300 shadow-inner shadow-blue-50 w-full mb-8 p-2 min-h-fit"
                 ondrop="drop(event)"
                 ondragover="allowDrop(event)">
                @if($menu!=null)
                    @foreach ($menu as $m)
                        @if ($m->plato=="Segundos")
                            <div id="{{$m->nombre}}"
                                 class="w-full border-dashed border-gray-200 border-2 flex my-4 items-center gap-x-3.5 bg-white m-5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 cursor-pointer"
                                 draggable="true"
                                 ondragstart="drag(event)">
                                <h4>{{$m->nombre}}</h4>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <h4 class="text-center">Postres</h4>
            <div id="Postres" class="flex-col flex sm:flex-row justify-center bg-gray-300 shadow-inner shadow-blue-50 w-full mb-8 p-2 min-h-fit"
                 ondrop="drop(event)"
                 ondragover="allowDrop(event)">
                @if($menu!=null)
                    @foreach ($menu as $m)
                        @if ($m->plato=="Postres")
                            <div id="{{$m->nombre}}"
                                 class="w-full border-dashed border-gray-200 border-2 flex my-4 items-center gap-x-3.5 bg-white m-5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 cursor-pointer"
                                 draggable="true"
                                 ondragstart="drag(event)">
                                <h4>{{$m->nombre}}</h4>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>

    </div>
</div>
