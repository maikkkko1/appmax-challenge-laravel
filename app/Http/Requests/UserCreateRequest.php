<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'user' => 'required|unique:users',
            'name' => 'required|string|max:150',
            'password' => 'required'
        ];
    }

    public function messages() {
        return [
            'user.unique' => 'Usuário já cadastrado!',
            'user.required' => 'Usuário é obrigatório!',
            'name.required' => 'Nome é obrigatório!',
            'password.required' => 'Senha é obrigatória!'
        ];
    }
}
