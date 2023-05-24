<?php

namespace Database\Factories;

use App\Models\Calificacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class CalificacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Calificacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($this->faker));
        return [
            'nombre' => $this->faker->foodName(),
            'puntualidad' => $this->faker->numberBetween(1, 100),
            'dificultad' => $this->faker->numberBetween(1, 100),
            'aprendizaje' => $this->faker->numberBetween(1, 100),
            'planeacion' => $this->faker->numberBetween(1, 100),
            'evaluacion' => $this->faker->numberBetween(1, 100),
            'descripcion' => $this->faker->realText(200, 2),
        ];
    }
}
