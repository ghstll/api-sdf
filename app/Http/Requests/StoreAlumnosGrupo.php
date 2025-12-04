<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlumnosGrupo extends FormRequest
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
            'alumno_id' => "required|string|unique:alumnos_grupos",
            'grupo_id' => "required|string"
          ];
    }
    public function messages()
    {
      return [
        "alumno_id.required" => "Id de alumno no valido.",
        "alumno_id.string" => "Id de alumno no valido.",
        "alumno_id.unique" => "Este alumno ya esta asignado a un grupo.",
        "grupo_id.required" => "Id de grupo no valido.",
        "grupo_id.string" => "Id de grupo no valido."
      ];
    }

}
