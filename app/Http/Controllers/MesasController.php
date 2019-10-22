<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Mesas;

class MesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $mesas = Mesas::all();
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
        return response($mesas, 201);
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
            if($request->status==null||$request->number==null){
                return response('Need more data', 411);
            }
            $mesa = new Mesas;
            $mesa->status = $request->status;
            $mesa->number = $request->number;
            $mesa->save();
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
            $mesa = Mesas::findOrFail($id);
            return response($mesa, 201);
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
            $mesa = Mesas::findOrFail($id);
            if($request->status!=null){
                $mesa->status = $request->status;
            }if($request->number!=null){
                $mesa->number = $request->number;
            }
            $mesa->save();
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
            $mesa = Mesas::findOrFail($id);
            $mesa->delete();
    
            return response("El recurso ha sido borrado",201);
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
    }
}
