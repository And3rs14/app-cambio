<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween($startDate = '-20 years', $endDate = 'now', $timezone = null),
        ];
    }
}
