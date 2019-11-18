<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Meseros;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return Ticket::with(
                'MesaMeser.mesero','MesaMeser.mesas',
                'MesaMeser.mesas.Platillos'
            )->get();
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
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
            if($request->mesa_mesero_id==null||$request->mesa==null||$request->total==null){
                return response('Need more data', 409);
            }
            $ticket = new Ticket;
            $ticket->mesa_mesero_id = $request->mesa_mesero_id;
            $ticket->mesa = $request->mesa;
            $ticket->total = $request->total;
            $ticket->save();
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
        try{
            $ticket = Ticket::findOrFail($id);
            if($request->mesa_mesero_id!=null){
                $ticket->mesa_mesero_id = $request->mesa_mesero_id;
            }if($request->mesa!=null){
                $ticket->mesa = $request->mesa;
            }if($request->total!=null){
                $ticket->total = $request->total;
            }
            $ticket->save();
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
            $rol = Proveedores::findOrFail($id);
            $rol->delete();
    
            return response("El recurso ha sido borrado",201);
        } catch(QueryException $e) {
            return response( $e->getMessage(), 501);
        }
    }
}
