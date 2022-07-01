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
    public $keyWord;

    public function render()
    {
        $generos = Genero::pluck('id','nombre');
        return view('livewire.reporte1.view',
        [
            'peliculas'=>Pelicula::
                orWhere('nombre','LIKE','%'.$this->keyWord.'%')
                ->paginate(10),
            'generos'=>$generos
        ]);
    }
}
