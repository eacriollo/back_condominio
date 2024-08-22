<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\IngresosEgreso;
use App\Models\MetodoPago;
use App\Models\Propiedade;

class IngresosEgresoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IngresosEgreso::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'documento' => $this->faker->numberBetween(-10000, 10000),
            'valor' => $this->faker->randomFloat(0, 0, 9999999999.),
            'fecha' => $this->faker->dateTime(),
            'descripcion' => $this->faker->text(),
            'id_metodo_pago' => MetodoPago::factory(),
            'id_propiedades' => Propiedade::factory(),
        ];
    }
}
