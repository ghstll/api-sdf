<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRespuestaRequest extends FormRequest
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
          "pregunta_id" => "required|integer",
          "texto" => "required|string",
          "es_correcta" => "required|boolean"
        ];
    }
    
    public function messages() : array{
      return [
        "pregunta_id.required" => "ID de pregunta no valida",
        "pregunta_id.integer" => "ID de pregunta no valida",
        "texto.string" => "Texto de la respuesta no valida",
        "texto.required" => "Texto de respuesta no valido",
        "es_correcta.boolean" => "Este campo debe tener un tipo de dato Bool (True o False)",
        "es_correcta.required" => "Este campo debe tener un tipo de dato Bool (True o False)"
      ];
    }
}
