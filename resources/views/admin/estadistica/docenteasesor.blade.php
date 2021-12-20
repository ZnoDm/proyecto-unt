@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
    <h1>CUADROS ESTADISTICOS</h1>
@stop

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div id="container"></div>
        </div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'DOCENTES VS CANTIDAD DE VECES QUE FUERON ASESORES, 2021'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'DOCENTE'
    },
    yAxis: {
        title: {
            text: 'CANTIDAD'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
    },

    series: [
        {
            name: "DOCENTE",
            colorByPoint: true,
            data: <?php echo $date ?>
        }
    ],
});

</script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
