<?php

namespace Database\Factories;

use App\Models\Actore;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActoreFactory extends Factory
{
    protected $model = Actore::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'sex_id' => $this->faker->name,
        ];
    }
}
