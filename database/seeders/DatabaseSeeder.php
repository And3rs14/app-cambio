<?php

namespace Database\Seeders;

use App\Models\Date;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Value;
use App\Models\Info_value;
use App\Models\Year;
use App\Models\Month;
use App\Models\Day;
use App\Models\Historical;

use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    static $categories = [
        'Dolar',
        'Euro'
    ];
    
    public function run()
    {
        User::factory(10)->create();
        
        Value::factory(200)->create();

        foreach (self::$categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
            ]);
        }
        Date::factory(200)->create();
        
        Info_value::factory(200)->create();

        

        Historical::factory(200)->create();
        
    }
}
