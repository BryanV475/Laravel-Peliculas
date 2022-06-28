<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Socio;

class Socios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $cedula, $nombre, $direccion, $telefono, $correo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.socios.view', [
            'socios' => Socio::latest()
						->orWhere('cedula', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('correo', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->cedula = null;
		$this->nombre = null;
		$this->direccion = null;
		$this->telefono = null;
		$this->correo = null;
    }

    public function store()
    {
        $this->validate([
		'cedula' => 'required',
		'nombre' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'correo' => 'required',
        ]);

        Socio::create([ 
			'cedula' => $this-> cedula,
			'nombre' => $this-> nombre,
			'direccion' => $this-> direccion,
			'telefono' => $this-> telefono,
			'correo' => $this-> correo
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Socio Successfully created.');
    }

    public function edit($id)
    {
        $record = Socio::findOrFail($id);

        $this->selected_id = $id; 
		$this->cedula = $record-> cedula;
		$this->nombre = $record-> nombre;
		$this->direccion = $record-> direccion;
		$this->telefono = $record-> telefono;
		$this->correo = $record-> correo;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'cedula' => 'required',
		'nombre' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'correo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Socio::find($this->selected_id);
            $record->update([ 
			'cedula' => $this-> cedula,
			'nombre' => $this-> nombre,
			'direccion' => $this-> direccion,
			'telefono' => $this-> telefono,
			'correo' => $this-> correo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Socio Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Socio::where('id', $id);
            $record->delete();
        }
    }
}
