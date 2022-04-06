<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial extends Model
{
    use HasFactory;

    protected $fillable =['value_id','user_id'];

    //Relacion 1 a muchos inversa

    public function valores(){
        return $this->belongsTo(Values::class,'value_id','id');
    }
    
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
