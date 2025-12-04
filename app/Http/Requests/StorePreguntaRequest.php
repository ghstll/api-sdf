<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePreguntaRequest extends FormRequest
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
          "actividad_id" => "required|integer",
          "enunciado" => "required|string",
        ];
    }
    public function messages()
        {
          return [
            "actividad_id.required" => "Se necesita ingresar el ID de la actividad a la que pertenece la pregunta",
            "actividad_id.integer" => "ID de actividad no valida",
            "enunciado.required" => "Es necesario ingresar el enunciado para la pregunta",
            "enunciado.string" => "Enunciado para la pregunta no valido"
          ];
        }
}
