@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
    <h1>CUADROS ESTADISTICOS</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 p-3">
            <h3 class="text-center" style="text-transform:uppercase;">Cantidad de veces que un Docente fue asignado como Asesor Practicas</h3>
            <br>
            @if ($data)                
                <canvas id="myChart" width="400" height="400"></canvas>
            @else 
                <p class="text-center align-middle">No existen datos </p>              
            @endif
        </div>
        <div class="col-12 col-md-6 p-3">
            <h3 class="text-center" style="text-transform:uppercase;">Cantidad de veces que un Docente fue asignado como Asesor Tesis</h3>
            <br>
            @if ($data2)
                <canvas id="myChart2" width="400" height="400"></canvas>
            @else 
                <p class="text-center align-middle">No existen datos </p>              
            @endif
        </div>
        <div class="col-12 col-md-6 p-3">
            <h3 class="text-center" style="text-transform:uppercase;">Cantidad de observaciones Docente Jurados</h3>
            @if ($data3)            
                <canvas id="myChart3" width="400" height="400"></canvas>
            @else 
                <p class="text-center align-middle">No existen datos </p>              
            @endif
        </div>
    </div>
   
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script>        
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels) ?>,
            datasets: [{
                label: 'Practicas',
                data: <?php echo json_encode($data) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        },
        });
    </script>
    <script>        
        const ctx2 = document.getElementById('myChart2');
        const myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels2) ?>,
            datasets: [{
                label: 'Tesis',
                data: <?php echo json_encode($data2) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
        }
        });
    </script>
    <script>
        const ctx3 = document.getElementById('myChart3');
        const myChart3 = new Chart(ctx3, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($labels3) ?>,
                datasets: [{
                    label: 'My First Dataset',
                    data: <?php echo json_encode($data3) ?>,
                    backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ]
                }]
            }
        });
    </script>
   
@stop

