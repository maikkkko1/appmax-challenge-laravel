<?php
namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserService {
    public function create($data) {
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }
}
