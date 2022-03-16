<?php

namespace Database\Factories;
use App\Models\Values;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class Info_valuesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'date' => $this->faker->dateTimeBetween($startDate = '-20 years', $endDate = 'now', $timezone = null),

            'category_id' => Category::pluck('id')->random(),
            'value_id' => Values::pluck('id')->random(),

        ];

    }
}
