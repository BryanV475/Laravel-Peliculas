@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Video</h1>
@stop

@section('content')
<!--Inicio------------------------------------------------------------------------------------------------- Seccion de tarjetas de detalle de registros -->
<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$peliculas}}</h3>
                <p>Peliculas Registradas</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-film"></i>
            </div>
            <a href="peliculas" class="small-box-footer">Detalles <i class="fas fa-fw fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$generos}}</h3>
                <p>Generos Disponibles</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-filter"></i>
            </div>
            <a href="generos" class="small-box-footer">Detalles <i class="fas fa-fw fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$socios}}</h3>
                <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-user"></i>
            </div>
            <a href="socios" class="small-box-footer">Detalles <i class="fas fa-fw fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$alquileres}}</h3>
                <p>Prestamos</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-dollar-sign"></i>
            </div>
            <a href="alquilers" class="small-box-footer">Detalles <i class="fas fa-fw fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>
<!--Fin---------------------------------------------------------------------------------------------------- Seccion de tarjetas de detalle de registros -->
<!--Inicio------------------------------------------------------------------------------------------------- Seccion de datos estadisticos -->
<div class="row">
    <!-- Grafico de Barras Peliculas por Alquiler -->
    <div class="col-md-6">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Alquileres por Genero</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 321px;" width="401" height="312" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Tabla top 3 Peliculas en Alquiler -->
    <div class="col-md-6">
        <div class="card card-warning">
            <div class="card-header">
                <h1 class="card-title" style="font-weight: bold;">Top 3 Peliculas en Alquiler</h1>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Titulo</th>
                            <th>Alquileres</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $length = count($top3Peliculas['data']); ?>
                        @for ($i=0; $i < $length; $i++) <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$top3Peliculas['label'][$i]}}</td>
                            <td><span class="badge bg-danger">{{$top3Peliculas['data'][$i]}}</span></td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ingresos por Mes</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 400px;" width="500" height="312" class="chartjs-render-monitor"></canvas>
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Alquileres por Mes</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 400px;" width="500" height="312" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Peliculas por formato Grafico Pastel -->
    <div class="col-md-6">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Peliculas por Formato</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 400px;" width="500" height="312" class="chartjs-render-monitor"></canvas>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Peliculas por Genero</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 321px;" width="401" height="312" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Fin---------------------------------------------------------------------------------------------------- Seccion de datos estadisticos -->
@stop

@section('css')

<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->

@stop

@section('js')

<!-- ---------------------------------------------------------------------------------------------- Procesamiento js -->
<!-- Generar colores para los datasets -->
<script>
    function generateColors(genData) {
        colors = [];
        for (let i = 0; i < genData.data.length; i++) {
            colors.push('#' + Math.floor(Math.random() * 16777215).toString(16));
        }
        return colors;
    }
</script>
<!-- Alquileres por Genero -->
<script>
    var barData = JSON.parse(`<?php echo $alquilerGeneros; ?>`)

    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = {
        labels: barData.label,
        datasets: [{
            data: barData.data,
            pointStrokeColor: 'rgb(60,141,188)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgb(60,141,188)',
            backgroundColor: generateColors(barData),
            borderColor: generateColors(barData),
            borderWidth: 1,
            fill: true
        }]
    }
    var barChartOptions = {
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        responsive: true,
        datasetFill: false,
        scales: {
            xAxes: [{
                gridLines: {
                    display: true,
                }
            }],
            yAxes: [{
                gridLines: {
                    display: true,
                },
                ticks: {
                    beginAtZero: true
                }
            }],

        }

    }
    var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
    })
</script>
<!-- Peliculas por Formato -->
<script>
    var donutData = JSON.parse(`<?php echo $pelisFormato; ?>`)

    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutChartData = {
        labels: donutData.label,
        datasets: [{
            data: donutData.data,
            pointStrokeColor: 'rgb(60,141,188)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgb(60,141,188)',
            backgroundColor: generateColors(donutData),
            borderColor: generateColors(donutData),
            borderWidth: 1,
            fill: true
        }]
    }

    var donutChartOptions = {
        maintainAspectRatio: false,
        legend: {
            display: true
        },
        responsive: true
    }
    var donutChart = new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutChartData,
        options: donutChartOptions
    })
</script>
<!-- Alquileres por Mes -->
<script>
    var lineData = JSON.parse(`<?php echo $alqPorMes; ?>`)

    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartData = {
        labels: lineData.label,
        datasets: [{
            data: lineData.data,
            pointStrokeColor: 'rgb(60,141,188)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgb(60,141,188)',
            backgroundColor: generateColors(lineData),
            borderColor: generateColors(lineData),
            borderWidth: 1,
            fill: false
        }]
    }

    var lineChartOptions = {
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        responsive: true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        }
    }
    var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineChartData,
        options: lineChartOptions
    })
</script>
<!-- Ingresos Por Mes -->
<script>
    var areaData = JSON.parse(`<?php echo $ingresoPorMes; ?>`)

    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    var areaChartData = {
        labels: areaData.label,
        datasets: [{
            data: areaData.data,
            pointStrokeColor: 'rgb(60,141,188)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgb(60,141,188)',
            backgroundColor: generateColors(areaData),
            borderColor: generateColors(areaData),
            borderWidth: 1,
            fill: true
        }]
    }

    var areaChartOptions = {
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        responsive: true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        }
    }
    var areaChart = new Chart(areaChartCanvas, {
        type: 'line',
        data: areaChartData,
        options: areaChartOptions
    })
</script>

<!-- Peliculas por Genero -->
<script>
    var barData2 = JSON.parse(`<?php echo $pelisGeneros; ?>`)
    console.log(barData2);
    var barChartCanvas2 = $('#barChart2').get(0).getContext('2d')
    var barChartData2 = {
        labels: barData2.label,
        datasets: [{
            data: barData2.data,
            pointStrokeColor: 'rgb(60,141,188)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgb(60,141,188)',
            backgroundColor: generateColors(barData2),
            borderColor: generateColors(barData2),
            borderWidth: 1,
            fill: true
        }]
    }
    var barChartOptions2 = {
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        responsive: true,
        datasetFill: false,
        scales: {
            xAxes: [{
                gridLines: {
                    display: true,
                }
            }],
            yAxes: [{
                gridLines: {
                    display: true,
                },
                ticks: {
                    beginAtZero: true
                }
            }],

        }

    }
    var barChart2 = new Chart(barChartCanvas2, {
        type: 'bar',
        data: barChartData2,
        options: barChartOptions2
    })
</script>

<!-- ---------------------------------------------------------------------------------------------- Procesamiento js -->
<script>
    console.log('Hi!');
</script>
@stop