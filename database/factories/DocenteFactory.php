<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Docente>
 */
class DocenteFactory extends Factory{
  // protected static ?string $password;
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition():array{
    return [
      'nombre' => fake()->name(),
      'email' => fake()->unique()->safeEmail(),
      'telefono' => fake()->unique()->numerify('##########'),
      'password' => Hash::make(fake()->password()),
    ];
  } 
}
