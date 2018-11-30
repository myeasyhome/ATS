<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
    	'created_by',
    	'position_name',
        'location',
        'position_grade',
        'approval_hrbp',
        'reason_reject_hrbp',
        'user_hrbp',
        'user_GH',
        'approval_GH',
        'reason_reject_GH',
        'user_GH_HR',
        'approval_GH_HR',
        'reason_reject_GH_HR',
        'user_chief',
        'approval_chief',
        'reason_reject_chief',
        'user_chro',
        'approval_chro',
        'reason_reject_chro',
        'freeze',
        'reason_freeze',
        'recruiter',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function ticket_jd_details()
    {
    	return $this->hasOne('App\Models\Ticket_jd','ticket_id');
    }

    public function ticket_erf_details()
    {
        return $this->hasOne('App\Models\Ticket_erf','ticket_id');
    }

    public function hiring_briefs()
    {
        return $this->hasOne('App\Models\Hiring_brief','ticket_id');
    }
}
