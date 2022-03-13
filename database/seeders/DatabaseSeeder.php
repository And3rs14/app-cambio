<?php

namespace Database\Seeders;

use App\Models\Category;
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

        

        $category = new Category();

        $category->name = "Dolar";

        $category->save();

        $category = new Category();

        $category->name = "Euro";

        $category->save();

        Value::factory(100)->create();

        //Category
        //Value
        //Date
        // \App\Models\User::factory(10)->create();
    }
}
