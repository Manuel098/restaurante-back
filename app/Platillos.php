<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Platillos extends Model
{
    use SoftDeletes;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "platillos";
    
    protected $fillable = [
        'nombre','tipo', 'precio','URL', 'categoria_id'
    ];
}
