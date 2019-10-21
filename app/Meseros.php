<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\SoftDeletes;
class Meseros extends Model
{
    use SoftDeletes;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "meseros";
    
    protected $fillable = [
        'nombre', 'number'
    ];

    public function pivot(){
        return $this->hasMany('App\Mesa_Meseros', 'mesero_id');
    }
}
