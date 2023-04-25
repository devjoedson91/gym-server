<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {

        $crendentials = $request->all(['email', 'password']);

        // autenticação de usuario (email e senha)

        $token = auth('api')->attempt($crendentials);

        if ($token) {
            
            return response()->json(['token' => $token]);

        } else {

            return response()->json(['error' => 'Usuario ou senha inválido'], 403);

            // 401 = unauthorized
            // 403 = forbidden -> proibido 
        }


    }

    public function logout() {

        auth('api')->logout();
        return response()->json(['msg' => 'Logout realizado com sucesso']);

    }

    public function refresh() {

        $token = auth('api')->refresh(); // cliente encaminhe um jwt valido
        return response()->json(['token' => $token]);

    }

    public function me() {

        return response()->json(auth()->user());

    }
}
