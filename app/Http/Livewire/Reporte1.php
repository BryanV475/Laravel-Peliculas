<?php

namespace App\Http\Livewire;

use App\Models\Genero;
use App\Models\Pelicula;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class Reporte1 extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap', $peliculas;
    public $keyWord, $keyWord2;


    public function render()
    {
        
        return view('livewire.reporte1.view',
        [
            'peliculas'=>$this->getPeliculas()
            
        ]);
        
    }

    public function getPeliculas(){
        $peliculas=Pelicula::select('*')
                ->whereBetween('costo',[$this->keyWord, $this->keyWord2] )
                ->paginate(10);
        return $peliculas;
    }

    public function pdf()
    {
        $peliculas = Pelicula::all();
        
        $pdf = PDF::loadView('livewire.reporte1.pdf', compact('peliculas'));
     
        return $pdf->download('Reporte-Peliculas-Costo'.' - '.date('d-m-y_H:i:s').'.pdf');
    }
    
}
