<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket_erf extends Model
{
    protected $table = 'ticket_erf_details';

    protected $fillable = [
    	'ticket_id',
    	'directorate',
        'group',
        'division',
        'department',
        'reporting_to',
    	'headcount_type',
    	'employee_status',
    	'contract_from',
    	'contract_to',
    	'type_hiring',
    	'advertisement',
    	'bussiness_impact',
    	'request_background'
    ];

    public function tickets()
    {
    	return $this->belongsTo('App\Models\Ticket','ticket_id');
    }

    public function ticket_erf_details()
    {
        return $this->hasOne('App\Models\Division','id');
    }

    // public function divisions()
    // {
    //     return $this->hasOne('App\Models\Division','id');
    // }
}
