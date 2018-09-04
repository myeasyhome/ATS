<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hiring_brief extends Model
{
    protected $table = 'hiring_briefs';

    protected $fillable = [
    	'date_schedule','time_schedule','interviewer_user','interviewer_hrbp','job_function','general_information','characteristic'
    ];
}
