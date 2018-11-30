<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = [
    	'directorates_id','group_name'
    ];

    public function ticket_erf_details()
    {
        return $this->hasMany('App\Models\Ticket_erf');
    }
}
