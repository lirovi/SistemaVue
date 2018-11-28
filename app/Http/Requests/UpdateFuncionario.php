<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFuncionario extends FormRequest
{
    
        public function authorize()
            {
                return true;
            }

        public function rules()
        {
            return [
                'email'=>'required|unique:funcionarios,email,'.$this->id.'|email'
            ];
        }

        public function messages()
        {
            return [
                'email.required' => 'El correo es requerido',
                'email.unique'  => 'El correo debe ser unico',
                'email.email'  => 'El formato del correo no es correcto'
            ];
        }
}