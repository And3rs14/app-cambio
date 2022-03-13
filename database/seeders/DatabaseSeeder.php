<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Date;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Value;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::factory(10)->create();

        Category::factory(2)->create();

        Date::factory(100)->create();

        Value::factory(100)->create();

        //Category
        //Value
        //Date
        // \App\Models\User::factory(10)->create();
    }
}
