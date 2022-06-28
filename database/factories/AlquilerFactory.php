<?php

namespace Database\Factories;

use App\Models\Alquiler;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AlquilerFactory extends Factory
{
    protected $model = Alquiler::class;

    public function definition()
    {
        return [
			'soc_id' => $this->faker->name,
			'pel_id' => $this->faker->name,
			'desde' => $this->faker->name,
			'hasta' => $this->faker->name,
			'valor' => $this->faker->name,
			'entrega' => $this->faker->name,
        ];
    }
}
