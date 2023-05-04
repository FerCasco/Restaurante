<script src="https://cdn.tailwindcss.com"></script>
@foreach($mesas as $mesa)
    <?php
        $id = $mesa->id;
    ?>
    @if($mesa->idSala==1)
        <button class='px-8 py-3 text-black-500 rounded bg-grey-100 mt-2 border-2 border-black-500'><a href="{{ url('/productos',['idMesa' => $mesa->id]) }}">T{{$mesa->id}}</a></button>
    @endif
    @if($mesa->idSala==2)
        <button class='px-8 py-3 text-black-500 rounded bg-grey-100 mt-2 border-2 border-black-500'>C{{$mesa->id}}</button>
    @endif
    @if($mesa->idSala==3)
        <button class='px-8 py-3 text-black-500 rounded bg-grey-100 mt-2 border-2 border-black-500'>B{{$mesa->id}}</button>
    @endif
@endforeach