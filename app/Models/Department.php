<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
    	'divisions_id','department_name'
    ];

    public function ticket_erf_details()
    {
        return $this->hasMany('App\Models\Ticket_erf');
    }
}
