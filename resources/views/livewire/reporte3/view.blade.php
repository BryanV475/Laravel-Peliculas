@section('title', __('Reporte-3'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Listado de Socios por Fecha de Registro </h4>
						</div>
                        <form action="{{route('reporte3-pdf')}}" method="get">
							<div class="row justify-content-center">
								<div class="col">
									Inicio
									<input wire:model='keyWord' type="date" class="form-control" name="searchDate3" id="searchDate3" placeholder="inicio">
								</div>
								<div class="col">
									Fin
									<input wire:model='keyWord2' type="date" class="form-control" name="searchDate4" id="searchDate4" placeholder="fin">
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
                                <td>Fecha de Registro</td>
							</tr>
						</thead>
						<tbody>
							@foreach($socios as $row)
							<tr>
								<td>{{ $row->nombre }}</td>
                                <td>{{ $row->created_at}}</td>
							@endforeach
						</tbody>
					</table>						
					{{ $socios->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
