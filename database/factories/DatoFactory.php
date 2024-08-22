<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Dato;

class DatoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dato::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'direccion' => $this->faker->numberBetween(-100000, 100000),
            'ruc' => $this->faker->numberBetween(-100000, 100000),
            'telefono' => $this->faker->numberBetween(-100000, 100000),
            'imagen' => $this->faker->word(),
        ];
    }
}
