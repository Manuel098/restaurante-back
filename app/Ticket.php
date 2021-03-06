<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "tickets";
    
    protected $fillable = [
        'mesa_mesero_id','total'
    ];

    public function MesaMeser(){
        return $this->hasOne('App\Mesa_Meseros', 'id', 'mesa_mesero_id')->select('id','mesa_id','mesero_id');
    }
}
