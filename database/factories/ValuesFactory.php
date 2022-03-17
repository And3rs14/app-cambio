<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ValuesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'buy_moneda' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 3.00, $max = 4.00),
            'sell_moneda' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 3.00, $max = 4.00)
            
            
        ];
    }
}
