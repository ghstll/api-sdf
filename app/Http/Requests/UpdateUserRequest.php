<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Middleware\TrustProxies;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
          "nombre" => "sometimes|string",
          "email" => "sometimes|string|email|unique:users,email,".$this->route('id'),
          'telefono' => 'sometimes|string|min:10|max:10',
        ];
    }
    public function messages() : array{
      return[
        "nombre.string" => "Nombre no valido",
        "email.email" => "Correo no valido",
        "email.string" => "Correo no valido",
        "email.unique" => "Correo ya en uso",
        'telefono.min' => 'El numero de telefono debe tener 10 caracteres',
        'telefono.max' => 'El numero de telefono debe tener 10 caracteres',
      ];
    }
}
