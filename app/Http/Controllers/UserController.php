<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Services\UserService;

class UserController extends Controller {
    private $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    public function create(UserCreateRequest $request) {
        $request->validated();

        $this->userService->create($request->all());

        return redirect('/')->with('alert-success', 'Cadastro realizado com sucesso!');
    }
}
