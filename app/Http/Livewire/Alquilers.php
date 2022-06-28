<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Alquiler;
use App\Models\Socio;
use App\Models\Pelicula;

class Alquilers extends Component
{
    
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $soc_id, $pel_id, $desde, $hasta, $valor, $entrega;
    public $updateMode = false;

    public function render()
    {
        $socios = Socio::pluck('nombre','id');
        $peliculas = Pelicula::pluck('nombre','id');
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.alquilers.view',['socios'=>$socios,'peliculas'=>$peliculas], [
            'alquilers' => Alquiler::latest()
						->orWhere('soc_id', 'LIKE', $keyWord)
						->orWhere('pel_id', 'LIKE', $keyWord)
						->orWhere('desde', 'LIKE', $keyWord)
						->orWhere('hasta', 'LIKE', $keyWord)
						->orWhere('valor', 'LIKE', $keyWord)
						->orWhere('entrega', 'LIKE', $keyWord)
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
		$this->soc_id = null;
		$this->pel_id = null;
		$this->desde = null;
		$this->hasta = null;
		$this->valor = null;
		$this->entrega = null;
    }

    public function store()
    {
        $this->validate([
		'soc_id' => 'required',
		'pel_id' => 'required',
		'desde' => 'required',
		'hasta' => 'required',
		'valor' => 'required',
		'entrega' => 'required',
        ]);

        Alquiler::create([ 
			'soc_id' => $this-> soc_id,
			'pel_id' => $this-> pel_id,
			'desde' => $this-> desde,
			'hasta' => $this-> hasta,
			'valor' => $this-> valor,
			'entrega' => $this-> entrega
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Alquiler Successfully created.');
    }

    public function edit($id)
    {
        $record = Alquiler::findOrFail($id);

        $this->selected_id = $id; 
		$this->soc_id = $record-> soc_id;
		$this->pel_id = $record-> pel_id;
		$this->desde = $record-> desde;
		$this->hasta = $record-> hasta;
		$this->valor = $record-> valor;
		$this->entrega = $record-> entrega;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'soc_id' => 'required',
		'pel_id' => 'required',
		'desde' => 'required',
		'hasta' => 'required',
		'valor' => 'required',
		'entrega' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Alquiler::find($this->selected_id);
            $record->update([ 
			'soc_id' => $this-> soc_id,
			'pel_id' => $this-> pel_id,
			'desde' => $this-> desde,
			'hasta' => $this-> hasta,
			'valor' => $this-> valor,
			'entrega' => $this-> entrega
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Alquiler Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Alquiler::where('id', $id);
            $record->delete();
        }
    }
}
