<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    public function authenticate(Request $request) {
        $auth = Auth::attempt([
            'user' => $request['user'],
            'password' => $request['password']
        ]);

        if (!$auth) {
            return redirect('/')->with('alert-danger', 'Usuário ou senha inválidos!');
        }

        return redirect('/');
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }
}
