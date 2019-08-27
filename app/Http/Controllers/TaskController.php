<?php

namespace App\Http\Controllers;
//use Validate;
use Illuminate\Http\Request;
use App\Task;
use App\Job;

class TaskController extends Controller
{
public function index()
{
    $task= \DB::table('tasks')->get();
    return $task;
}

public function show()
{

	return view('register');

}
public function showjob()
{
	
    return view('jobcreateform',compact('jobs'));
}
public function loginview()
{
	
	return view ('loginview');
}
public function displayjob()

{
	$jobs = \DB::table('jobs')->get();
    
	return view ('jobdashboard',compact($jobs));
}


public function logintask(Request $request)
{
	$uesr_data = [ 'email' =>$request->get('email'),
				   'password'=>$request->get('password')];

	if(\Auth::attempt($uesr_data))
	{
		return redirect()->route('show');
	}

	else{
		return redirect()->route('loginview')->with('error' ,'something went wrong');
	}
}

// public function create(Request $request)
// {

// 	//dd($request);
// 	// $uesr_data = ['email' =>$request->get('email'),
// 	// 				'password'=>$request->get('password')];

// 	// if(Auth::attempt($uesr_data))
// 	// {

//       $this->validate($request,['title'=>'required',
//      							'description'=>'required',
//      							'user'=>'required']) ;
// try{
//       \App\Task::create($request->all());
      
//       return redirect()->route('show');
// }
// catch(\Exception $e)
// {
// 	return  $e->getMessage();
// 	//return "something went wrong";

// }


public function create(Request $request)
    {
    	// $data = ['title' =>$request->get('title'),
	    //  'description'=>$request->get('description'),
		 //  'user'=>$request->get('user')];
			
		$task = new Task();
 
        $task->title = $request->get('title');
        $task->description = strip_tags($request->get('description'));
 		$task->user=$request->get('user');
        $task->save();
     return redirect()->route('adminhome');    
		//dd($data);
        //return Task::create([$data]);
}

public function jobcreate(Request $request)
    {		
		
		$job = new Job();
        $job->title = $request->get('title');
        $job->desc = strip_tags($request->get('desc'));
 		$job->salary=$request->get('salary');
        $job->location=$request->get('location');
        //$job->category=$request->get('category');
       
        $job->save();

      return redirect()->route('adminhome');    
		
		//dd($data);
        //return Task::create([$data]);

}


}
