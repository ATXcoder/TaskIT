<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('/signin', function()
{
	return view('auth/login');
});

Route::get('/user/new',function(){
    return view('auth/register');
});

Route::get('dashboard', ['as'=>'dashboard','uses'=>'DashboardController@dashboard']);

/*
 * Task
 */
Route::get('task', 'TaskController@index');
Route::get('task/add','TaskController@create');
Route::post('task/add','TaskController@store');
//Route::get('task/today','TaskController@today');
//Route::get('task/tomorrow','TaskController@tomorrow');
Route::get('task/filter/{filter}','TaskController@filter');
Route::get('task/{id}','TaskController@getTask');


/*
 * Context
 */
Route::get('context', ['as'=>'context','uses'=>'ContextController@index']);
Route::get('context/add', 'ContextController@add');
Route::get('context/{filter}','ContextController@filter');
Route::post('context/add', 'ContextController@store');

/*
 * Project
 */
 Route::get('project', 'ProjectController@index');
 Route::get('project/{project}', 'ProjectController@show');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
