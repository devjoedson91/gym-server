<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {

        // autenticação de usuario (email e senha)
        // retornar um token

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
