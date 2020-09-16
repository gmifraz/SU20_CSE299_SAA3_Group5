<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
	use SoftDeletes;
	
    public function Thread(){
	    return $this->belongsTo('App\Thread');
    }
    
    public function User(){
	    return $this->belongsTo('App\User');
    }
}