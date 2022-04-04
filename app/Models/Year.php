<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $fillable = ['year'];

    //Relacion muchos a muchos
    public function info_values()
    {
        return $this->belongsToMany(Info_value::class);
    }
}
