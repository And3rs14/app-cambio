<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable =['date'];
    


    //Relación de 1 a muchos 
    public function info_values(){
        return $this->hasMany(info_values::class,'date_id','id');
    }
}
