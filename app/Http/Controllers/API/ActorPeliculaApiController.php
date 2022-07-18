<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Actore;
use App\Models\ActorPelicula;
use Illuminate\Http\Request;

class ActorPeliculaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ActorPelicula::select('*')->get();
        
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

            'act_id' => 'required',
			'pel_id' => 'required',
			'papel' => 'required',
        ]);

        $actorPelicula = new ActorPelicula;
        
        $actorPelicula->act_id = $request->input('act_id'); //retrieving user inputs
        $actorPelicula->pel_id = $request->input('pel_id');  //retrieving user inputs
        $actorPelicula->papel = $request->input('papel');  //retrieving user inputs
        $actorPelicula->save(); //storing values as an object
        return $actorPelicula; //returns the stored value if the operation was successful.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ActorPelicula::findorFail($id); //searches for the object in the database using its id and returns it.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

            'act_id' => 'required',
			'pel_id' => 'required',
			'papel' => 'required',
        ]);

        $actorPelicula = ActorPelicula::findorFail($id);
        $actorPelicula->act_id = $request->input('act_id'); //retrieving user inputs
        $actorPelicula->pel_id = $request->input('pel_id');  //retrieving user inputs
        $actorPelicula->papel = $request->input('papel');  //retrieving user inputs
        $actorPelicula->save(); //storing values as an object
        return $actorPelicula; //returns the stored value if the operation was successful.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actorPelicula = ActorPelicula::findorFail($id);
        if ($actorPelicula->delete()){
            return 'deleted succesfully';
        }
    }
}
