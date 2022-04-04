<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $fillable =['sell_moneda','buy_moneda'];

    //Relación de 1 a muchos 
    public function info_values(){
        return $this->hasMany(Info_values::class);
    }
}
