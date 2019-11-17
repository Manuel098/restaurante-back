<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meseros;
use App\Mesa_Meseros;

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
        try {
            if($request->mesero_id==null||$request->mesa_id==null){
                return response('Need more data', 409);
            }
            $mesMeseros = new Mesa_Meseros;
            $mesMeseros->mesero_id = $request->mesero_id;
            $mesMeseros->mesa_id = $request->mesa_id;
            $mesMeseros->save();
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
        return response('Successful', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $mesMeseros = Mesa_Meseros::findOrFail($id);
            return response($mesMeseros, 201);
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
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
        try{
            $mesMeseros = Mesa_Meseros::findOrFail($id);
            if($request->mesero_id!=null){
                $mesMeseros->mesero_id = $request->mesero_id;
            }if($request->mesa_id!=null){
                $mesMeseros->mesa_id = $request->mesa_id;
            }
            $mesMeseros->save();
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
        return response('Successful', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $mesMeseros = Mesa_Meseros::findOrFail($id);
            $mesMeseros->delete();
    
            return response("El recurso ha sido borrado",201);
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
    }
}
