<?php

Route::get('/test',function(){
	return view('taknikadmin::test');
});

Route::group(['namespace'=>'Moolchand\Taknikadmin\Http\Controllers','middleware'=>'web'],function(){
	Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('users','UserController');
	Route::resource('roles','RoleController');
});