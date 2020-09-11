<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobSearchController extends Controller
{
    public function index(){
	    
	    $Jobs = Job::all();
	    
	    return view('jobsearch.index')->with('Jobs',$Jobs);
	    
    }
}