<div>
    <script src='/fullcalendar/dist/index.global.js'></script>
    <script src='/fullcalendar/dist/index.global.min.js'></script>
    <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
    <script src="/tdk/scripts/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/tdk/scripts/bootstrap.js" type="text/javascript"></script>
    <script src="/tdk/scripts/jquery.dataTables.js" type="text/javascript"></script>
    <script src="/tdk/scripts/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



    <div id='calendar' class="bg-white rounded-lg shadow-lg p-4 cursor-pointer"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });
    </script>
    <!--<form wire:submit.prevent="save">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Teléfono:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="comments">Tiene algún comensal intolerancia/alergia:</label>
        <textarea id="comments" name="comments"></textarea>

        <div class="relative flex justify-center items-center gap-5 pt-20">
            <button class="relative flex justify-center items-center bg-white border focus:outline-none shadow text-gray-600 rounded focus:ring ring-gray-200 group">
                <p class="px-4"><ion-icon name="time-outline"></ion-icon> Hora </p>
                <span class="border-l p-2 hover:bg-gray-100">
                            <ion-icon name="chevron-down-outline"></ion-icon>
                        </span>
            </button>
            <div class="absolute hidden group-focus:block top-full min-w-full w-max bg-white shadow-md mt-1 rounded transition">
                <ul class="text-left border rounded">
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >13:00</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >13:15</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >13:30</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >13:45</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >14:00</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >14:15</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >14:30</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >14:45</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >15:00</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >15:15</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >15:30</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >20:30</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >20:45</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >21:00</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >21:15</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >21:30</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >21:45</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >22:00</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >22:15</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >22:30</li>
                </ul>
            </div>
        </div>

        <div class="relative flex justify-center items-center gap-5 pt-20">
            <button class="relative flex justify-center items-center bg-white border focus:outline-none shadow text-gray-600 rounded focus:ring ring-gray-200 group">
                <p class="px-4"> <ion-icon name="accessibility-outline"></ion-icon> Número de personas </p>
                <span class="border-l p-2 hover:bg-gray-100">
                            <ion-icon name="chevron-down-outline"></ion-icon>
                        </span>
            </button>
            <div class="absolute hidden group-focus:block top-full min-w-full w-max bg-white shadow-md mt-1 rounded transition">
                <ul class="text-left border rounded">
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >1 persona</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >2 personas</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >3 personas</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >4 personas</li>
                    <li class="px-4 py-1 hover:bg-gray-100 border-b" >5 personas</li>
                    <li class="px-4 py-1 hover:bg-gray-100 " >6 personas</li>
                </ul>
            </div>
        </div>

        <button type="submit">Reservar</button>
        <button type="submit">Solicitud de grupo</button>
    </form>-->
</div>
<!--
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendario');
        var calendar = new FullCalendar.Calendar(calendarEl, {

            eventMouseEnter: function(info) {
                $(info.el).tooltip({
                    title: info.event.title
                });
            },

            initialView: 'dayGridMonth',
            locale: 'es',
            firstDay: 1,

            monthNames: [
                'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ],

            monthNamesShort: [
                'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
            ],

            dayNames: [
                'Domingo', 'Lunes', 'Martes', 'Miércoles',
                'Jueves', 'Viernes', 'Sábado'
            ],

            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],

            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'dayGridMonth,listMonth'

            },
            buttonText: {
                today: 'Hoy',
                month: 'Mes',
                list: 'Lista',
            },
            events: [
                @foreach($reservas as $reserva) {
                    title: '{{$reserva->hora}} -> {{$reserva->nombre}} con {{$reserva->comensales}} comensales',
                    start: '{{$reserva->fecha}}',
                },
                @endforeach
            ],
            selectable: false,
            editable: false,
            dayMaxEvents: true,

            eventMouseLeave: function(info) {
                var tooltip = info.el._tippy;
                if (tooltip) {
                    tooltip.hide();
                    tooltip.destroy();
                }
            },
        });
        calendar.render();
    });
</script>
-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.6/locale-all.js'></script>