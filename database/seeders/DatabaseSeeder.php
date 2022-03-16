<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\historial;
use App\Models\User;
use App\Models\Info_values;
use App\Models\Values;
use Illuminate\Database\Seeder;

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
        
        Values::factory(200)->create();

        Info_values::factory(200)->create();

        historial::factory(100)->create();
        // \App\Models\User::factory(10)->create();
    }
}
