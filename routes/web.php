<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
//Route::get('/adminhome', 'HomeController@admin')->name('adminhome');

Route::group(['middelware' =>['web','auth']],function()  {
	
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function()
	{
		if (Auth::user()->isadmin == 0) {

			return view('home');
		}
		else{
      $tasks= \DB::table('tasks')->get();
      $jobs= \DB::table('jobs')->get();
   	  $jobs = count($jobs);
      
   	//dd($task);
    //return $task;
    			return view('adminhome',compact('tasks','jobs'));
		}
	})->name('adminhome');


});
Route::get('/about',function()
{
	$bitfumes = ['hi','hello','namaste'];
	return view('about',compact('bitfumes'));
});
Route::post('/create','TaskController@create');

Route::post('/jobcreate','TaskController@jobcreate');

Route::get('/show','TaskController@show')->name('taskform');

Route::get('/job','TaskController@showjob')->name('jobform');

Route::get('/jobshow','TaskController@displayjob')->name('jobdashboard');

Route::get('/loginview','TaskController@loginview')->name('loginview');

Route::post('/logintask','TaskController@logintask');
