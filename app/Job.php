<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
	use SoftDeletes;
	
    public function user(){
	    return $this->belongsTo('App\User');
    }
    
    public function Favourites(){
   return $this->hasMany('App\Favourite', 'job_id');
    }
    
        public function Threads(){
	     return $this->hasMany('App\Thread', 'job_id');
    }
}
