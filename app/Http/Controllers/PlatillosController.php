<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Platillos;
use App\Categorias;

class PlatillosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $platillos = Categorias::with('infoPlatillo')->select('id', 'nombre', 'URL')->get();
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
        return response($platillos, 201);   
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
            if($request->nombre==null||$request->tipo==null||$request->precio==null
            ||$request->URL==null||$request->categoria_id==null){
                return response('Need more data', 409);
            }
            $platillos = new Platillos;
            $platillos->nombre = $request->nombre;
            $platillos->tipo = $request->tipo;
            $platillos->precio = $request->precio;
            $platillos->URL= $request->URL;
            $platillos->categoria_id = $request->categoria_id;
            $platillos->save();
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
            $platillos = Platillos::findOrFail($id);
            return response($platillos, 201);
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
            $platillos = Platillos::findOrFail($id);
            if($request->nombre!=null){
                $platillos->nombre = $request->nombre;
            }if($request->tipo!=null){
                $platillos->tipo = $request->tipo;
            }if($request->precio!=null){
                $platillos->precio = $request->precio;
            }if($request->URL!=null){
                $platillos->URL = $request->URL;
            }if($request->categoria_id!=null){
                $platillos->categoria_id = $request->categoria_id;
            }
            $platillos->save();
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
            $platillos = Platillos::findOrFail($id);
            $platillos->delete();
    
            return response("El recurso ha sido borrado",201);
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
    }
}
