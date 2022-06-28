<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Actorpelicula;
use App\Models\Pelicula;
use App\Models\Actore;

class Actorpeliculas extends Component
{
    
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $act_id, $pel_id, $papel;
    public $updateMode = false;

    public function render()
    {
        $actores = Actore::pluck('nombre','id');
        $peliculas= Pelicula::pluck('nombre','id');
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.actorpeliculas.view',['actores'=>$actores,'peliculas'=>$peliculas], [
            'actorpeliculas' => Actorpelicula::latest()
						->orWhere('act_id', 'LIKE', $keyWord)
						->orWhere('pel_id', 'LIKE', $keyWord)
						->orWhere('papel', 'LIKE', $keyWord)
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
		$this->act_id = null;
		$this->pel_id = null;
		$this->papel = null;
    }

    public function store()
    {
        $this->validate([
		'act_id' => 'required',
		'pel_id' => 'required',
		'papel' => 'required',
        ]);

        Actorpelicula::create([ 
			'act_id' => $this-> act_id,
			'pel_id' => $this-> pel_id,
			'papel' => $this-> papel
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Actorpelicula Successfully created.');
    }

    public function edit($id)
    {
        $record = Actorpelicula::findOrFail($id);

        $this->selected_id = $id; 
		$this->act_id = $record-> act_id;
		$this->pel_id = $record-> pel_id;
		$this->papel = $record-> papel;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'act_id' => 'required',
		'pel_id' => 'required',
		'papel' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Actorpelicula::find($this->selected_id);
            $record->update([ 
			'act_id' => $this-> act_id,
			'pel_id' => $this-> pel_id,
			'papel' => $this-> papel
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Actorpelicula Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Actorpelicula::where('id', $id);
            $record->delete();
        }
    }
}
