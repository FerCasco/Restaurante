@foreach($productos as $producto)
<button class='px-8 py-3 text-black-500 rounded bg-grey-100 mt-2 border-2 border-black-500'>
    <a>
        {{$producto->nombre}}
    </a>
</button>

@endforeach