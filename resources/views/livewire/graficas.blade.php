<div>
    <div class="mt-16">
        <button id="btnBD" type="button" class="bg-gray-900 text-white rounded-md px-4 py-2">Gráficos desde BD</button>
    </div>
    <div class="cajaGrafico">
        <div id="precioProduct" class="w-3/4 h-full mx-auto"></div>
    </div>

    <div class="mt-16">
        <button id="btnDrill" type="button" class="bg-red-900 text-white rounded-md px-4 py-2" wire:click="graficaCantidadActual()">Drill</button>
    </div>
    @if($grafica=="cantidadActual")
        <div class="cajaGrafico">
            <div id="container" class="w-3/4 h-full mx-auto"></div>
        </div>
    @endif()  
    
    <div class="mt-16">
        <button id="btnDrill" type="button" class="bg-red-900 text-white rounded-md px-4 py-2" wire:click="graficaRentabilidadPlato()">Rentabilidad plato</button>
    </div>
    @if($grafica=="rentabilidadPlato")
        <div class="cajaGrafico">
            <div id="container" class="w-3/4 h-full mx-auto"></div>
        </div>
    @endif()  
</div>


<script>
    var btngrafica = document.getElementById('btnBD');
    btngrafica.addEventListener('click', function() {
        miBD();
    });

    var chart1, options;

    function miBD() {

        $.ajax({
            url: '{{ route("preciosProductos") }}',
            type: 'GET',
            dataType: "json",
            success: function(response) {
                options.series[0].data = response;
                chart1 = new Highcharts.Chart(options);
                console.log(response);
            },
            error: function() {
                alert('No conseguido');
            },
            contentType: 'application/json'
        });
        datos();
    };

    function datos() {
        //document.getElementById('cajaGrafico').classList.toggle('hidden');
        //document.getElementById('cajaGrafico').classList.toggle('inline');

        options = {
            chart: {
                renderTo: 'precioProduct',
                type: 'column'
            },
            title: {
                text: 'Precio de Productos'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Precio'
                }
            },
            plotOptions: {
                series: {
                    borderWidth: 1,
                    dataLabels: {
                        enabled: true,
                        //format:'{point.u:0f}'
                    }
                }
            },
            tooltip: {
                headerFormat: "<span class='text-sm'> {series.name}</span><br>",
                pointFormat: "<span style='color:{point.color}'>{point.name}</span>: <b>{point.y:.2f}</b>",
                style: {
                    backgroundColor: '#purple',
                    borderColor: '#000',
                    fontSize: '0.875rem',
                    padding: '0.5rem',
                }
            },
            series: [{
                name: "Productos",
                colorByPoint: true,
                data: [],
            }]
        }
    }


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
                data: response.map(function(mercancia) {
                    return {
                        name: mercancia.nombre,
                        y: parseFloat(mercancia.cantidadActual),
                        color: '#B26EFF',
                        drilldown: mercancia.nombre
                    };
                })
            }],
            drilldown: {
                series: response.map(function(mercancia) {
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
                                y: ((parseFloat(mercancia.stockMin) + parseFloat(mercancia.stockMax)) / 4),
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

    function rentabilidadPlato(response)
    {        
        console.log(response);
        var listaCliente = response['listaCliente'];
        var listaRestaurante = response['listaRestaurante'];
        var listaResultado = response['listaResultados'];
        var categories = [];
        var costesData  = [];
        var preciosData  = [];
        var resultado  = [];
        
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

</script>