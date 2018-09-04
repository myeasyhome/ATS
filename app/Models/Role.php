<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
    	'nama_role'
    ];

    public function user() {
    	return $this->hasOne('App\User','role_id');
    }
}
