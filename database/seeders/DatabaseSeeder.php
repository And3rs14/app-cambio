<?php

namespace Database\Seeders;

use App\Models\Date;
use App\Models\Info_value;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    static $categories = [
        'Dolar',
        'Euro'
    ];
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory(10)->create();
        
        //Value::factory(200)->create();

        foreach (self::$categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
            ]);
        }
        Date::factory(50)->create();
        
        Info_value::factory(100)->create();
    }
}
