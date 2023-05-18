<div>
    <div class="mt-16">
        <button id="btnBD"  type="button" class="bg-gray-900 text-white rounded-md px-4 py-2">Gráficos desde BD</button>
    </div>
    <div class="cajaGrafico">
        <div id="precioProduct" class="w-3/4 h-full"></div>
    </div>

    <div class="mt-16">
        <button id="btnDrill"  type="button" class="bg-red-900 text-white rounded-md px-4 py-2">Drill</button>
    </div>
    <div class="cajaGrafico">
        <div id="container" class="w-full h-full"></div>
    </div>
    
</div>



<script>
    var btngrafica = document.getElementById('btnBD');
    btngrafica.addEventListener('click', function () {
        miBD();
    });

    var chart1, options;

    function miBD() {

        $.ajax({
            url: '{{ route("preciosProductos") }}',
            type: 'GET',
            dataType: "json",
            success: function (response) {
                options.series[0].data = response;
                chart1 = new Highcharts.Chart(options);
                console.log(response);
            },
            error: function () {
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

    var btngrafica2 = document.getElementById('btnDrill');
    btngrafica2.addEventListener('click', function () {
        peticionDrill();
    });

    function peticionDrill(){
        $.ajax({
            url: '{{ route("mercancias") }}',
            type: 'GET',
            dataType: "json",
            success: function (response) {
                console.log(response);
                drilldown(response)
            },
            error: function () {
                alert('No conseguido');
            },
            contentType: 'application/json'
        });
    }

    function drilldown(response) {
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Gráficos de columnas con profundidad'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Cantidad de modelos por Marca'
            },
        },
        series: [{
            name: 'Cantidad actual',
            data: response.map(function (mercancia) {
                return {
                    name: mercancia.nombre,
                    y: parseFloat(mercancia.cantidadActual),
                    color: '#B26EFF',
                    drilldown: mercancia.nombre
                };
            })
        }],
        drilldown: {
            series: response.map(function (mercancia) {
                return {
                    id: mercancia.nombre,
                    data: [
                        ['Stock mínimo', parseFloat(mercancia.stockMin)],
                        ['Hacer encargo', (((parseFloat(mercancia.stockMin)+parseFloat(mercancia.stockMax))/2)/2)],
                        ['Equilibrio', ((parseFloat(mercancia.stockMin)+parseFloat(mercancia.stockMax))/2)],
                        ['Stock máximo', parseFloat(mercancia.stockMax)],
                    ].map(function (datos) {
                        return {
                            name: datos[0],
                            y: datos[1]
                        };
                    })
                };
            })
        }
    });
}
    
    
    
</script>
