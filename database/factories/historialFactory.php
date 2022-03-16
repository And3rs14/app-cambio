<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Info_values;
use Illuminate\Database\Eloquent\Factories\Factory;

class historialFactory extends Factory
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
            'fecha_consulta' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),

            'user_id' => User::pluck('id')->random(),
            'info_value_id' => Info_values::pluck('id')->random(),
        ];
    }
}
