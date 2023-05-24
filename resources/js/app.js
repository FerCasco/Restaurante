import Alpine from 'alpinejs';
import('preline')
window.Alpine = Alpine;

Alpine.start();

@section('scriptDrag&drop')
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            var destino = ev.target.id;
            ev.target.appendChild(document.getElementById(data));

            var datos = {
                data: data,
                destino: destino
            };
            Livewire.emit('InteractuarMenu', datos);
        }
    </script>
@endsection