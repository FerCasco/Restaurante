<div>

    <!--Menú graáficas-->
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
    @endif()

</div>

<script>



    /***********************/
    document.addEventListener('livewire:load', function () {
        Livewire.on('ejecutarScript', function ($lista) {
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

    }
</script>
