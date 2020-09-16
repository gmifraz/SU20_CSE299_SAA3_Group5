<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Message;
use \Auth;

class ThreadController extends Controller
{
    public function createThread(Request $request){
	    $this->validate($request, [
		   'job_id' => 'required|integer', 
	    ]);
	    
	    $Thread = new Thread;
	    
	    $Thread->job_id = $request->input('job_id');
	    
	    $Thread->save();
	    
	    $Freelancer = Auth::user();
	    
	    $Client = $Thread->Job->user;
	    
	    $Thread->Users()->save($Freelancer);
	    $Thread->Users()->save($Client);
	    
	    return redirect('/threads/'.$Thread->id);
	    
    }
    
    public function createMessage(Request $request, $id){
	    $this->validate($request, [
		   'message' => 'required|string', 
	    ]);
	    
	    $Message = new Message();
	    $Message->message = $request->input('message');
	    $Message->thread_id = $id;
	    
	    $User = Auth::user();
	    
	    $User->Messages()->save($Message);
	    
	    return redirect('/threads/'.$id)->with('success','Message Saved');
	    
    }
    
    public function showThread($id){
	    $Thread = Thread::find($id);
	    return view('threads.show')->with('Thread',$Thread);
    }
}