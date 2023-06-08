<div>

    <!--Menú gráficas-->
    <div class="flex justify-center">
        <nav class="mt-32 p-4 inline-flex justify-center bg-orange-200 rounded-md">
            <div class="space-x-4">
                <button wire:click="graficaCantidadActual()"
                        class="px-4 py-2 rounded-md bg-orange-500 text-white hover:bg-orange-600 focus:outline-none focus:bg-orange-600">
                    Cantidad actual Mercancías
                </button>
                <button wire:click="graficaRentabilidadPlato()"
                        class="px-4 py-2 rounded-md bg-orange-500 text-white hover:bg-orange-600 focus:outline-none focus:bg-orange-600">
                    Rentabilidad plato
                </button>
                <button wire:click="graficaPlatosPreferidos()"
                        class="px-4 py-2 rounded-md bg-orange-500 text-white hover:bg-orange-600 focus:outline-none focus:bg-orange-600">
                    Platos preferidos
                </button>
            </div>
        </nav>
    </div>

    <!--Gráficas-->
    @if($grafica=="cantidadActual")
        <div>
            <div id="container" class="mt-12 w-10/12 h-full mx-auto"></div>
        </div>
    @endif()

    @if($grafica=="rentabilidadPlato")
        <div>
            <div id="container" class="mt-12 w-10/12 h-full mx-auto"></div>
        </div>
    @endif()

    @if($grafica=="platoPreferido")
        <div>
            <div id="container" class="mt-12 w-10/12 h-full mx-auto"></div>
        </div>
        <div class="w-1/2 mx-auto bg-orange-200 rounded-xl p-8">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione el tipo de producto:</label>
            <select id="tipos" wire:model="tipo"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($tiposProducto as $t)
                    <option value="{{$t->id}}">{{$t->nombre}}</option>
                @endforeach
            </select>
        </div>
    @endif()

</div>

