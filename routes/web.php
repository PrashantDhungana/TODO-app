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

Route::get('/', function () {
	return view('welcome');
});

// Route::get('/{hello}', function ($hello) {
//    echo $hello;
// });





Route::get('all', 'AllController@index');

Route::get('all/students', 'AllController@ShowDetails');
Route::get('add', function(){
	return view('AddStudent');
});
Route::post('addnew', 'AddStudent@index');
Route::post('newdata', 'TodoController@insert');

// Route::post('students{students}', 'AllController@ShowDetails');

Route::get('edit/{id}', 'AddStudent@edit');
Route::put('students/{id}', 'AddStudent@update');
Route::get('delete/{id}', 'AddStudent@delete');
Route::delete('del', 'AddStudent@deletemany');
	//For Todo Application
Route::get('todo', 'TodoController@index')->name('todo.show');
Route::get('todo/del/{id}', 'TodoController@delete');
Route::get('edit', 'TodoController@edit');
Route::get('completed/{id}', 'TodoController@complete');

// Route::get('todo/edit/{id}', 'TodoController@edit');

Route::get('todo/deleteall', 'TodoController@deleteall');
Route::get('todo/incomplete/{id}', 'TodoController@incomplete');

Route::get('getdata', 'TodoController@ajaxData');

// Route::group(['prefix'=>'all'], function () {







// });


//For blog
// Route::








Route::group(['prefix'=>'blog'], function () {
	Route::get('/article',function()
	{
		echo "article";
	});



});

Route::get('show-routes', function () {
	\Artisan::call('route:list');
	return '<pre>'.\Artisan::output(); 
});
//Make a new controller
Route::get('/make/{name}', function ($name) {
	\Artisan::call("make:controller $name");
	return '<pre>'.\Artisan::output();
});

//For to do List
