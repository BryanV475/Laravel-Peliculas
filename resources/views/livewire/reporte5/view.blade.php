@section('title', __('Reporte-5'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Listado de Socios por Mes de Registro </h4>
						</div>
					</div>
				</div>
				<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<th>Mes</th>
                                <td>Socios</td>
							</tr>
						</thead>
						<tbody>
                            @for($i = 0; $i < 12; $i++)
                            <tr>
                                <td>{{ $socioPorMes['label'][$i]}}</td>
                                <td>{{ $socioPorMes['data'][$i]}}</td>
                            </tr>
                            @endfor
						</tbody>
					</table>					
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Socios por Mes</h3>
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
    </div>
</div>
    

@section('js')
<script>

    function generateColors(genData) {
        colors = [];
        for (let i = 0; i < genData.data.length; i++) {
            colors.push('#' + Math.floor(Math.random() * 16777215).toString(16));
        }
        return colors;
    }

    var areaData = JSON.parse(`<?php echo $grafico; ?>`)
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
@stop