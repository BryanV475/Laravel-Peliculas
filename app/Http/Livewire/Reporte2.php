<?php

namespace App\Http\Livewire;

use App\Models\Pelicula;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class Reporte2 extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $keyWord, $keyWord2;

    public function render()
    {
        return view('livewire.reporte2.view',
        [
            'peliculas'=>Pelicula::select('*')
                ->whereBetween('created_at',[$this->keyWord, $this->keyWord2] )
                ->paginate(10)
            
        ]);
    }
    
}
