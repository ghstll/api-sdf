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
          "nombre" => "required|string|max:3|unique:grupos",
          "docente_id" => "nullable|integer|unique:grupos"
        ];
    }
    public function messages():array{
      return [
        "nombre.required" => "Nombre no valido",
        "nombre.string" => "Nombre no valido",
        "nombre.max" => "El nombre debe tener como maximo 3 caracteres",
        "nombre.unique" => "Ya existe un grupo con ese nombre, intenta con otro.",
        "docente_id.unique" => "El docente ya pertenece a un grupo.",
        "docente_id.integer" => "Id del docente no valido."
      ];
    }
}
