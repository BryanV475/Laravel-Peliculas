<?php

namespace App\Http\Livewire;

use App\Models\Alquiler;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class Reporte4 extends Component
{

    public function getMonth($monthNumber){
        switch ($monthNumber) {
            case 1:
                $month = "Enero";
                break;
            case 2:
                $month = "Febrero";
                break;
            case 3:
                $month = "Marzo";
                break;
            case 4:
                $month = "Abril";
                break;
            case 5:
                $month = "Mayo";
                break;
            case 6:
                $month = "Junio";
                break;
            case 7:
                $month = "Julio";
                break;
            case 8:
                $month = "Agosto";
                break;
            case 9:
                $month = "Septimbre";
                break;
            case 10:
                $month = "Octubre";
                break;
            case 11:
                $month = "Noviembre";
                break;
            case 12:
                $month = "Diciembre";
                break;
        }
        return $month;
    }

    public function render()
    {
        $year = gmdate("Y");
        $initDay = "01";
        
        $ingresoPorMes=[];
        $grafico=[];
        for ($i = 1; $i <= 12; $i++) {
            $endDay = date("t", strtotime($year . "-" . $i . "-" . $initDay));
            $month = $this->getMonth($i);
            $initDate = $year."-".$i."-".$initDay;
            $endDate = $year."-".$i."-".$endDay;
            $ingresoPorMes['label'][]=$month;
            $ingresoPorMes['data'][] = Alquiler::select('*')->whereBetween('desde',[$initDate,$endDate])->sum('valor');
            $grafico['label'][]=$month;
            $grafico['data'][] = Alquiler::select('*')->whereBetween('desde',[$initDate,$endDate])->sum('valor');
        }
        $jsonValues['grafico'] = json_encode($grafico);

        return view('livewire.reporte4.view', 
            [
                'ingresoPorMes' => $ingresoPorMes,
                'grafico' => $jsonValues['grafico']
            ]
        );
    }
    public function pdf()
    {
        $year = gmdate("Y");
        $initDay = "01";
        
        $ingresoPorMes=[];
        $grafico=[];
        for ($i = 1; $i <= 12; $i++) {
            $endDay = date("t", strtotime($year . "-" . $i . "-" . $initDay));
            $month = $this->getMonth($i);
            $initDate = $year."-".$i."-".$initDay;
            $endDate = $year."-".$i."-".$endDay;
            $ingresoPorMes['label'][]=$month;
            $ingresoPorMes['data'][] = Alquiler::select('*')->whereBetween('desde',[$initDate,$endDate])->sum('valor');
            $grafico['label'][]=$month;
            $grafico['data'][] = Alquiler::select('*')->whereBetween('desde',[$initDate,$endDate])->sum('valor');
        }
        $jsonValues['grafico'] = json_encode($grafico);

        // return view('livewire.reporte4.pdf', 
        //     [
        //         'ingresoPorMes' => $ingresoPorMes,
        //         'grafico' => $jsonValues['grafico']
        //     ]
        // );


        $pdf = PDF::loadView('livewire.reporte4.pdf',compact('ingresoPorMes'));
        return $pdf->download('Reporte-4-'.' - '.date('d-m-y_H:i:s').'.pdf');
    }
}
