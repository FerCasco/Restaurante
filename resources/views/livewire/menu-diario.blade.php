<div class="grid grid-cols-12 h-screen justify-center items-center gap-16 gap-y-16">

    <!--Comidas-->
    <div id="Comidas" class="col-span-3 bg-gray-200 shadow-2xl mt-20 ml-8 h-5/6 bg-cover text-white rounded-xl box-border w-full p-4 mb-8" ondrop="drop(event)" style="background-image: url('https://img.freepik.com/foto-gratis/tabla-cortar-madera-rodeada-platos-pasta-e-ingredientes-mesa_23-2148246798.jpg');"
         ondragover="allowDrop(event)">

        <div class="bg-gray-100 bg-opacity-75 rounded-lg">
            <h1 class="text-center text-3xl shadow-2xl italic mt-4 mb-16 text-gray-800">Comidas</h1>
        </div>

        <input
            class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm w-full text-slate-700 rounded-md hover:bg-gray-100 dark:bg-gray-900 dark:text-white mb-8"
            type="text" wire:model="miComida" placeholder=" Buscar comida">
        @if($productos!=null)
            @foreach($productos as $producto)
                <div id="{{$producto['nombre']}}"
                     class="w-38 shadow-lg border border-gray-200 flex my-4 items-center gap-x-3.5 bg-white m-5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 cursor-pointer"
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
    <div class="to-pink-500 col-span-9 flex shadow-2xl rounded-xl h-5/6 w-5/6 mt-20 ml-8 justify-center flex-col px-4 py-8 mb-8 text-white" style="background-image: url('https://st2.depositphotos.com/1031174/6685/i/450/depositphotos_66851571-stock-photo-blackboard.jpg');">

        <div class="w-3/4 m-auto border  rounded-lg p-5">
            <h1 class="text-center text-3xl italic mt-4 mb-4">Menú del día</h1>
            <h4 class="text-center">Entrantes</h4>
            <div id="Entrantes" class="flex-col flex sm:flex-row rounded-xl justify-center bg-gray-300 shadow-inner shadow-blue-50 w-full mb-8 p-2 min-h-fit"
                 ondrop="drop(event)" ondragover="allowDrop(event)">
                @if($menu!=null)
                    @foreach ($menu as $m)
                        @if ($m->plato=="Entrantes")
                            <div id="{{$m->nombre}}"
                                 class="w-full shadow-lg border border-gray-200 flex my-4 items-center gap-x-3.5 bg-white m-5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 cursor-pointer"
                                 draggable="true"
                                 ondragstart="drag(event)">
                                <h4>{{$m->nombre}}</h4>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <h4 class="text-center">1º Plato</h4>
            <div id="Primeros" class="flex-col flex sm:flex-row  rounded-xl justify-center bg-gray-300 shadow-inner shadow-blue-50 w-full mb-8 p-2 min-h-fit"
                 ondrop="drop(event)"
                 ondragover="allowDrop(event)">
                @if($menu!=null)
                    @foreach ($menu as $m)
                        @if ($m->plato=="Primeros")
                            <div id="{{$m->nombre}}"
                                 class="w-full shadow-lg border-gray-200 border-2 flex my-4 items-center gap-x-3.5 bg-white m-5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 cursor-pointer"
                                 draggable="true"
                                 ondragstart="drag(event)">
                                <h4>{{$m->nombre}}</h4>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <h4 class="text-center">2º Plato</h4>
            <div id="Segundos" class="flex-col flex sm:flex-row rounded-xl justify-center bg-gray-300 shadow-inner shadow-blue-50 w-full mb-8 p-2 min-h-fit"
                 ondrop="drop(event)"
                 ondragover="allowDrop(event)">
                @if($menu!=null)
                    @foreach ($menu as $m)
                        @if ($m->plato=="Segundos")
                            <div id="{{$m->nombre}}"
                                 class="w-full shadow-lg border-gray-200 border-2 flex my-4 items-center gap-x-3.5 bg-white m-5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 cursor-pointer"
                                 draggable="true"
                                 ondragstart="drag(event)">
                                <h4>{{$m->nombre}}</h4>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <h4 class="text-center">Postres</h4>
            <div id="Postres" class="flex-col flex sm:flex-row rounded-xl justify-center bg-gray-300 shadow-inner shadow-blue-50 w-full mb-8 p-2 min-h-fit"
                 ondrop="drop(event)"
                 ondragover="allowDrop(event)">
                @if($menu!=null)
                    @foreach ($menu as $m)
                        @if ($m->plato=="Postres")
                            <div id="{{$m->nombre}}"
                                 class="w-full shadow-lg border-gray-200 border-2 flex my-4 items-center gap-x-3.5 bg-white m-5 py-2 px-2.5 text-sm text-slate-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 cursor-pointer"
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
