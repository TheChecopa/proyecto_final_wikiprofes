<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PuntuacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($this->faker));
        return [
            'nombre' => $this->faker->vegetableName(),
            'nrc' => $this->faker->numberBetween(0, 100)
            'id_profesor' => 0
        ];
    }
}
