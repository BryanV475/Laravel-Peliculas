<?php

namespace Database\Factories;

use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PeliculaFactory extends Factory
{
    protected $model = Pelicula::class;

    public function definition()
    {
        return [
			'gen_id' => $this->faker->name,
			'dir_id' => $this->faker->name,
			'for_id' => $this->faker->name,
			'nombre' => $this->faker->name,
			'costo' => $this->faker->name,
			'estreno' => $this->faker->name,
        ];
    }
}
