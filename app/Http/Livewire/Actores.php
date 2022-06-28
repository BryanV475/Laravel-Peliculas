<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Actore;
use App\Models\Sexo;

class Actores extends Component
{
    
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $sex_id;
    public $updateMode = false;

    
    public function render()
    {
        $sexos = Sexo::pluck('nombre','id');
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.actores.view',['sexos' => $sexos] , [
            'actores' => Actore::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('sex_id', 'LIKE', $keyWord)
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
		$this->nombre = null;
		$this->sex_id = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'sex_id' => 'required',
        ]);

        Actore::create([ 
			'nombre' => $this-> nombre,
			'sex_id' => $this-> sex_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Actor creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Actore::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->sex_id = $record-> sex_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'sex_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Actore::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'sex_id' => $this-> sex_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Actor actualizado exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Actore::where('id', $id);
            $record->delete();
        }
    }
}
