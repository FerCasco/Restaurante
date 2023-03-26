$("#btnColumnas").click(function (){
    alert("Hola");
});

$("#btnPrueba").click(function (){
    $(".modal-header").css("background-color", "#4c00d9");
    $(".modal-header").css("color", "white");
    $(".modal-tittle").text("Gráfico de pruebas");
    prueba();
});

$("#btnLineas").click(function (){
    $(".modal-header").css("background-color", "#4c00d9");
    $(".modal-header").css("color", "white");
    $(".modal-tittle").text("Gráfico de Lineas");
    prueba2();
});
function prueba(){

    Highcharts.chart('contenedor-modal', {
        chart: {
            type:'line'
        },
            title: {
                text:'Valores mensuales'
            },
            xAxis: {
                categories: ['Enero','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic']
            },
            series:[{
                data: [20,3,4,6,7,9,6,4,3,2,1,5]
            }],
    });
}

function prueba2(){

    Highcharts.chart('contenedor-modal', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Fruit Consumption'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Jane',
            data: [1, 0, 4]
        }, {
            name: 'John',
            data: [5, 7, 3]
        }]
    });
}
/*document.addEventListener('DOMContentLoaded', function () {
    const chart = Highcharts.chart('container', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Fruit Consumption'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Jane',
            data: [1, 0, 4]
        }, {
            name: 'John',
            data: [5, 7, 3]
        }]
    });
});*/


