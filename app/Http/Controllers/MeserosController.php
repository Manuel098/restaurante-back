<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Meseros;

class MeserosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $meseros = Meseros::all();
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
        return response($meseros, 201);
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
            if($request->nombre==null||$request->number==null){
                return response('Need more data', 409);
            }
            $meseros = new Meseros;
            $meseros->nombre = $request->nombre;
            $meseros->number = $request->number;
            $meseros->save();
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
            $meseros = Meseros::findOrFail($id);
            return response($meseros, 201);
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
            $meseros = Meseros::findOrFail($id);
            if($request->nombre!=null){
                $meseros->nombre = $request->nombre;
            }if($request->number!=null){
                $meseros->number = $request->number;
            }
            $meseros->save();
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
            $meseros = Meseros::findOrFail($id);
            $meseros->delete();
    
            return response("El recurso ha sido borrado",201);
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
    }
}
