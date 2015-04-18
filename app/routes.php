<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	
		// Path to the project's root folder    
		// echo asset("assets")."<br>";
		// echo base_path()."<br>";

		// // Path to the 'app' folder    
		// echo app_path()."<br>";        

		// // Path to the 'public' folder    
		// echo public_path()."<br>";

		// //Path to the 'app/storage' folder    
		// echo storage_path()."<br>";
		// echo URL::to('/')."<br>";

		//echo $myDateTime = DateTime::createFromFormat('d/m/Y', '99/99/9900')->format('Y-m-d');
		//echo $newDateString = $myDateTime->format('Y-m-d');

		//exit;
	return Input::get();
	return ["Holla"];
	return View::make('hello');
});

Route::get("/layout",function(){

	//to pass data in layout files
	View::share('title', 'Darshan');
	return Response::view("hello1");
});
Route::get('submit-company','CompaniesController@create');
Route::post('submit-company','CompaniesController@store');
Route::get('submit-requirement','RequirementsController@create');
Route::post('submit-requirement','RequirementsController@store');

Route::resource('companies', 'CompaniesController',array('only'=>array('index','create','store','show','destory')));
Route::resource('requirements', 'RequirementsController',array('only'=>array('index','create','store','show','destory')));

/*Route::get('companies','RequirementsController@store');
Route::get('submit-requirement','RequirementsController@store');*/
