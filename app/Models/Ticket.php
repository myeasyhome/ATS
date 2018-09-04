<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
    	'user_id',
    	'position_name',
        'location',
        'position_grade',
    	'reason',
        'approval_lm2',
        'approval_hrbp',
        'reason_reject_lm2',
        'reason_reject_hrbp'
    ];

    public function user()
    {
    	return $this->hasOne('App\User','user_id');
    }

    public function ticket_jd_details()
    {
    	return $this->hasOne('App\Models\Ticket_jd','ticket_id');
    }

    public function ticket_erf_details()
    {
        return $this->hasOne('App\Models\Ticket_erf','ticket_id');
    }
}
