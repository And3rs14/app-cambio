<?php

namespace Database\Seeders;

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
    static $months = [
        'Enero',
        'Febrero',
        'Marzo',
        'Abril',
        'Mayo',
        'Junio',
        'Julio',
        'Agosto',
        'Septiembre',
        'Octubre',
        'Noviembre',
        'Diciembre',
    ];
    public function run()
    {
        User::factory(10)->create();
        
        Value::factory(200)->create();

        

        foreach (self::$categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ]);
        }
        
        foreach (self::$months as $month) {
            DB::table('months')->insert([
                'month' => $month,
            ]);
        }
        for ($i=1; $i < 32; $i++) { 
            DB::table('days')->insert([
                'day' => $i,
            ]);
        }
        for ($i=1940; $i < 2023; $i++) { 
            DB::table('years')->insert([
                'year' => $i,
            ]);
        }

        Info_value::factory(200)->create();

        for ($i=0; $i < 200; $i++) { 
            DB::table('date_value')->insert(
                [
                    'year_id' => Year::pluck('id')->random(),
                    'month_id' => Month::pluck('id')->random(),
                    'day_id' => Day::pluck('id')->random(),
                    'info_value_id' => Info_value::pluck('id')->random(),
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
                    //'user_id' => factory(AppUser::class)->create()->id,
                    //'skill_id' => factory(AppSkill::class)->create()->id,
                ]
            );
        }

        Historical::factory(200)->create();
        
    }
}
