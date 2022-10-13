<?php

namespace App\Http\Controllers;

use App\Models\UsuarioModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request) : Response
    {
        $validator = Validator::make($request->post(), [
            'username' => 'required|string|max:20',
            'password' => 'required|string|max:50'
        ]);

        if ($validator->fails()) {
            return response()->error('Parámetros incorrectos.', $validator->errors()->toArray());
        }

        $credentials = request(['username', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->error('Usuario o contraseña incorrectos.');
        }

        $user = UsuarioModel::where('username', $request->username)->first();
        $user->rol;

        $token = auth()->claims(['user_data' => $user])->attempt($credentials);

        return response()->success('Inicio de sesión exitoso', ['token' => $token]);
    }

    public function logout(Request $request): Response
    {
        $request->user()->currentAccessToken()->delete();

        return response()->success('Cierre de sesión exitoso');
    }
}
