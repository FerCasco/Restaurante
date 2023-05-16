<div class="flex">

    <div drag-root="reorder" class="bg-purple-100 box-border h-screen w-2/5 p-4 border-4">

        @foreach($productos as $producto)
            <div drag-item="{{$producto['id']}}" draggable="true" wire:key="{{$producto['id']}}" class="w-64 p-4 bg-gray-100">
                <div class="flex justify-between">
                    <span>{{$producto['nombre']}}</span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="bg-green-100 mt-4 top-0 right-0 z-40 flex flex-col items-start justify-start w-full h-screen px-4 py-8  shadow-lg overflow-y-auto">
        @if($menu!=null)
            <div id="Entrantes" drag-root class="bg-blue-100 w-full h-80">
                <h4>Entrantes</h4>
                @foreach ($menu as $m)
                    @if ($m->plato=="Entrantes")
                        <div id="{{$m->nombre}}" draggable="true">
                            <h4>{{$m->id}}</h4>
                        </div>
                    @endif
                @endforeach
            </div>
            <div id="Primeros">
                <h4>1º Plato</h4>
                @foreach ($menu as $m)
                    @if ($m->plato=="Primeros")
                        <div id="{{$m->nombre}}" draggable="true">
                            <h4>{{$m->id}}</h4>
                        </div>
                    @endif
                @endforeach
            </div>
            <div id="Segundos">
                <h4>2º Plato</h4>
                @foreach ($menu as $m)
                    @if ($m->plato=="Segundos")
                        <div id="{{$m->nombre}}" draggable="true">
                            <h4>{{$m->id}}</h4>
                        </div>
                    @endif
                @endforeach
            </div>
            <div id="Postres">
                <h4>Postres</h4>
                @foreach ($menu as $m)
                    @if ($m->plato=="Postres")
                        <div id="{{$m->nombre}}" draggable="true">
                            <h4>{{$m->id}}</h4>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</div>

<script>

    let root= document.querySelector('[drag-root]')

    root.querySelectorAll('[drag-item]').forEach(el => {

        el.addEventListener('dragstart', e => {
            e.dataTransfer.setData('text/plain', '·the-id')
            console.log('start')
            e.target.setAttribute('dragging',true)
        })

        el.addEventListener('drop', e => {
            console.log('drop')
            e.target.classList.remove("bg-yellow-100")

            //get the dragging element
            let draggingEl= root.querySelector('[dragging]')
            //insert it before the drop target
            e.target.before(draggingEl)

            //Referesh the livewire component

            let component = @this

            let orderIds=Array.from(root.querySelectorAll('[drag-item]')).map(itemEl => itemEl.getAttribute('drag-item'))

            let method=root.getAttribute('drag-root')
            component.call(method, orderIds)
        })

        el.addEventListener('dragenter', e => {
            e.target.classList.add("bg-yellow-100")
            console.log('enter')
        })

        el.addEventListener('dragover', e => {
            //console.log('over')
            e.preventDefault()
        })

        el.addEventListener('dragleave', e => {
            e.target.classList.remove("bg-yellow-100")
            console.log('leave')
        })

        el.addEventListener('dragend', e => {
            console.log('end')
            e.target.setAttribute('dragging')
        })
    })
</script>
