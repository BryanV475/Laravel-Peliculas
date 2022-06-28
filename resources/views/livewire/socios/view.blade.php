@section('title', __('Socios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Listado de Socios </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Socios">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Socios
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.socios.create')
						@include('livewire.socios.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Cedula</th>
								<th>Nombre</th>
								<th>Direccion</th>
								<th>Telefono</th>
								<th>Correo</th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($socios as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->cedula }}</td>
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->direccion }}</td>
								<td>{{ $row->telefono }}</td>
								<td>{{ $row->correo }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Desea Eliminar el Socio {{$row->id}}? \nLos Elementos Eliminados no Pueden Recuperarse!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									</div>
								</div>
								</td>
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
