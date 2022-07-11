@section('title', __('Reporte-2'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
								Listado de Pelicula por Fecha de Registro </h4>
						</div>
						<form action="{{route('reporte2-pdf')}}" method="get">
							<div class="row justify-content-center">
								<div class="col">
									Inicio
									<input wire:model='keyWord' type="date" class="form-control" name="searchDate1" id="searchDate1" placeholder="inicio">
								</div>
								<div class="col">
									Fin
									<input wire:model='keyWord2' type="date" class="form-control" name="searchDate2" id="searchDate2" placeholder="fin">
								</div>
								<div class="col">
									<button type="submit" class="btn btn-success">
										<i class="fa fa-file-pdf"></i>
										PDF
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-sm">
							<thead class="thead">
								<tr>
									<th>Nombre</th>
									<th>Genero</th>
									<td>Costo</td>
									<td>Fecha de Registro</td>
								</tr>
							</thead>
							<tbody>
								@foreach($peliculas as $row)
								<tr>
									<td>{{ $row->nombre }}</td>
									<td>{{ $row->genero->nombre }}</td>
									<td>{{ $row->costo }}</td>
									<td>{{ $row->created_at}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{ $peliculas->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>