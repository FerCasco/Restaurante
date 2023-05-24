<div>
    @livewire('menu')
    @livewire('sala')

    <div class="flex justify-center items-center h-screen">
        <div class="right-0 bg-white">
            @foreach(Config::get('languages') as $lang => $language)
                @if ($lang != App::getLocale())
                    <a class="bg-pink-400 p-8" href="{{ route('lang', $lang) }}">{{$language}}</a>
                @endif
            @endforeach
        </div>
    </div>

    @if ($componenteActivo === 'mesa')
        <div>
            @livewire('mesa',['idSala' => $idSala])
        </div>
    @endif
    @if ($componenteActivo === 'mesaAtender')
        <div>
            @livewire('mesa-atender',['idMesa' => $idMesa])
        </div>
    @endif
</div>
