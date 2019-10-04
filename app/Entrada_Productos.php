<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entrada_Productos extends Model
{
    use SoftDeletes;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "entrada_producto";
    
    protected $fillable = [
        'producto_id','proveedor_id','cantidad', 'precio'
    ];
}
