<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest{
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
  public function rules():array{ 
    return [
      'nombre' => 'required|string', // cuando se valide la request el required lo que hace es
                                      //validarlo , unicamente si se encuentra en el cuerpo de la request
      'email' => 'required|string|email|unique:users',
      'telefono' => 'required|string|min:10|max:10',
      'password' => 'required|string|min:8',
      'rol' => 'required|string',
      'img_url' => 'sometimes|string'
    ];
  }
  public function messages() : array{
    return [
      'nombre.required' => "Nombre no valido",
      'nombre.string' => 'Nombre no valido',
      'email.required' => 'Correo no valido',
      'email.email' => 'Correo no valido',
      'email.unique' => 'Este correo ya esta en uso',
      'email.string' => 'Correo no valido',
      'telefono.required' => 'Telefono no valido',
      'telefono.min' => 'El numero de telefono debe tener 10 caracteres',
      'telefono.max' => 'El numero de telefono debe tener 10 caracteres',
      'password.min' => 'La contraseña debe tene  r al menos 8 caracteres',
      'password.required' => 'Contraseña no valida',
      'password.string' => 'Contraseña no valida',
      'rol.required' => 'Rol requerido',
      'rol.string' => 'Rol invalido',
      'img_url' => 'Img requerida'
    ];
  }
}
