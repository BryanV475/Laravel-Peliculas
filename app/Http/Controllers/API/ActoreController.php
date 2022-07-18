<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Actore;
use Illuminate\Http\Request;

class ActoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Actore::orderBy('created_at', 'asc')->get();  //returns values in ascending order
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

            'nombre' => 'required',
            'sex_id' => 'required',
        ]);

        $actor = new Actore;
        $actor->id = $request->input('id'); //retrieving user inputs
        $actor->nombre = $request->input('nombre');  //retrieving user inputs
        $actor->sex_id = $request->input('sex_id');  //retrieving user inputs
        $actor->save(); //storing values as an object
        return $actor; //returns the stored value if the operation was successful.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Actore::findorFail($id); //searches for the object in the database using its id and returns it.
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
            'nombre' => 'required',
            'sex_id' => 'required',
        ]);
        $actor = Actore::findorFail($id);
        $actor->id = $request->input('id'); //retrieving user inputs
        $actor->nombre = $request->input('nombre');  //retrieving user inputs
        $actor->sex_id = $request->input('sex_id');  //retrieving user inputs
        $actor->save(); //storing values as an object
        return $actor; //returns the stored value if the operation was successful.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actor = Actore::findorFail($id); //searching for object in database using ID
        if ($actor->delete()) { //deletes the object
            return 'deleted successfully'; //shows a message when the delete operation was successful.
        }
    }
}
