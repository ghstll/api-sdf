<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActividadRequest extends FormRequest
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
          "docente_id" => "sometimes|string",
          "titulo" => "sometimes|string",
          "descripcion" => "sometimes|string"
        ];
    }
    public function messages()
        {
            return [
              "docente_id.required" => "ID de Docente no valido",
              "docente_id.string" =>  "ID de Docente no valido",
              "titulo.required" => "Titulo de actividad no valido",
              "titulo.string" =>  "Titulo de actividad valido",
              "descripcion.required" => "Descripcion de actividad no valida valido",
              "descripcion.string" =>  "Descripcion de actividad no valida valido",
            ];
        }
}
