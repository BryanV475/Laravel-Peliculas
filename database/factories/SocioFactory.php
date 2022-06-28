<?php

namespace Database\Factories;

use App\Models\Socio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SocioFactory extends Factory
{
    protected $model = Socio::class;

    public function definition()
    {
        return [
			'cedula' => $this->faker->name,
			'nombre' => $this->faker->name,
			'direccion' => $this->faker->name,
			'telefono' => $this->faker->name,
			'correo' => $this->faker->name,
        ];
    }
}
