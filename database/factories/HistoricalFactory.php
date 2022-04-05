<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Info_value;
use App\Models\User;
class HistoricalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'info_value_id' => Info_value::pluck('id')->random(),
        ];
    }
}
