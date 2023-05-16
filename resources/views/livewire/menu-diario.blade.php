<div class="flex">
    <div class="bg-purple-100 box-border h-screen w-2/5 p-4 border-4">
        @foreach($productos as $producto)
            <div id="{{$producto['nombre']}}" class="w-64 p-4 bg-gray-100" draggable="true" ondragstart="drag(event)">
                <div class="flex justify-between">
                    <span>{{$producto['nombre']}}</span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="bg-green-100 mt-4 top-0 right-0 z-40 flex flex-col items-start justify-start w-full h-screen px-4 py-8  shadow-lg overflow-y-auto">
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
    </div>
</div>