<script>

    document.addEventListener('livewire:load', function () {
        Livewire.on('ScriptCantidadActual', function ($lista) {
            //console.log($lista);
            drilldown($lista);
        });
        Livewire.on('ScriptRentabilidadPlato', function ($lista) {
            //console.log($lista);
            rentabilidadPlato($lista);
        });
        Livewire.on('ScriptPlatoPreferido', function ($lista) {
            //console.log($lista);
            platosPreferidos($lista);
        });
    });



    /***********************/
    function drilldown(response) {
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Stock de mercancías'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Cantidad de actual mercancías'
                },
            },
            series: [{
                name: 'Cantidad actual',
                data: response.map(function (mercancia) {
                    var color;
                    if (parseFloat(mercancia.cantidadActual) <= parseFloat(mercancia.stockMin)) {
                        color = '#FF3E3E'; // Rojo
                    } else if (parseFloat(mercancia.cantidadActual) > parseFloat(mercancia.stockMin) && parseFloat(mercancia.cantidadActual) <= ((parseFloat(mercancia.stockMin) + parseFloat(mercancia.stockMax)) / 4)) {
                        color = '#FF9358'; // Naranja
                    } else if (parseFloat(mercancia.cantidadActual) > ((parseFloat(mercancia.stockMin) + parseFloat(mercancia.stockMax)) / 4) && parseFloat(mercancia.cantidadActual) <= ((parseFloat(mercancia.stockMin) + parseFloat(mercancia.stockMax)) / 2)) {
                        color = '#FFEA58'; // Amarillo
                    } else {
                        color = '#BAFF58'; // Verde
                    }
                    return {
                        name: mercancia.nombre,
                        y: parseFloat(mercancia.cantidadActual),
                        color: color,
                        drilldown: mercancia.nombre
                    };
                })
            }],
            drilldown: {
                series: response.map(function (mercancia) {
                    return {
                        id: mercancia.nombre,
                        type: 'bar',
                        stacking: 'normal',
                        data: [{
                            name: 'Cantidad actual',
                            y: parseFloat(mercancia.cantidadActual),
                            color: '#B26EFF'
                        },
                            {
                                name: 'Stock mínimo',
                                y: parseFloat(mercancia.stockMin),
                                color: '#FF5858'
                            },
                            {
                                name: 'Hacer encargo',
                                //y: ((parseFloat(mercancia.stockMin) + parseFloat(mercancia.stockMax)) / 4), Daba fallo de que podia ser mayor el stockMin que el HacerEncargo
                                y: ((parseFloat(mercancia.stockMin) + (parseFloat(mercancia.stockMin) + parseFloat(mercancia.stockMax)) / 2) / 2),
                                color: '#FF9358 '
                            },
                            {
                                name: 'Equilibrio',
                                y: ((parseFloat(mercancia.stockMin) + parseFloat(mercancia.stockMax)) / 2),
                                color: '#FFEA58 '
                            },
                            {
                                name: 'Stock máximo',
                                y: parseFloat(mercancia.stockMax),
                                color: '#BAFF58 '
                            }
                        ]
                    };
                })
            }
        });
    }

    function rentabilidadPlato(response) {
        console.log(response);
        var listaCliente = response['listaCliente'];
        var listaRestaurante = response['listaRestaurante'];
        var listaResultado = response['listaResultados'];
        var categories = [];
        var costesData = [];
        var preciosData = [];
        var resultado = [];

        for (var i = 0; i < listaRestaurante.length; i++) {
            categories.push(listaRestaurante[i][0]);
        }

        for (var i = 0; i < listaRestaurante.length; i++) {
            costesData.push([i, parseFloat(listaRestaurante[i][1])]);
            preciosData.push([i, parseFloat(listaCliente[i][1])]);
            resultado.push([i, parseFloat(listaResultado[i][1])]);
        }

        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Rentabilidad por plato'
            },
            xAxis: {
                categories: categories,
                crosshair: true
            },
            yAxis: {
                title: {
                    text: 'Coste (en euros)'
                }
            },
            series: [{
                name: 'Coste de producción',
                data: costesData
            }, {
                name: 'Precio de venta',
                data: preciosData
            }, {
                name: 'Resultados obtenidos',
                data: resultado,
                zones: [{
                    value: 0, // Valores menores o iguales que cero
                    color: '#ff0000'
                }, {
                    color: '#BAFF58' // Valores mayores que cero
                }]
            }]
        });
    }

    function platosPreferidos(response) {

        var datosFormateados = [];

        response.forEach(function (elemento) {
            var punto = {
                name: elemento[0], // Nombre del punto
                y: elemento[1] // Valor del punto
            };
            datosFormateados.push(punto);
        });

        //console.log(datosFormateados);

        Highcharts.chart('container', {
            chart: {
                polar:true,
                type: 'pie'
            },
            title: {
                text: 'Productos preferidos por clientes'
            },
            pane: {
                startAngle: 0,
                endAngle: 360
            },
            plotOptions: {
                pie: {
                borderWidth: 0,
                innerSize: '0%', // Tamaño del círculo interno
                dataLabels: {
                    enabled: false
                }
                }
            },
            series: [{
                name: 'Pedido',
                data: datosFormateados,
            }]
            
        });

        /*var gaugeData = response.map(function (elemento) {
            return {
                name: elemento[0],
                y: elemento[1]
            };
        });
        //console.log(datosFormateados);

        Highcharts.chart('container', {
            chart: {
                type: 'solidgauge'
            },
            title: {
                text: 'Ejemplo de Gráfico Solid Gauge'
            },
            pane: {
                startAngle: -90,
                endAngle: 90,
                background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                    [0, '#FFF'],
                    [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
                }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                    [0, '#333'],
                    [1, '#FFF']
                    ]
                },
                borderWidth: 1,
                outerRadius: '107%'
                }, {
                // Marcadores
                backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[0])
                    .setOpacity(0.3)
                    .get(),
                borderWidth: 0,
                outerRadius: '105%',
                innerRadius: '103%'
                }]
            },
            yAxis: {
                min: 0,
                max: 100,
                lineWidth: 0,
                tickPositions: []
            },
            plotOptions: {
                solidgauge: {
                dataLabels: {
                    enabled: false
                },
                linecap: 'round',
                stickyTracking: false,
                rounded: true
                }
            },
            series: [{
                name: 'Porcentaje',
                data: gaugeData,
                dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                    ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}%</span></div>'
                },
                tooltip: {
                valueSuffix: ' %'
                }
            }]
        });*/

        // Configurar el gráfico
      /*Highcharts.chart("container", {
        chart: {
          type: "solidgauge",
          height: 360,
          width: 360,
        },
        title: {
          text: "Platos preferidos por clientes",
        },
        pane: {
          startAngle: 0,
          endAngle: 360,
        },
        yAxis: {
          min: 0,
          max: 100,
          lineWidth: 0,
          tickPositions: [],
        },
        plotOptions: {
          pie: {
            borderWidth: 0,
            innerSize: "50%", // Tamaño del círculo interno
            dataLabels: {
              enabled: false,
            },
          },
        },
        series: [
          {
            name: "Valores",
            data: datosFormateados,
          },
        ],
      });*/
    }
</script>
