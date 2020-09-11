<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function getUserMenu(){
	    
	    $Menu = array();
	    
	    $User = Auth::user();
	    
	    if(!is_null($User)){
		   // $Menu['/home'] = 'Dashboard';
		    
		    if($User->hasRole('Client')){
			    $Menu['/jobs'] = 'My Jobs';
                $Menu['/jobs/create'] = 'Post a New Job';
                $Menu['/jobs/edit'] = 'Edit Job';
		    }
		    
		    if($User->hasRole('Freelancer')){
			    $Menu['/jobsearch'] = 'Find a Job';
		    }
		    
	    }
	    
	    return $Menu;
	    
	    
    }
}