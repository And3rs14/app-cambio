<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = ['month'];

    //Relacion muchos a muchos
    public function info_values()
    {
        return $this->belongsToMany(Info_value::class);
    }
}
