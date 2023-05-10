<div drag-root class="bg-purple-100 box-border h-32 w-82 p-4 border-4">
    <ul class="overflow-hidden rounded shadow divide-y">
        @foreach($productos as $producto)
            <li drag-item="{{ $producto['id']}}" draggable="true" wire:key="{{$producto->id}}" class="w-64 p-4 bg-gray-100">
                {{$producto->nombre}}
            </li>
        @endforeach
    </ul>
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
            e.target.classList.remove(bg-yellow-100)

            //get the dragging element
            let draggingEl= root.querySelector('[dragging]')
            //insert it before the drop target
            e.target.before(draggingEl)

            //Referesh the livewire component
            let component=Livewire.find(
                e.target.closest('[wire\\:id]').getAttribute('wire:id')
            )

            let orderIds=Array.from(root.querySelectorAll('[drag-item]')).map(itemEl => itemEl.getAttribute('drag-item'))
            component.call('reorder', orderIds)
        })

        el.addEventListener('dragenter', e => {
            e.target.classList.add(bg-yellow-100)
            console.log('enter')
        })

        el.addEventListener('dragover', e => {
            //console.log('over')
            e.preventDefault()
        })

        el.addEventListener('dragleave', e => {
            e.target.classList.remove(bg-yellow-100)
            console.log('leave')
        })

        el.addEventListener('dragend', e => {
            console.log('end')
            e.target.setAttribute('dragging')
        })
    })

</script>
