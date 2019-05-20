<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessesStep2Request extends FormRequest
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
        $dt = \Carbon\Carbon::now()->toDateString();
        return [
            'initial_date' => 'date|required|before:final_date|after_or_equal:'.$dt,
            'final_date' => 'required|date|after:initial_date',
        ];

        $customMessages = [
            'required' => 'Este campo es obligatorio.',
            'string' => 'Este campo debe ser alfanumerico.',
            'unique' => 'Valor duplicado.',
            'email' => 'Este campo debe ser en formato de email.',
            'confirmed' => 'Deben ser iguales',
            'date' => 'Este campo debe contener una fecha',
            'before' => 'La fecha de inicio debe ser menor a la fecha final',
            'after' => 'La fecha de final debe ser mayor a la fecha inicial',
            'after' => 'La fecha de inicio debe ser mayor o igual a la fecha actual',
        ];
    
        $this->validate($request, $rules, $customMessages);

        
    }
}
