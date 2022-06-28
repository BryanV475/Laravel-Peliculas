<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Alquiler;
use App\Models\Pelicula;
use App\Models\Socio;
use App\Models\Formato;


use Illuminate\Http\Request;
//use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //conteos para tarjetas
        $peliculas = Pelicula::pluck('id')->count();
        $alquileres = Alquiler::pluck('id')->count();
        $generos = Genero::pluck('id')->count();
        $socios = Socio::pluck('id')->count();
        $formatos = Formato::pluck('id')->count();
        
        //Alquileres por Genero
        $nomGeneros = Genero::all('id', 'nombre');
        $arrayValores = [];

        foreach ($nomGeneros as $genero) {
            $i = 0;
            $arrayValores['label'][] = $genero->nombre;
            //Peliculas que pertenecen a cada genero
            $peliGen = Pelicula::where('gen_id', $genero->id)->get();
            foreach ($peliGen as $pelicula) {
                $i = $i + Alquiler::where('pel_id', $pelicula->id)->count();
            }
            $arrayValores['data'][] = $i;
        }

        //Primeras 3 peliculas
        $nomPel = Pelicula::all('id', 'nombre');
        $arrayValoresPel = [];

        foreach ($nomPel as $peli) {
            $i = 0;
            $arrayValoresPel['label'][] = $peli->nombre;
            $arrayValoresPel['data'][] = Alquiler::where('pel_id', $peli->id)->count();
        }
        $longitud = count($arrayValoresPel['data']);
        for ($i = 0; $i < $longitud; $i++) {
            for ($j = 0; $j < $longitud - 1; $j++) {
                if ($arrayValoresPel['data'][$j] < $arrayValoresPel['data'][$j + 1]) {
                    $temporaldata = $arrayValoresPel['data'][$j];
                    $temporalLabel = $arrayValoresPel['label'][$j];
                    $arrayValoresPel['data'][$j] = $arrayValoresPel['data'][$j + 1];
                    $arrayValoresPel['label'][$j] = $arrayValoresPel['label'][$j + 1];
                    $arrayValoresPel['data'][$j + 1] = $temporaldata;
                    $arrayValoresPel['label'][$j + 1] = $temporalLabel;
                }
            }
        }

        $primer3 = [];
        for ($i = 0; $i < 3; $i++) {
            $primer3['label'][$i] = $arrayValoresPel['label'][$i];
            $primer3['data'][$i] = $arrayValoresPel['data'][$i];
        }

        //formatosPeliculas
        $nomForm = Formato::all('id', 'nombre');
        $pelisFormatos = [];

        foreach ($nomForm as $formato) {
            $pelisFormatos['label'][] = $formato->nombre;
            $pelisFormatos['data'][] = Pelicula::where('for_id', $formato->id)->count();
        }

        //alquileres por mes
        $year = gmdate("Y");
        $initDay = "01";
        
        $alqPorMes=[];
        for ($i = 1; $i <= 12; $i++) {
            $endDay = date("t", strtotime($year . "-" . $i . "-" . $initDay));
            $month = $this->getMonth($i);
            $initDate = $year."-".$i."-".$initDay;
            $endDate = $year."-".$i."-".$endDay;
            
            $alqPorMes['label'][]=$month;
            $alqPorMes['data'][] = Alquiler::select('*')->whereBetween('desde',[$initDate,$endDate])->count();

        }

        //ingresos por mes
        $year = gmdate("Y");
        $initDay = "01";
        
        $ingresoPorMes=[];
        for ($i = 1; $i <= 12; $i++) {
            $endDay = date("t", strtotime($year . "-" . $i . "-" . $initDay));
            $month = $this->getMonth($i);
            $initDate = $year."-".$i."-".$initDay;
            $endDate = $year."-".$i."-".$endDay;
            $ingresoPorMes['label'][]=$month;
            $ingresoPorMes['data'][] = Alquiler::select('*')->whereBetween('desde',[$initDate,$endDate])->sum('valor');

        }
         
        //Pelicula por genero
        $pelisGeneros = [];

        foreach ($nomGeneros as $genero) {
            $pelisGeneros['label'][] = $genero->nombre;
            $pelisGeneros['data'][] = Pelicula::where('gen_id', $genero->id)->count();
        }
        
        //Valores a JSON
        $jsonValues['alquilerGeneros'] = json_encode($arrayValores);
        $jsonValues['pelisFormato'] = json_encode($pelisFormatos);
        $jsonValues['alqPorMes'] = json_encode($alqPorMes);
        $jsonValues['ingresoPorMes'] = json_encode($ingresoPorMes);
        $jsonValues['pelisGeneros'] = json_encode($pelisGeneros);

        //retorna la vista
        return view(
            'home',
            [
                'peliculas' => $peliculas,
                'alquileres' => $alquileres,
                'generos' => $generos,
                'socios' => $socios,
                'alquilerGeneros' => $jsonValues['alquilerGeneros'],
                'top3Peliculas' => $primer3,
                'pelisFormato' => $jsonValues['pelisFormato'],
                'alqPorMes' => $jsonValues['alqPorMes'],
                'ingresoPorMes'=>$jsonValues['ingresoPorMes'],
                'pelisGeneros'=>$jsonValues['pelisGeneros']
            ]
        );
    }
}
