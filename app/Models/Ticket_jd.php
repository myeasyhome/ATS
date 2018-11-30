<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket_jd extends Model
{
    protected $table = 'ticket_jd_details';

    protected $fillable = [
    	'ticket_id',
        'supervisor',
        'incumbent_name',
        'supervisor_name',
        'role_purpose',
    	'direct_sub',
    	'indirect_sub',
        'job_level',
        'min_education',
    	'qualification',
    	'responsibility',
    	'soft_competency',
    	'hard_index',
        'hard_value'
    ];

    public function tickets()
    {
    	return $this->belongsTo('App\User\Ticket','ticket_id');
    }
}
