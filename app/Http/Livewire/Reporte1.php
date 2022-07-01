<?php

namespace App\Http\Livewire;

use App\Models\Genero;
use App\Models\Pelicula;
use Livewire\Component;
use Livewire\WithPagination;

class Reporte1 extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $keyWord, $keyWord2;

    public function render()
    {
        
        return view('livewire.reporte1.view',
        [
            'peliculas'=>Pelicula::select('*')
                ->whereBetween('costo',[$this->keyWord, $this->keyWord2] )
                ->paginate(10)
            
        ]);
    }
}
