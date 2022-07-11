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
    public function pdf(){
        $date1=$_GET['searchDate1'];
        $date2=$_GET['searchDate2'];

        $peliculas = Pelicula::select('*')
        ->whereBetween('created_at',[$date1, $date2] )
        ->get();

        $pdf = PDF::loadView('livewire.reporte2.pdf',compact('peliculas'));
        return $pdf->download('Reporte-Peliculas-Registro'.' - '.date('d-m-y_H:i:s').'.pdf');
    }
}
