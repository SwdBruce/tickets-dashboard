<?php

namespace App\Http\Controllers;

use App\Models\TicketModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'usuario_id' => 'required|integer',
            'area_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            $errores = $validator->errors()->toArray();
            // obtener el primer error
            $error = array_shift($errores);
            return response()->error('Parámetros incorrectos: '  . $error[0] ?? $error[0], $errores);
        }

        $ticket = TicketModel::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'estado' => TicketModel::CREADO,
            'usuario_id' => $request->usuario_id,
            'area_id' => $request->area_id,
            'fecha_creacion_txt' => date('Y-m-d')
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
            'descripcion' => 'string|max:1000',
            'estado' => 'integer',
            'usuario_id' => 'integer',
            'asignado_id' => 'integer',
            'categoria_id' => 'integer',
            'impacto_id' => 'integer',
            'urgencia_id' => 'integer',
            'area_id' => 'integer'
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
        if ($request->asignado_id) {
            $ticket->asignado_id = $request->asignado_id;
        }
        if ($request->categoria_id) {
            $ticket->categoria_id = $request->categoria_id;
        }
        if ($request->area_id) {
            $ticket->area_id = $request->area_id;
        }
        if ($request->impacto_id) {
            $ticket->impacto_id = $request->impacto_id;
        }
        if ($request->urgencia_id) {
            $ticket->urgencia_id = $request->urgencia_id;
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

    public function cerrar()
    {
        $id = request()->id;
        $ticket = TicketModel::find($id);
        $ticket->estado = TicketModel::CERRADO;
        $ticket->save();

        return response()->success("Ticket #$id cerrado correctamente");
    }

    public function misTickets()
    {
        $id = request()->id;
        $tickets = TicketModel::where('usuario_id', $id)->orderBy('id', 'DESC')->get()->take(20)->map(function ($ticket) {
            $ticket->usuario;
            $ticket->asignado;
            $ticket->categoria;
            $ticket->impacto;
            $ticket->urgencia;
            return $ticket;
        });

        return response()->success('Tickets obtenidos correctamente', $tickets->toArray());
    }
}
