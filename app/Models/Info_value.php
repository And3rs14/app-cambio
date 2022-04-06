<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_value extends Model
{
    use HasFactory;

    protected $fillable =['category_id','value_id'];
    //,'year_id','month_id','day_id'

    //Relación de 1 a muchos    
    public function historials(){
        return $this->hasMany(Historical::class);
    }

     //Relacion 1 a muchos inversa
     public function categories(){
        return $this->belongsTo(Category::class);
    }
    public function values(){
        return $this->belongsTo(Value::class);
    }

    //Muchos a muchos
    public function years()
    {
        return $this->belongsToMany(Year::class);
    }
    
    public function months()
    {
        return $this->belongsToMany(Month::class);
    }

    public function days()
    {
        return $this->belongsToMany(Day::class);
    }
    
}
