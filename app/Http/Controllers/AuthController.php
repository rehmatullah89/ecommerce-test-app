<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(AuthService $auth) {
        $this->auth = $auth;
    }

    public function register(Request $request) {
        $user = $this->auth->register($request->all());
        return response()->json($user, 201);
    }

    public function login(Request $request) {
        $token = $this->auth->login($request->only('email', 'password'));
        return $token ? response()->json(compact('token')) :
               response()->json(['error' => 'Invalid credentials'], 401);
    }

    public function me() {
        return response()->json($this->auth->me());
    }
}
