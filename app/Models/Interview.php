<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
	protected $table = 'interview';

    protected $fillable = [
		'cv_id',
		'interview_finish',
		'interview_title',
		'interview_user',
		'interview_date',
		'time_start',
		'time_end',
		'location'
    ];

    public function CV()
    {
    	return $this->belongsTo('App\Models\CV','cv_id');
    }
}
