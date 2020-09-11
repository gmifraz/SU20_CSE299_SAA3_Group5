<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use \Auth;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $User = Auth::user();
	    $Jobs = $User->jobs->all();
	    	    
        return view('jobs.index')->with('Jobs',$Jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required|string',
           'category' => 'required|string',
	       'description' => 'required|string',
	       'budget' => 'required|numeric', 
        ]);
        
        $Job = new Job;
        
        $Job->title = $request->input('title');
        $Job->category = $request->input('category');
        $Job->description = $request->input('description');
        $Job->budget = $request->input('budget');
        
        $User = Auth::user();
        
        $User->jobs()->save($Job);
        
        return redirect('/jobs')->with('success', 'The job was created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Job = Job::find($id);
        
        $User = Auth::user();
        
        switch($User->role->name){
	        case 'Freelancer':
	        	$Threads = array();
	        	$Threads = $User->Threads()->where('job_id', $Job->id)->first();
	        	if(is_null($Threads)){
		        	$Threads = false;
	        	} else{
		        	$Threads[] = $Thread;
	        	}
	        	$UserType = 'Freelancer';
	        	
	        	
	        	break;
	        case 'Client':
	        	
	        	$UserType = 'Client';
	        	$Threads = array();
	        	$Threads = $Job->Threads;
	        
	        	break;
	        default:
	        	
	        	$UserType = false;
	        	$Threads = array();
	        	
	        	break;
        }
        
        $Data = [
	        'Job' => $Job,
	        'UserType' => $UserType,
	        'Threads' => $Threads,
        ];
        
        return view('jobs.show')->with($Data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $Job = Job::find($id);
       
       return view('jobs.edit')->with('Job', $Job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$this->validate($request, [
           'title' => 'required|string',
           'category' => 'required|string',
	       'description' => 'required|string',
	       'budget' => 'required|numeric', 
        ]);
        
        $Job = Job::find($id);
        
        $Job->title = $request->input('title');
        $Job->category = $request->input('category');
        $Job->description = $request->input('description');
        $Job->budget = $request->input('budget');
        
        $User = Auth::user();
        
        $User->jobs()->save($Job);
        
        return redirect('/jobs')->with('success', 'The job was updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Job = Job::find($id);
        
        $Job->delete();
        
        return redirect('/jobs')->with('success', 'The job has been removed');
    }
}


