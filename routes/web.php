<?php


Route::get('/', function () {
    return view('site.home');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

#Site

#Admin
Route::get('/dashboard', 'Admin\UsuarioController@index')->name('dashboard');