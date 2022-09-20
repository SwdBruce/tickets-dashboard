<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
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

        return response()->success('Usuarios obtenidos correctamente', ['usuarios' => Usuario::all()]);
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

        $usuario = Usuario::create([
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
        $usuario = Usuario::find($id);

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
        $usuario = Usuario::find($id);

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
        $usuario = Usuario::find($id);

        if (! $usuario) {
            return response()->error('Usuario no encontrado');
        }

        $usuario->delete();

        return response()->success('Usuario eliminado correctamente');
    }
}
