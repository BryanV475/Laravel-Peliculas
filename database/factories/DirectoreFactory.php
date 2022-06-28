<?php

namespace Database\Factories;

use App\Models\Directore;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DirectoreFactory extends Factory
{
    protected $model = Directore::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
