<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

     //relacion de 1 a muchos inversa 
     public function user()
     {
         return $this->belongsTo(User::class);
     }
     
     public function category()
     {
         return $this->belongsTo(Category::class);
     }
     public function date()
     {
         return $this->belongsTo(Date::class);
     }
}
