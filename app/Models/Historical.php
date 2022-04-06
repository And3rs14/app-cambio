<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historical extends Model
{
    use HasFactory;

    protected $fillable =['info_value_id','user_id'];

    //Relacion 1 a muchos inversa

    public function Info_values(){
        return $this->belongsTo(Info_value::class,'info_value_id','id');
    }
    public function Users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
