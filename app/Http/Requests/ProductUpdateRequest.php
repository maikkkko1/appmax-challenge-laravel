<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest {
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
            'title' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Título é obrigatório!',
            'description.required' => 'Descrição é obrigatória!',
            'quantity.required' => 'Quantidade é obrigatória!',
            'price.required' => 'Preço é obrigatório!',
        ];
    }
}
