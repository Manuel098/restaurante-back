<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mesa_Meseros extends Model
{
    use SoftDeletes;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "mesa_mesero";
    
    protected $fillable = [
        'mesero_id', 'mesa_id'
    ];
    public function mesas(){
        return $this->hasOne('App\Mesas','id','mesa_id');
    }

    public function mesero(){
        return $this->hasOne('App\Meseros','id','mesero_id');
    }

    public function Platillos(){
        return $this->hasMany('App\Platillo_Mesa', 'id', 'mesero_id');
    }
}
