<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class info_value extends Model
{
    use HasFactory;


    protected $fillable =['date'];
    
    //Relación de 1 a muchos    
    public function historials(){
        return $this->hasMany(historials::class);
    }

    //Relacion 1 a muchos inversa

    public function category(){
        return $this->belongsTo(category::class);
    }
    public function values(){
        return $this->belongsTo(values::class);
    }
}
