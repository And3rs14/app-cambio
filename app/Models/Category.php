<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //Habilitar asignacion masiva
    protected $fillable =['name'];
    //protected $fillable =['name', 'slug'];


    //Relación de 1 a muchos 
    public function info_values(){
        return $this->hasMany(info_values::class,'category_id','id');
    }
}
