<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //Role relationship
    public function role(){
	    return $this->belongsTo('App\Role');
    }
    
   public function hasRole($Role){
	   return null !== $this->role()->where('name',$Role)->first();
    }
    
    public function jobs(){
	    return $this->hasMany('App\Job', 'user_id');
     }
    
   public function Favourites(){
	  return $this->hasMany('App\Favourite');
 }
    
    public function Threads(){
	   return $this->belongsToMany('App\Thread');
   }
    
   public function Messages(){
	  return $this->hasMany('App\Message', 'user_id');
   }
}