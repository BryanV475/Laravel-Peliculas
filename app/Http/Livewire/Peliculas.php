<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pelicula;
use App\Models\Genero;
use App\Models\Directore;
use App\Models\Formato;

class Peliculas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $gen_id, $dir_id, $for_id, $nombre, $costo, $estreno;
    public $updateMode = false;

    public function render()
    {
        $generos = Genero::pluck('nombre','id');
        $directores = Directore::pluck('nombre','id');
        $formatos = Formato::pluck('nombre','id');
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.peliculas.view',['generos'=>$generos,'directores'=>$directores,'formatos'=>$formatos], [
            'peliculas' => Pelicula::latest()
						->orWhere('gen_id', 'LIKE', $keyWord)
						->orWhere('dir_id', 'LIKE', $keyWord)
						->orWhere('for_id', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('costo', 'LIKE', $keyWord)
						->orWhere('estreno', 'LIKE', $keyWord)
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
		$this->gen_id = null;
		$this->dir_id = null;
		$this->for_id = null;
		$this->nombre = null;
		$this->costo = null;
		$this->estreno = null;
    }

    public function store()
    {
        $this->validate([
		'gen_id' => 'required',
		'dir_id' => 'required',
		'for_id' => 'required',
		'nombre' => 'required',
		'costo' => 'required',
		'estreno' => 'required',
        ]);

        Pelicula::create([ 
			'gen_id' => $this-> gen_id,
			'dir_id' => $this-> dir_id,
			'for_id' => $this-> for_id,
			'nombre' => $this-> nombre,
			'costo' => $this-> costo,
			'estreno' => $this-> estreno
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Pelicula Successfully created.');
    }

    public function edit($id)
    {
        $record = Pelicula::findOrFail($id);

        $this->selected_id = $id; 
		$this->gen_id = $record-> gen_id;
		$this->dir_id = $record-> dir_id;
		$this->for_id = $record-> for_id;
		$this->nombre = $record-> nombre;
		$this->costo = $record-> costo;
		$this->estreno = $record-> estreno;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'gen_id' => 'required',
		'dir_id' => 'required',
		'for_id' => 'required',
		'nombre' => 'required',
		'costo' => 'required',
		'estreno' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Pelicula::find($this->selected_id);
            $record->update([ 
			'gen_id' => $this-> gen_id,
			'dir_id' => $this-> dir_id,
			'for_id' => $this-> for_id,
			'nombre' => $this-> nombre,
			'costo' => $this-> costo,
			'estreno' => $this-> estreno
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Pelicula Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Pelicula::where('id', $id);
            $record->delete();
        }
    }
}
