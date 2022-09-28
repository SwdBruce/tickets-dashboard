<?php

namespace App\Http\Controllers;

use App\Models\UsuarioModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) : Response
    {
        $validator = Validator::make($request->post(), [
            'username' => 'required|string|max:20',
            'password' => 'required|string|max:50'
        ]);

        if ($validator->fails()) {
            return response()->error('Parámetros incorrectos.', $validator->errors()->toArray());
        }

        $user = UsuarioModel::where('username', $request->username)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->error('Credenciales incorrectas');
        }

        $token = $user->createToken($request->username)->plainTextToken;

        return response()->success('Inicio de sesión exitoso', ['token' => $token]);
    }

    public function logout(Request $request): Response
    {
        $request->user()->currentAccessToken()->delete();

        return response()->success('Cierre de sesión exitoso');
    }
}
