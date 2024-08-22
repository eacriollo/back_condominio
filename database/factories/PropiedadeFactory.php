<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cuota;
use App\Models\Persona;
use App\Models\Propiedade;

class PropiedadeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Propiedade::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'numero_unidad' => $this->faker->word(),
            'ubicacion' => $this->faker->word(),
            'id_personas' => Persona::factory(),
            'id_coutas' => Cuota::factory(),
        ];
    }
}
