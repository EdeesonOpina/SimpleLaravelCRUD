<?php

Route::get('/', 'GuestController@showHome');

Route::post('login', 'GuestController@doLogin')->name('login');
Route::get('logout', 'GuestController@doLogout');

Route::get('register', 'GuestController@showRegister');
Route::post('register', 'GuestController@doRegister');

// users
Route::get('users', 'UserController@showUsers');
Route::post('user/add', 'UserController@doAddUser');
Route::post('user/edit', 'UserController@doEditUser');
Route::get('user/activate/{user_id}', 'UserController@doActivateUser');
Route::get('user/deactivate/{user_id}', 'UserController@doDeactivateUser');
