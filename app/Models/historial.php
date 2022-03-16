<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial extends Model
{
    use HasFactory;

    //Relacion 1 a muchos inversa

    public function info_values(){
        return $this->belongsTo(info_values::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
