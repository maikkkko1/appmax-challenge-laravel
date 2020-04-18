<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function authenticateApi(Request $request) {
        $auth = Auth::attempt([
            'user' => $request['user'],
            'password' => $request['password']
        ]);

        if (!$auth) {
            return response()->json([
                'error' => true,
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = $request->user();

        $tokenResult = $user->createToken('random token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addDays(1);
        $token->save();

        return response()->json([
            'error' => false,
            'result' => [
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]
        ], 200);
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }
}
