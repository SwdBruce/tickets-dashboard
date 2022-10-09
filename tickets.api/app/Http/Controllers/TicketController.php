<?php

namespace App\Http\Controllers;

use App\Models\TicketModel;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->success('Tickets obtenidos correctamente', ['tickets' => TicketModel::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->post(), [
            'titulo' => 'required|string|max:50',
            'descripcion' => 'required|string|max:500',
            'estado' => 'required|integer',
            'usuario_id' => 'required|integer',
            'categoria_id' => 'required|integer',
            'area_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->error('Parámetros incorrectos.', $validator->errors()->toArray());
        }

        $ticket = TicketModel::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'usuario_id' => $request->usuario_id,
            'categoria_id' => $request->categoria_id,
            'area_id' => $request->area_id
        ]);

        return response()->success('Ticket creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = TicketModel::find($id);

        if (!$ticket) {
            return response()->error('Ticket no encontrado');
        }

        return response()->success('Ticket obtenido correctamente', ['ticket' => $ticket]);
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
        $ticket = TicketModel::find($id);

        if (!$ticket) {
            return response()->error('Ticket no encontrado');
        }

        $validator = Validator::make($request->post(), [
            'titulo' => 'required|string|max:50',
            'descripcion' => 'required|string|max:500',
            'estado' => 'required|integer',
            'usuario_id' => 'required|integer',
            'categoria_id' => 'required|integer',
            'area_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->error('Parámetros incorrectos.', $validator->errors()->toArray());
        }

        if ($request->titulo) {
            $ticket->titulo = $request->titulo;
        }
        if ($request->descripcion) {
            $ticket->descripcion = $request->descripcion;
        }
        if ($request->estado) {
            $ticket->estado = $request->estado;
        }
        if ($request->usuario_id) {
            $ticket->usuario_id = $request->usuario_id;
        }
        if ($request->categoria_id) {
            $ticket->categoria_id = $request->categoria_id;
        }
        if ($request->area_id) {
            $ticket->area_id = $request->area_id;
        }

        $ticket->save();

        return response()->success('Ticket actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = TicketModel::find($id);

        if (!$ticket) {
            return response()->error('Ticket no encontrado');
        }

        $ticket->delete();

        return response()->success('Ticket eliminado correctamente');
    }

    public function procesar()
    {
        $id = request()->id;
        $ticket = TicketModel::find($id);
//        $tickets = TicketModel::where('estado', TicketModel::CREADO)->get();
//
//        foreach ($tickets as $ticket) {
//            $ticket->estado = 2;
//            $ticket->save();
//        }

        return response()->success('Tickets procesados correctamente');
    }
}
