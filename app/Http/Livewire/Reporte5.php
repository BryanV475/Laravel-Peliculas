<?php

namespace App\Http\Livewire;

use App\Models\Socio;
use Livewire\Component;
USE Barryvdh\DomPDF\Facade\Pdf as PDF;
class Reporte5 extends Component
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
        
        $socioPorMes=[];
        $grafico=[];
        for ($i = 1; $i <= 12; $i++) {
            $endDay = date("t", strtotime($year . "-" . $i . "-" . $initDay));
            $month = $this->getMonth($i);
            $initDate = $year."-".$i."-".$initDay;
            $endDate = $year."-".$i."-".$endDay;
            $socioPorMes['label'][]=$month;
            $socioPorMes['data'][] = Socio::select('*')->whereBetween('created_at',[$initDate,$endDate])->count();
            $grafico['label'][]=$month;
            $grafico['data'][] = Socio::select('*')->whereBetween('created_at',[$initDate,$endDate])->count();
        }
        $jsonValues['grafico'] = json_encode($grafico);

        return view('livewire.reporte5.view', 
            [
                'socioPorMes' => $socioPorMes,
                'grafico' => $jsonValues['grafico']
            ]
        );
    }
    public function pdf(){
        $year = gmdate("Y");
        $initDay = "01";
        
        $socioPorMes=[];
        $grafico=[];
        for ($i = 1; $i <= 12; $i++) {
            $endDay = date("t", strtotime($year . "-" . $i . "-" . $initDay));
            $month = $this->getMonth($i);
            $initDate = $year."-".$i."-".$initDay;
            $endDate = $year."-".$i."-".$endDay;
            $socioPorMes['label'][]=$month;
            $socioPorMes['data'][] = Socio::select('*')->whereBetween('created_at',[$initDate,$endDate])->count();
            $grafico['label'][]=$month;
            $grafico['data'][] = Socio::select('*')->whereBetween('created_at',[$initDate,$endDate])->count();
        }
        $jsonValues['grafico'] = json_encode($grafico);

        $pdf = PDF::loadView('livewire.reporte5.pdf',compact('socioPorMes'));
        return $pdf->download('Reporte-Socios-Mes'.' - '.date('d-m-y_H:i:s').'.pdf');
    }
}
