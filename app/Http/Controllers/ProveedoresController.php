<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Proveedores;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $proveedores = Proveedores::all();
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
        return response($proveedores, 201);
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
            if($request->nombre==null||$request->descripcion==null||$request->telefono==null||$request->email==null){
                return response('Need more data', 409);
            }
            $rol = new Proveedores;
            $rol->nombre = $request->nombre;
            $rol->descripcion = $request->descripcion;
            $rol->telefono = $request->telefono;
            $rol->email = $request->email;
            $rol->save();
        } catch(QueryException $e) {

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
            $rol = Proveedores::findOrFail($id);
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
            $rol = Proveedores::findOrFail($id);
            if($request->nombre!=null){
                $rol->nombre = $request->nombre;
            }if($request->descripcion!=null){
                $rol->descripcion = $request->descripcion;
            }if($request->telefono!=null){
                $rol->telefono = $request->telefono;
            }
            if($request->email!=null){
                $rol->email = $request->email;
            }
            $rol->save();
        } catch(QueryException $e) {
            return ($e=="SQLSTATE[23000]")?response( 'El slug ya existe', 409):response( $e->getMessage(), 501);
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
            $rol = Proveedores::findOrFail($id);
            $rol->delete();
    
            return response("El recurso ha sido borrado",201);
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
    }
}
