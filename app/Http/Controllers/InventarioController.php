<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Inventario;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $inventario = Inventario::all();
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
        return response($inventario, 201);      
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
            if($request->nombre==null||$request->cantidad==null){
                return response('Need more data', 409);
            }
            $inventario = new Inventario;
            $inventario->nombre = $request->nombre;
            $inventario->cantidad = $request->cantidad;
            $inventario->save();
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
            $inventario = Inventario::findOrFail($id);
            return response($inventario, 201);
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
            $inventario = Inventario::findOrFail($id);
            if($request->nombre!=null){
                $inventario->nombre = $request->nombre;
            }if($request->cantidad!=null){
                $inventario->cantidad = $request->cantidad;
            }
            $inventario->save();
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
            $inventario = Inventario::findOrFail($id);
            $inventario->delete();
    
            return response("El recurso ha sido borrado",201);
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
    }
}
