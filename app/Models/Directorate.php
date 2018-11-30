<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Directorate extends Model
{
    protected $table = 'directorates';

    protected $fillable = [
    	'directorate_name'
    ];

    public function ticket_erf_details()
    {
        return $this->hasMany('App\Models\Ticket_erf');
    }
}
