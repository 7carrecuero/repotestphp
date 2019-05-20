<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];

        $customMessages = [
            'required' => 'Este campo es obligatorio.',
            'string' => 'Este campo debe ser alfanumerico.',
            'unique' => 'Valor duplicado.',
            'email' => 'Este campo debe ser en formato de email.',
            'confirmed' => 'Deben ser iguales',
        ];
    
        $this->validate($request, $rules, $customMessages);
    }
}
