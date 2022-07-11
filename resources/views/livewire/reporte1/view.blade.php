@section('title', __('Reporte-1'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Listado de Pelicula por Precio </h4>
						</div>
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="inicio">
						</div>
						<div>
							<input wire:model='keyWord2' type="text" class="form-control" name="search" id="search" placeholder="fin">
						</div>
						<div>
							<a href="{{ route('reporte1-pdf')}}" class="btn btn-success"></a>
						</div>	
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
							</tr>
						</thead>
						<tbody>
							@foreach($peliculas as $row)
							<tr>
								<td>{{ $row->nombre }}</td>	
								<td>{{ $row->genero->nombre }}</td>
								<td>{{ $row->costo }}</td>
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
