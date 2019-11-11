<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorias extends Model
{
    use SoftDeletes;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "categorias";
    
    protected $fillable = [
        'nombre', 'URL'
    ];

    public function infoPlatillo(){
        return $this->hasMany('App\Platillos', 'categoria_id', 'id');
    }
}
