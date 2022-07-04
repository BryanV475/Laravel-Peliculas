<?php

namespace App\Http\Livewire;

use App\Models\Socio;
use Livewire\Component;
use Livewire\WithPagination;

class Reporte3 extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $keyWord, $keyWord2;

    public function render()
    {
        return view('livewire.reporte3.view',
        [
            'socios'=>Socio::select('*')
                ->whereBetween('created_at',[$this->keyWord, $this->keyWord2] )
                ->paginate(10)
            
        ]);
    }
}
