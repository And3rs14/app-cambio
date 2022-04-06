<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_value extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable =['sell_moneda','buy_moneda','category_id','date_id'];
    //,'year_id','month_id','day_id'

    //Relación de 1 a muchos    
    public function historicals(){
        return $this->hasMany(Historical::class);
    }

     //Relacion 1 a muchos inversa
     public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
     //Relacion 1 a muchos inversa
     public function dates(){
        return $this->belongsTo(Date::class,'date_id','id');
    }
     
}
