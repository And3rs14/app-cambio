<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Habilitar asignacion masiva
    protected $fillable =['name'];

    //Relación de 1 a muchos 
    public function values(){
        return $this->hasMany(Value::class);
    }
}
