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
        'mesa_mesero_id','platillos_mesa','total'
    ];

    public function mesaMeser(){
        return $this->hasOne('App\Mesa_Meseros', 'id');
    }
}
