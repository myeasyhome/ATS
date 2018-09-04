<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'divisions';

    protected $fillable = [
    	'groups_id','division_name'
    ];

    public function ticket_erf_details()
    {
        return $this->hasMany('App\Models\Ticket_erf','id');
    }

}
