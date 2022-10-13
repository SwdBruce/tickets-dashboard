<?php

namespace App\Http\Controllers;

use App\Models\TicketModel;
use App\Models\UsuarioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = request()->query();
        $tipo = $query['tipo'] ?? null;
        $usuarios = match ($tipo) {
            'admin' => UsuarioModel::where('rol_id', UsuarioModel::ROLE_ADMIN)->get()->map(function ($usuario) {
                $usuario->area;
                return $usuario;
            }),
            'soporte' => UsuarioModel::where('rol_id', UsuarioModel::ROLE_SUPPORT)->get()->map(function ($usuario) {
                $usuario->area;
                return $usuario;
            }),
            'usuario' => UsuarioModel::where('rol_id', UsuarioModel::ROLE_USER)->get()->map(function ($usuario) {
                $usuario->area;
                return $usuario;
            }),
            default => UsuarioModel::all(),
        };

        return response()->success('Usuarios de tipo ' . $tipo . ' obtenidos correctamente', $usuarios->toArray());
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
            'username' => 'required|string|max:20',
            'password' => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'nombres' => 'required|string|max:50',
            'sexo' => 'required|string|max:1',
            'estado' => 'required|integer',
            'rol_id' => 'required|integer',
            'area_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->error('Parámetros incorrectos.', $validator->errors()->toArray());
        }

        $usuario = UsuarioModel::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'apellidos' => $request->apellidos,
            'nombres' => $request->nombres,
            'sexo' => $request->sexo,
            'estado' => $request->estado,
            'rol_id' => $request->rol_id,
            'area_id' => $request->area_id
        ]);

        return response()->success('Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = UsuarioModel::find($id);

        if (! $usuario) {
            return response()->error('Usuario no encontrado');
        }

        return response()->success('Usuario obtenido correctamente', ['usuario' => $usuario]);
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
        $usuario = UsuarioModel::find($id);

        if (! $usuario) {
            return response()->error('Usuario no encontrado');
        }

        $validator = Validator::make($request->post(), [
            'password' => 'string|max:50',
            'apellidos' => 'string|max:50',
            'nombres' => 'string|max:50',
            'sexo' => 'string|max:1',
            'estado' => 'integer',
            'rol_id' => 'integer',
            'area_id' => 'integer'
        ]);

        if ($validator->fails()) {
            return response()->error('Parámetros incorrectos.', $validator->errors()->toArray());
        }

        if ($request->password) {
            $usuario->password = bcrypt($request->password);
        }
        if ($request->apellidos) {
            $usuario->apellidos = $request->apellidos;
        }
        if ($request->nombres) {
            $usuario->nombres = $request->nombres;
        }
        if ($request->sexo) {
            $usuario->sexo = $request->sexo;
        }
        if ($request->estado) {
            $usuario->estado = $request->estado;
        }
        if ($request->rol_id) {
            $usuario->rol_id = $request->rol_id;
        }
        if ($request->area_id) {
            $usuario->area_id = $request->area_id;
        }
        $usuario->save();

        return response()->success('Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = UsuarioModel::find($id);

        if (! $usuario) {
            return response()->error('Usuario no encontrado');
        }

        $usuario->delete();

        return response()->success('Usuario eliminado correctamente');
    }

    public function ticketAsignadosPorUsuario()
    {
        $id = request()->id;
        $tickets = TicketModel::where('asignado_id', $id)->where('estado', TicketModel::CREADO)->get();

        return response()->success('Tickets obtenidos correctamente', $tickets->toArray());
    }


    public function historialPorUsuario()
    {
        $id = request()->id;
        $tickets = TicketModel::where('asignado_id', $id)->where('estado', TicketModel::CERRADO)->orWhere('estado', TicketModel::PROCESADO)->get();

        return response()->success('Tickets obtenidos correctamente', $tickets->toArray());
    }
}
