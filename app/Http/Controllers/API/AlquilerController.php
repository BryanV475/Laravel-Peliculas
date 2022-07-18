<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Alquiler;
use Illuminate\Http\Request;

class AlquilerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Alquiler::orderBy('created_at','asc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [ //inputs are not empty or null
            'soc_id' => 'required',
			'pel_id' => 'required',
			'desde' => 'required',
			'hasta' => 'required',
			'valor' => 'required',
			'entrega' => 'required',
        ]);

        $alquiler = new Alquiler;
        
        $alquiler->nombre = $request->input('nombre');  //retrieving user inputs
        $alquiler->sex_id = $request->input('sex_id');  //retrieving user inputs
        $alquiler->soc_id = $request->input('soc_id');
	    $alquiler->pel_id = $request->input('pel_id');
		$alquiler->desde = $request->input('desde');
		$alquiler->hasta = $request->input('hasta');
		$alquiler->valor = $request->input('valor');
		$alquiler->entrega = $request->input('entrega');

        $alquiler->save(); //storing values as an object
        return $alquiler; //returns the stored value if the operation was successful.
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Alquiler::findorFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [ //inputs are not empty or null
            'soc_id' => 'required',
			'pel_id' => 'required',
			'desde' => 'required',
			'hasta' => 'required',
			'valor' => 'required',
			'entrega' => 'required',
        ]);

        $alquiler = Alquiler::findorFail($id);
        
        $alquiler->nombre = $request->input('nombre');  //retrieving user inputs
        $alquiler->sex_id = $request->input('sex_id');  //retrieving user inputs
        $alquiler->soc_id = $request->input('soc_id');
	    $alquiler->pel_id = $request->input('pel_id');
		$alquiler->desde = $request->input('desde');
		$alquiler->hasta = $request->input('hasta');
		$alquiler->valor = $request->input('valor');
		$alquiler->entrega = $request->input('entrega');
        
        $alquiler->save(); //storing values as an object
        return $alquiler; //returns the stored value if the operation was successful.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alquiler = Alquiler::findorFail($id);
        if ($alquiler->delete()) { //deletes the object
            return 'deleted successfully'; //shows a message when the delete operation was successful.
        }
    }
}
