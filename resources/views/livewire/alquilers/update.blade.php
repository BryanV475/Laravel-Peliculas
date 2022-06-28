<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Prestamo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="soc_id"></label>
                <!-- <input wire:model="soc_id" type="text" class="form-control" id="soc_id" placeholder="Soc Id">@error('soc_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
                <select wire:model="soc_id" class="form-control" name="" id="soc_id">
                <option value="0">-Seleccione-</option>
                    @foreach ($socios as $id=>$nombre)
                        <option value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="pel_id"></label>
                <!-- <input wire:model="pel_id" type="text" class="form-control" id="pel_id" placeholder="Pel Id">@error('pel_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
                <select wire:model="pel_id" class="form-control" name="" id="pel_id">
                <option value="0">-Seleccione-</option>
                    @foreach ($peliculas as $id=>$nombre)
                        <option value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="desde"></label>
                <input wire:model="desde" type="date" class="form-control" id="desde" placeholder="Desde">@error('desde') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="hasta"></label>
                <input wire:model="hasta" type="date" class="form-control" id="hasta" placeholder="Hasta">@error('hasta') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="valor"></label>
                <input wire:model="valor" type="text" class="form-control" id="valor" placeholder="Valor">@error('valor') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="entrega"></label>
                <input wire:model="entrega" type="date" class="form-control" id="entrega" placeholder="Entrega">@error('entrega') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
       </div>
    </div>
</div>
