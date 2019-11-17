<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entrada_Productos as entProd;

class EntradaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $entProd = entProd::with('proveedor','producto')->get();
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
        return response($entProd, 201);
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
            if($request->proveedor_id==null||$request->producto_id==null||$request->cantidad==null||$request->precio==null){
                return response('Need more data', 411);
            }
            $entProd = new entProd;
            $entProd->proveedor_id = $request->proveedor_id; 
            $entProd->producto_id = $request->producto_id;
            $entProd->cantidad = $request->cantidad;
            $entProd->precio = $request->precio;
            $entProd->save();
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
    public function showProv($id)
    {
        try{
            $entProd = entProd::where('proveedor_id',$id)->with('proveedor','producto')->get();
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
        return response($entProd, 201);
    }

    public function showProd($id)
    {
        try{
            $entProd = entProd::where('producto_id',$id)->with('proveedor','producto')->get();
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
        return response($entProd, 201);
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
            $entProd = entProd::findOrFail($id);
            if($request->proveedor_id==null){
                $entProd->proveedor_id = $request->proveedor_id;
            }if($request->producto_id!=null){
                $entProd->producto_id = $request->producto_id;
            }if($request->cantidad!=null){
                $entProd->cantidad = $request->cantidad;
            }if($request->precio!=null){
                $entProd->precio = $request->precio;
            }
            $entProd->save();
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
            $entProd = entProd::findOrFail($id);
            $entProd->delete();
    
            return response("El recurso ha sido borrado",201);
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
    }
}
