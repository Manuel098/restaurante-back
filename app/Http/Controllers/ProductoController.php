<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $p=Producto::all();
        }
        catch(QueryException $e){
            return response($e->getMessage(), 501);
        }
        return response($p,201);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            if($request->nombre==null){
                return response('Need more data', 409);
            }
            $rol = new Producto;
            $rol->nombre = $request->nombre;           
            $rol->save();
        } catch(QueryException $e) 
        {
            return ($e=="SQLSTATE[23000]")?response( 'Ingreso una dato ya existente', 409):response( $e->getMessage(), 501);
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
            $rol = Producto::findOrFail($id);
            return response($rol, 201);
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
            $rol = Producto::findOrFail($id);
            if($request->nombre!=null)
                $rol->nombre = $request->nombre;           
            $rol->save();
        } catch(QueryException $e) {
            return ($e=="SQLSTATE[23000]") ? response( 'El nombre ya existe', 409):response( $e->getMessage(), 501);
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
            $rol = Producto::findOrFail($id);
            $rol->delete();
    
            return response("El recurso ha sido borrado",201);
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
    }
}
