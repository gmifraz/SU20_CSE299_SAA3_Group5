<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //User Relationship
    public function users(){
	    return $this->hasMany('App\User', 'role_id');
    }
}