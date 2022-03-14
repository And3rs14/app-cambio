<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dates extends Model
{
    use HasFactory;
    //Habilitar asignacion masiva
    protected $fillable = ['name'];

    //Relacion muchos a muchos
    public function values()
    {
        return $this->belongsToMany(Value::class);
    }
}
