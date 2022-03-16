<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class values extends Model
{
    use HasFactory;

    protected $fillable =['sell_dolar','buy_dolar'];

    //Relación de 1 a muchos 
    public function info_values(){
        return $this->hasMany(info_values::class);
    }
}
