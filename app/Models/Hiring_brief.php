<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hiring_brief extends Model
{
    protected $table = 'hiring_briefs';

    protected $fillable = [
    	'ticket_id',
    	'approval_hiring_by_hrbp',
    	'reason_reject',
        'approval_date_hrbp',
    	'date_schedule',
    	'time_schedule',
    	'place_schedule',
    	'interviewer_user',
    	'interviewer_hrbp',
    	'job_function',
    	'general_information',
    	'characteristic',
    	'date_result_hiring'
    ];

    public function tickets()
    {
    	return $this->belongsTo('App\Models\Ticket','ticket_id');
    }

    public function CV()
    {
        return $this->hasOne('App\Models\CV','hiring_brief_id');
    }
}
