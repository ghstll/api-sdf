<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrupoRequest extends FormRequest
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
          "nombre" => "sometimes|string|max:3|unique:grupos",
          "docente_id" => "sometimes|string"
        ];
    }
    public function messages():array{
      return [
        "nombre.required" => "Nombre no valido",
        "nombre.string" => "Nombre no valido",
        "nombre.max" => "El nombre debe tener como maximo 3 caracteres",
        "nombre.unique" => "Ya existe ese nombre de grupo en la tabla Grupos",
        "docente_id.required" => "ID no valida",        
        "docente_id.string" => "La ID debe pasarse como string",
      ];
    }
}
