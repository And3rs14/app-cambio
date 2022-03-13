<?php

namespace Database\Factories;

use App\Models\Value;
use App\Models\User;
use App\Models\Category;
use App\Models\Date;
use Illuminate\Database\Eloquent\Factories\Factory;

class ValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function definition()
    {
        
        return [
            'value' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 3, $max = 4.5),
            'category_id' => Category::pluck('id')->random(),
            'user_id' => User::pluck('id')->random(),
            'date_id' => Date::pluck('id')->random(),
            //'user_id' =>$this->faker->numberBetween($min = 1, $max = 10),
            
        ];
    }
}

