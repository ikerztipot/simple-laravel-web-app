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

Route::get('/', 'PagesController@home');

Route::get('/contact', 'PagesController@contact');

Route::get('/about', 'PagesController@about');

// Automatic routing version & middleware for restric management os the projects (another way to handle authorization)
// Route::resource('projects', 'ProjectsController')->middleware('can:manage,project')
Route::resource('projects', 'ProjectsController');
;

// Manual routing version
Route::patch('/tasks/{task}', 'ProjectsTasksController@update');
Route::post('/projects/{project}/tasks', 'ProjectsTasksController@create');

// Route::get('/projects', 'ProjectsController@index');

// Route::get('/projects/create', 'ProjectsController@create');

// Route::get('/projects/{project}', 'ProjectsController@show');

// Route::post('/projects', 'ProjectsController@store');

// Route::get('/projects/{project}/edit', 'ProjectsController@edit');

// Route::patch('/project/{project}', 'ProjectsController@update');

// Route::delete('/project/{project}', 'ProjectsController@destroy');

// Routes for Auth funcionality
Auth::routes();

Route::get('/user', 'PagesController@user')->name('user');
