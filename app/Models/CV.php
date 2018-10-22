<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    protected $table = 'CV';

    protected $fillable = [
    	'hiring_brief_id',
    	'name_candidate',
        'approval_candidate',
        'approval_date_candidate',
        'date_nextProcess_hrta',
        'reason_reject',
    	'gender',
    	'place_birth',
    	'date_birth',
    	'education',
    	'CV_candidate'
    ];

    public function hiring_briefs()
    {
        return $this->belongsTo('App\Models\Hiring_brief','hiring_brief_id');
    }
}
