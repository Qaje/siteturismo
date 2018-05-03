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
    return view('main');
	});
Route::get('/welcome', function () {
    return view('pages.welcome');
	});
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'web'],function(){
	
	Route::get('admin', function () {
	    return view('auth.master');
	});
	Route::get('admin/register',function(){
		return view('auth.register');
	});

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
