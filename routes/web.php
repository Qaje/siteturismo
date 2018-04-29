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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//AdminLTE
//Route::get('vendor/add', function(){
    //view
//    return view::make('add');
//});

Route::get('admin', function () {
    return view('auth.master');
});

