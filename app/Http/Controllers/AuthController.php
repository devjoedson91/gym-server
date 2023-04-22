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

        // retornar um token
        dd($token);
        return 'login';

    }

    public function logout() {

        return 'logout';

    }

    public function refresh() {

        return 'refresh';

    }

    public function me() {

        return 'me';

    }
}
