<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meseros;

class MesaMeseroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data=array();
        $meseros = Meseros::with('pivot.mesas')->select('id','number','nombre')->get();
        foreach($meseros as $mesero){
            $mesas = array();
            foreach($mesero->pivot as $mesData){
                array_push($mesas, $mesData->mesas);
            }
            $newData = array(
                'id' =>  $mesero->id,   
                'nombre'=> $mesero->nombre,
                'number' => $mesero->number,
                'mesas' => $mesas
            );
            array_push($Data, $newData);
        }
        return response($Data, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
