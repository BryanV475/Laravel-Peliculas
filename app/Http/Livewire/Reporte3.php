<?php

namespace App\Http\Livewire;

use App\Models\Socio;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class Reporte3 extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $keyWord, $keyWord2;

    public function render()
    {
        return view(
            'livewire.reporte3.view',
            [
                'socios' => Socio::select('*')
                    ->whereBetween('created_at', [$this->keyWord, $this->keyWord2])
                    ->paginate(10)

            ]
        );
    }
    public function pdf()
    {
        $date1 = $_GET['searchDate3'];
        $date2 = $_GET['searchDate4'];
        $socios = Socio::select('*')
            ->whereBetween('created_at', [$date1, $date2])
            ->get();

        $pdf = PDF::loadView('livewire.reporte3.pdf', compact('socios'));
        return $pdf->download('Reporte-Socios-Registro' . ' - ' . date('d-m-y_H:i:s') . '.pdf');
    }
}
