<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Value;
use App\Models\Category;

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
            
            'value_id' => Value::pluck('id')->random(),
            'category_id' => Category::pluck('id')->random(),
            
        ];
    }
}
