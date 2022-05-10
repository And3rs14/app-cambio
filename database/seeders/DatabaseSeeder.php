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

    
    /*
    static $users_email = [
        
        'billbardales@gmail.com',
        'jammyrrojasteagua@gmail.com'  

    ];
    static $users_name = [

        'Bill',
        'Jammyr'

    ];
    static $users_pass = [
    
        '12345678',
        '12345678'

    ];
    */

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

        /*
        foreach (self::$users_name as $name) {
            foreach (self::$users_email as $email) {
                foreach (self::$users_pass as $pass) {
                    DB::table('users')->insert([
                        'name' => $name
                    ]);
                    DB::table('users')->insert([
                        'email' => $email
                    ]);
                    DB::table('users')->insert([
                        'password' => $pass
                    ]);
                }
            }
        }
        */

        //Datos de usuario
        /*for ($i=0; $i < 2; $i++) { 
            DB::table ('users')->insert([
                "name" => $users_name[i],
                "email" => $users_email[i],
                "password" => $users_pass[i]
            ]);
        }
        */
        Date::factory(50)->create();
        
        Info_value::factory(100)->create();
    }
}
