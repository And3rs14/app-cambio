<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Date;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class Info_valueFactory extends Factory
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
            'user_id' => User::pluck('id')->random(),
            'category_id' => Category::pluck('id')->random(),
            'date_id' => Date::pluck('id')->random(),
        ];
    }
}
