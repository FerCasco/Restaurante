<!DOCTYPE html>
<html>

<head>
    <title>403 Forbidden</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lato');

        /* Estilos generales */
        * {
            position: relative;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Lato', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to bottom right, #EEE, #AAA);
        }

  

        /* Estilos de la animación de bloqueo */
        .lock {
            border-radius: 5px;
            width: 55px;
            height: 45px;
            background-color: #333;
            animation-name: dip;
            animation-duration: 1s;
            animation-delay: 0.5s;
        }

        .lock::before,
        .lock::after {
            content: '';
            position: absolute;
            border-left: 5px solid #333;
            height: 20px;
            width: 15px;
            left: calc(50% - 12.5px);
        }

        .lock::before {
            top: -30px;
            border: 5px solid #333;
            border-bottom-color: transparent;
            border-radius: 15px 15px 0 0;
            height: 30px;
            animation-name: lock, spin;
            animation-duration: 2s;
            animation-timing-function: ease;
            animation-iteration-count: infinite;
        }

        .lock::after {
            top: -10px;
            border-right: 5px solid transparent;
            animation-name: spin;
            animation-duration: 2s;
            animation-timing-function: ease;
            animation-iteration-count: infinite;
        }

        @keyframes lock {
            0% {
                top: -45px;
            }

            65% {
                top: -45px;
            }

            100% {
                top: -30px;
            }
        }

        @keyframes spin {
            0% {
                transform: scaleX(-1);
                left: calc(50% - 30px);
            }

            65% {
                transform: scaleX(1);
                left: calc(50% - 12.5px);
            }
        }

        @keyframes dip {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(10px);
            }

            100% {
                transform: translateY(0px);
            }
        }
    </style>
</head>

<body>
    <div class="lock"></div>
    <div class="message">
        <h1 class="flex justify-center mb-4 mt-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">403 Forbidden</h1>
        <p>Acceso no autorizado. Por favor, compruebe con el administrador del sitio si considera que puede ser un error.</p>
    </div>
    <h1></h1>
    <p></p>
    <button onclick="goBack()" class="mt-8 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Volver Atrás</button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
