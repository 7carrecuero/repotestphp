<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessesStep1Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [ 
            'description' => 'required',
            'department' => 'required',
            'municipalitie' => 'required',
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
