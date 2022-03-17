<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial extends Model
{
    use HasFactory;

    protected $fillable =['fecha_consulta','info_value_id','user_id'];

    //Relacion 1 a muchos inversa

    public function info_values(){
        return $this->belongsTo(Info_values::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
