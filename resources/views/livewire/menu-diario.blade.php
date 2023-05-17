<div class="flex">

    <!--Comidas-->
    <div id="Comidas" class="bg-green-100/50 box-border h-screen w-2/5 p-4 mr-4 mb-8" ondrop="drop(event)" ondragover="allowDrop(event)">

        <h1 class="text-center text-3xl italic mt-4 mb-16">Comidas</h1>

        <input class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm w-full text-slate-700 rounded-md hover:bg-gray-100 dark:bg-gray-900 dark:text-white mb-8"
            type="text" wire:model="miComida" placeholder=" Buscar comida">
        @if($productos!=null)
            @foreach($productos as $producto)
                <div id="{{$producto['nombre']}}" class="w-64 p-4 bg-gray-100" draggable="true" ondragstart="drag(event)">
                    <div class="flex justify-between">
                        <span>{{$producto['nombre']}}</span>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!--Menú del día-->
    <div class="bg-emerald-100 right-0 flex flex-col w-full h-screen mb-0 px-4 py-8 shadow-lg overflow-y-auto mb-8">

        <h1 class="text-center text-3xl italic mt-4 mb-4">Menú del día</h1>       

            <div id="Entrantes" class="bg-blue-100 w-full h-80 mb-8" ondrop="drop(event)" ondragover="allowDrop(event)">
                <h4>Entrantes</h4>
                @if($menu!=null)
                    @foreach ($menu as $m)
                        @if ($m->plato=="Entrantes")
                            <div id="{{$m->nombre}}" class="w-64 p-4 bg-gray-100" draggable="true" ondragstart="drag(event)">
                                <h4>{{$m->nombre}}</h4>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div id="Primeros" class="bg-blue-100 w-full h-80 mb-8" ondrop="drop(event)" ondragover="allowDrop(event)">
                <h4>1º Plato</h4>
                @if($menu!=null)
                    @foreach ($menu as $m)
                        @if ($m->plato=="Primeros")
                            <div id="{{$m->nombre}}" class="w-64 p-4 bg-gray-100" draggable="true" ondragstart="drag(event)">
                                <h4>{{$m->nombre}}</h4>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div id="Segundos" class="bg-blue-100 w-full h-80 mb-8" ondrop="drop(event)" ondragover="allowDrop(event)">
                <h4>2º Plato</h4>
                @if($menu!=null)
                    @foreach ($menu as $m)
                        @if ($m->plato=="Segundos")
                            <div id="{{$m->nombre}}" class="w-64 p-4 bg-gray-100" draggable="true" ondragstart="drag(event)">
                                <h4>{{$m->nombre}}</h4>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div id="Postres" class="bg-blue-100 w-full h-80 mb-8" ondrop="drop(event)" ondragover="allowDrop(event)">
                <h4>Postres</h4>
                @if($menu!=null)
                    @foreach ($menu as $m)
                        @if ($m->plato=="Postres")
                            <div id="{{$m->nombre}}" class="w-64 p-4 bg-gray-100" draggable="true" ondragstart="drag(event)">
                                <h4>{{$m->nombre}}</h4>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>

        <!--Papelera de eliminar-->
        <div class="bg-red-100 z-40 absolute bottom-0 right-0 w-48 h-48" ondrop="drop(event)" ondragover="allowDrop(event)">
            <ion-icon wire:ignore name="trash-outline" class="w-48 h-48"></ion-icon>
        </div>

    </div>    
</div>