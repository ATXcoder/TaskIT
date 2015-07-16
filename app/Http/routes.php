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
    //return view('auth/register');
    return "Currently not accepting new users";
});

Route::get('dashboard', ['as'=>'dashboard','uses'=>'DashboardController@dashboard']);

/*
 * Task
 */
Route::get('task', 'TaskController@index');
Route::get('task/add','TaskController@create');
Route::post('task/add','TaskController@store');
Route::get('task/filter/{filter}','TaskController@filter');
Route::get('task/overdue',['as' => 'overdueTasks', 'uses' => 'TaskController@overdueTasks']);
Route::get('task/edit/{id}','TaskController@editTask');
Route::post('task/update/{id}','TaskController@updateTask');
Route::post('task/complete/{id}','TaskController@completeTask');
Route::post('task/delete/{id}','TaskController@deleteTask');
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
Route::get('project/add','ProjectController@add');
Route::get('project/{project}', 'ProjectController@show');


/*
 * API v1
 */
Route::group(['prefix' => 'api/v1', 'middleware'=>'apiauth'], function()
{
    Route::get('/task', function(){
        return ("Works");
    });

    Route::post('/test/message/{msg}', 'ApiTaskController@postTest');

    // Register new Android Device for GCM
    Route::post('/device/add/{id}', 'DeviceController@create');
});



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
