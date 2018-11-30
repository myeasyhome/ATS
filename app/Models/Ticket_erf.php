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
    	'contract_duration',
    	'type_hiring',
    	'confidentiality',
    	'request_background',
        'reason'
    ];

    public function tickets()
    {
    	return $this->belongsTo('App\Models\Ticket','ticket_id');
    }

    public function ticket_erf_details()
    {
        return $this->hasOne('App\Models\Division','id');
    }

    public function directorates()
    {
        return $this->belongsTo('App\Models\Directorate','directorate');
    }

    public function divisions()
    {
        return $this->belongsTo('App\Models\Division','division');
    }

    public function groups()
    {
        return $this->belongsTo('App\Models\Group','group');
    }

    public function departments()
    {
        return $this->belongsTo('App\Models\Department','department');
    }
}
