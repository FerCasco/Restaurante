<div>
    <div class="fixed inset-0 overflow-hidden brightness-50 -z-10">
        <img class="object-cover object-center w-full h-full blur-sm" src="https://img.freepik.com/foto-gratis/mujer-revisando-calendario_53876-13451.jpg?w=1060&t=st=1686164936~exp=1686165536~hmac=1574e5814aa0f660c1ad2847bb992038f1679f8a5d5b5a49c2ad43659e117156" alt="Imagen">
    </div>
    <div>

        @if ($componenteActivo == null)

        <!--Calendario-->

            <script src='/fullcalendar/dist/index.global.js'></script>
            <script src='/fullcalendar/dist/index.global.min.js'></script>
            <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
            <script src="/tdk/scripts/jquery.min.js" type="text/javascript"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script src="/tdk/scripts/bootstrap.js" type="text/javascript"></script>
            <script src="/tdk/scripts/jquery.dataTables.js" type="text/javascript"></script>
            <script src="/tdk/scripts/dataTables.bootstrap.js" type="text/javascript"></script>
            <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


            <div id="toast-simple" class="absolute -translate-x-full transition-all top-5 flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
{{--                <svg aria-hidden="true" class="w-5 h-5 text-blue-600 dark:text-blue-500" focusable="false" data-prefix="fas" data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M511.6 36.86l-64 415.1c-1.5 9.734-7.375 18.22-15.97 23.05c-4.844 2.719-10.27 4.097-15.68 4.097c-4.188 0-8.319-.8154-12.29-2.472l-122.6-51.1l-50.86 76.29C226.3 508.5 219.8 512 212.8 512C201.3 512 192 502.7 192 491.2v-96.18c0-7.115 2.372-14.03 6.742-19.64L416 96l-293.7 264.3L19.69 317.5C8.438 312.8 .8125 302.2 .0625 289.1s5.469-23.72 16.06-29.77l448-255.1c10.69-6.109 23.88-5.547 34 1.406S513.5 24.72 511.6 36.86z"></path></svg>--}}
                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-blue-500 icon-tabler icon-tabler-clock-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M21 12a9 9 0 1 0 -9.972 8.948c.32 .034 .644 .052 .972 .052"></path>
                    <path d="M12 7v5l2 2"></path>
                    <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path>
                </svg>
                <div id='text' class="pl-4 text-sm font-normal"></div>
                <svg id='close' xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x text-sm cursor-pointer pl-2" onclick="dismiss()" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M18 6l-12 12"></path>
                    <path d="M6 6l12 12"></path>
                </svg>
            </div>

            <div id="toast-simple." class="absolute -translate-x-96 transition-all top-5 left-full mr-8 flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-[#9EFF37] icon-tabler icon-tabler-alert-square-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M19 2a3 3 0 0 1 2.995 2.824l.005 .176v14a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-14a3 3 0 0 1 2.824 -2.995l.176 -.005h14zm-6.99 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor"></path>
                </svg>
                <div id='text.' class="text-sm font-normal"> Mañana </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-[#FFD837] icon-tabler icon-tabler-alert-square-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M19 2a3 3 0 0 1 2.995 2.824l.005 .176v14a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-14a3 3 0 0 1 2.824 -2.995l.176 -.005h14zm-6.99 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor"></path>
                </svg>
                <div id='text.' class="pl-4 text-sm font-normal"> Tarde </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-[#37FFD2] icon-tabler icon-tabler-alert-square-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M19 2a3 3 0 0 1 2.995 2.824l.005 .176v14a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-14a3 3 0 0 1 2.824 -2.995l.176 -.005h14zm-6.99 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor"></path>
                </svg>
                <div id='text.' class="pl-4 text-sm font-normal"> Noche </div>
            </div>

            <div id='calendario' class="mt-32 mx-auto w-2/4 rounded-lg shadow-lg p-4 cursor-pointer bg-gray-500 text-gray-200"></div>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.6/locale-all.js'></script>
            <script>
                let waiting = true;
                function dismiss(){
                    waiting = false;
                    let toast = document.getElementById('toast-simple');
                    let text = document.getElementById('text');
                    text.innerText = '';
                    toast.classList.add('-translate-x-full');
                    toast.classList.remove('translate-x-0');
                    toast.classList.remove('left-5');
                }
                function getRandomNumber(min, max) {
                    return Math.floor(Math.random() * (max - min + 1)) + min;
                }
                function getRandomColor() {
                    let red = getRandomNumber(0, 255);
                    let green = getRandomNumber(0, 255);
                    let blue = getRandomNumber(0, 255);

                    return "rgb(" + red + ", " + green + ", " + blue + ")";
                }

                document.addEventListener('DOMContentLoaded', function() {
                    let calendarEl = document.getElementById('calendario');
                    let toast = document.getElementById('toast-simple');
                    let text = document.getElementById('text');
                    let calendar = new FullCalendar.Calendar(calendarEl, {

                        eventClick: function(info) {
                            waiting = true;
                            text.innerText = info.event.title;
                            toast.classList.remove('-translate-x-full');
                            toast.classList.add('translate-x-0');
                            toast.classList.add('left-5');
                            if(waiting){
                                setTimeout(function() {
                                    dismiss();
                                }, 5000);
                            }
                        },
                        // eventColor: '#FF7355',

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
                                color: parseInt('{{$reserva->hora}}'.slice(0,2)) < 14 ? '#9EFF37' : parseInt('{{$reserva->hora}}'.slice(0,2)) < 20 ? '#FFD837' : '#37FFD2',
                                title: '{{$reserva->hora}} -> {{$reserva->nombre}} con {{$reserva->comensales}} comensales',
                                start: '{{$reserva->fecha}}',
                                textColor: '#252525'
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

        @endif
        @if ($componenteActivo === 'menu-diario')
            <!--Menu diario-->
            @livewire('menu-diario')
        @endif
        @if ($componenteActivo === 'reserva')
            <!--Reserva-->
            @livewire('reserva')
        @endif

    </div>

        <!-- Menú inferior-->
        <div class="fixed z-50 w-16 h-1/2 max-w-lg left-full bg-white border border-gray-200 rounded-full bottom-8 -translate-x-20  dark:bg-gray-700 dark:border-gray-600">
            <div class="grid h-full max-w-lg grid-rows-3 justify-center">

                <button wire:click="cambiar('menu-diario')" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:scale-125 rounded-lg group transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tools-kitchen" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 3h8l-1 9h-6z"></path>
                        <path d="M7 18h2v3h-2z"></path>
                        <path d="M20 3v12h-5c-.023 -3.681 .184 -7.406 5 -12z"></path>
                        <path d="M20 15v6h-1v-3"></path>
                        <path d="M8 12l0 6"></path>
                    </svg>
                </button>

                <div class="flex items-center justify-center">
                    <a href="/datosAlmacenados"
                            class="inline-flex items-center justify-center w-10 h-10 font-medium bg-blue-600 rounded-full hover:bg-blue-700 group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white icon icon-tabler icon-tabler-calendar" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path>
                            <path d="M16 3v4"></path>
                            <path d="M8 3v4"></path>
                            <path d="M4 11h16"></path>
                            <path d="M11 15h1"></path>
                            <path d="M12 15v3"></path>
                        </svg>
                        <span class="sr-only">New item</span>
                    </a>
                </div>

                <button wire:click="cambiar('reserva')" type="button" class="inline-flex flex-col items-center justify-center px-5 hover:scale-125 rounded-lg group transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-address-book" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z"></path>
                        <path d="M10 16h6"></path>
                        <path d="M13 11m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                        <path d="M4 8h3"></path>
                        <path d="M4 12h3"></path>
                        <path d="M4 16h3"></path>
                    </svg>
                </button>
            </div>
        </div>
</div>
