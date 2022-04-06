<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Values extends Model
{
    use HasFactory;

    protected $fillable =['sell_moneda','buy_moneda','date','category_id'];

    //Relación de 1 a muchos 
    public function historials(){
        return $this->hasMany(historial::class,'value_id','id');
    }

    //Relacion 1 a muchos inversa

    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    
}
