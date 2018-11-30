<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview_feedback extends Model
{
    protected $table = 'Interview_feedback';

    protected $fillable = [
    	'interview_id',
		'feedback_by',
		'approve_feedback',
		'comment_feedback',
		'point_feedback',
		'technical_competencies',
		'point_technical',
		'total_point',
		'notes'
    ];

    public function Interview()
    {
    	return $this->belongsTo('App\Models\Interview','interview_id');
    }
}
