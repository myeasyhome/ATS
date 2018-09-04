<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = [
    	'group_name'
    ];

    public function tickets()
    {
    	return $this->belongsTo('App\Models\Ticket','id');
    }
}
