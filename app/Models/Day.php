<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = ['day'];

    //Relacion muchos a muchos
    public function info_values()
    {
        return $this->belongsToMany(Info_value::class);
    }
}
