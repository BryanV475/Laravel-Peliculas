<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Socio;
use Illuminate\Http\Request;

class SocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Socio::orderBy('created_at', 'asc')->get();
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
            'cedula' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
        ]);
  
        $socio = new Task;
        $socio->id = $request->input('id'); //retrieving user inputs
        $socio->cedula = $request->input('cedula');  //retrieving user inputs
        $socio->nombre = $request->input('nombre');  //retrieving user inputs
        $socio->direccion = $request->input('direccion'); //retrieving user inputs
        $socio->telefono = $request->input('telefono');  //retrieving user inputs
        $socio->correo = $request->input('correo'); //retrieving user inputs
        $socio->save(); //storing values as an object
        return $socio; //returns the stored value if the operation was successful.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Socio::findorFail($id);
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
        $this->validate($request, [ // the new values should not be null
            'id' => 'required',
            'cedula' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
        ]);
  
        $socio = Task::findorFail($id); // uses the id to search values that need to be updated.
        $socio->id = $request->input('id'); //retrieving user inputs
        $socio->cedula = $request->input('cedula');  //retrieving user inputs
        $socio->nombre = $request->input('nombre');  //retrieving user inputs
        $socio->direccion = $request->input('direccion'); //retrieving user inputs
        $socio->telefono = $request->input('telefono');  //retrieving user inputs
        $socio->correo = $request->input('correo'); //retrieving user inputs
        $socio->save();//saves the values in the database. The existing data is overwritten.
        return $socio; // retrieves the updated object from the database
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socio = Socio::findorFail($id); //searching for object in database using ID
        if ($socio->delete()) { //deletes the object
            return 'deleted successfully'; //shows a message when the delete operation was successful.
        }
    }
}
