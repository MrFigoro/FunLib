<?php

Route::get('user', 'Admin\UserController@index')->name('index');
Route::get('user/create', 'Admin\UserController@create')->name('create');
Route::post('user/store', 'Admin\UserController@store')->name('save');
Route::get('user/edit/{id?}', 'Admin\UserController@edit')->name('edit');
Route::get('user/delete/{id}', 'Admin\UserController@destroy')->name('delete');

