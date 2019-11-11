<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mesas extends Model
{
    use SoftDeletes;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "mesas";
    
    protected $fillable = [
        'status', 'number'
    ];

    public function platillos(){
        return $this->hasMany('App\Platillo_Mesa','mesa_id', 'id');
    }
}
