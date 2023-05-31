<div>
    @livewire('menu')
    @livewire('tipos')
    @if ($componenteActivo === 'gestionar-almacen')
    <div>
        @livewire('gestionar-almacen',['idTipo' => $idTipo])
    </div>
    @endif
    @if($componenteActivo === 'pedido-mercancias')
    <div>
        @livewire('pedido-mercancias')
    </div>
    @endif
    @if($componenteActivo === 'new-mercancia')
    <div>
        @livewire('new-mercancia')
    </div>
    @endif
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('ejecutarScript', function ($lista) {
                //console.log($lista);
                drilldown($lista);
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
    </script>
</div>
