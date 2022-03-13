<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    //Habilitar asignacion masiva
    protected $fillable =['date'];

    //Relación de 1 a muchos 

    public function values(){
        return $this->hasMany(Value::class);
    }
}
