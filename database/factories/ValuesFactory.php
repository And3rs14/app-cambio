<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
            'sell_moneda' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 3.00, $max = 4.00),
            'date' => $this->faker->dateTimeBetween($startDate = '-20 years', $endDate = 'now', $timezone = null),

            'category_id' => Category::pluck('id')->random(),
            
        ];
    }
}
