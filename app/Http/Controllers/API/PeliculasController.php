<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pelicula::orderBy('created_at', 'asc')->get();
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
            'id' => 'required',
            'gen_id' => 'required',
            'dir_id' => 'required',
            'for_id' => 'required',
            'nombre' => 'required',
            'costo' => 'required',
            'estreno' => 'required',
        ]);
  
        $pelicula = new Pelicula;
        $pelicula->id = $request->input('id'); //retrieving user inputs
        $pelicula->gen_id = $request->input('gen_id');  //retrieving user inputs
        $pelicula->dir_id = $request->input('dir_id');  //retrieving user inputs
        $pelicula->for_id = $request->input('for_id'); //retrieving user inputs
        $pelicula->nombre = $request->input('nombre');  //retrieving user inputs
        $pelicula->costo = $request->input('costo'); //retrieving user inputs
        $pelicula->estreno = $request->input('estreno'); //retrieving user inputs
        $pelicula->save(); //storing values as an object
        return $pelicula; //returns the stored value if the operation was successful.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Pelicula::findorFail($id);
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
            'id' => 'required',
            'gen_id' => 'required',
            'dir_id' => 'required',
            'for_id' => 'required',
            'nombre' => 'required',
            'costo' => 'required',
            'estreno' => 'required',
        ]);
  
        $pelicula = Pelicula::findorFail($id); // uses the id to search values that need to be updated.
        $pelicula->id = $request->input('id'); //retrieving user inputs
        $pelicula->gen_id = $request->input('gen_id');  //retrieving user inputs
        $pelicula->dir_id = $request->input('dir_id');  //retrieving user inputs
        $pelicula->for_id = $request->input('for_id'); //retrieving user inputs
        $pelicula->nombre = $request->input('nombre');  //retrieving user inputs
        $pelicula->costo = $request->input('costo'); //retrieving user inputs
        $pelicula->estreno = $request->input('estreno'); //retrieving user inputs
        $pelicula->save();//saves the values in the database. The existing data is overwritten.
        return $pelicula; // retrieves the updated object from the database
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::findorFail($id); //searching for object in database using ID
        if ($pelicula->delete()) { //deletes the object
            return 'deleted successfully'; //shows a message when the delete operation was successful.
        }
    }
}
