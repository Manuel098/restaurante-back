<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Platillo_Mesa extends Model
{
    use SoftDeletes;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "platillos_mesa";
    
    protected $fillable = [
        'platillo_id','mesa_id'
    ];

    public function infoPlatillo(){
        return $this->hasOne('App\Platillos', 'id', 'platillo_id');
    }
}
