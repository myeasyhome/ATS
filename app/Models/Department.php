<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
    	'divisions_id','department_name'
    ];

    public function tickets()
    {
    	return $this->belongsTo('App\Models\Ticket','id');
    }
}
