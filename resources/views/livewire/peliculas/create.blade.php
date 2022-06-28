<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Pelicula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="gen_id"></label>
                <!-- <input wire:model="gen_id" type="text" class="form-control" id="gen_id" placeholder="Gen Id">@error('gen_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
                <select wire:model="gen_id" class="form-control" name="" id="gen_id">
                <option value="0">-Seleccione-</option>
                    @foreach ($generos as $id=>$nombre)
                        <option value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dir_id"></label>
                <!-- <input wire:model="dir_id" type="text" class="form-control" id="dir_id" placeholder="Dir Id">@error('dir_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
                <select wire:model="dir_id" class="form-control" name="" id="dir_id">
                <option value="0">-Seleccione-</option>
                    @foreach ($directores as $id=>$nombre)
                        <option value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="for_id"></label>
                <!-- <input wire:model="for_id" type="text" class="form-control" id="for_id" placeholder="For Id">@error('for_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
                <select wire:model="for_id" class="form-control" name="" id="for_id">
                <option value="0">-Seleccione-</option>
                    @foreach ($formatos as $id=>$nombre)
                        <option value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nombre"></label>
                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="costo"></label>
                <input wire:model="costo" type="text" class="form-control" id="costo" placeholder="Costo">@error('costo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="estreno"></label>
                <input wire:model="estreno" type="date" class="form-control" id="estreno" placeholder="Estreno">@error('estreno') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
