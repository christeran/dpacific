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
	return View::make('hello');
});


//Route::pattern('name','[0-9]+[a-z]+');

Route::group(array('prefix' => 'christian', 'before' => 'auth.basic'), function()
{
   Route::get('cinemas', 'CinemaController@all');
	
	Route::get('cinemas/location/{gps?}', 'CinemaController@location');	

	Route::get('cinemas/{name?}', 'CinemaController@name');	

	Route::get('cinemas/{name?}/{date}', 'CinemaController@name_date');		

	Route::get('movies/{name?}', 'MoviesController@name');	
    
    Route::get('signout', 'HomeController@signout');	
});


//DiscussionCategory::where('slug', $slug)->with('discussions.author')->paginate(25)
