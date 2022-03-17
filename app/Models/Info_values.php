<?php

namespace App\Models;

use Dotenv\Parser\Value;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_values extends Model
{
    use HasFactory;


    protected $fillable =['date','category_id','value_id'];
    
    //Relación de 1 a muchos    
    public function historials(){
        return $this->hasMany(historials::class);
    }

    //Relacion 1 a muchos inversa

    public function category(){
        return $this->belongsTo(category::class);
    }
    public function values(){
        return $this->belongsTo(Values::class);
    }
}
