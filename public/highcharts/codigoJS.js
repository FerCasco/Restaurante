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

let input = $("#Toggle2")
let check = $("#showAgain")
// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark')
    input.prop('checked', true)
    localStorage.theme = 'dark'
} else {
    document.documentElement.classList.remove('dark')
    input.prop('checked', false)
    localStorage.theme = 'light'
}
if(localStorage.theme === null){
    check.check()
    localStorage.removeItem('theme')
}
function sistema(){
    if (check.prop('checked')){
        localStorage.removeItem('theme')
        location.reload()
    }
}
function changeMode(){
    document.documentElement.classList.toggle("dark")
    check.prop('checked', false)
    if(input.prop('checked')){
        localStorage.theme = 'dark'
    } else {
        localStorage.theme = 'light'
    }
}


