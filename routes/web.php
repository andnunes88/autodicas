<?php


Route::get('/', function () {
    return view('site.home');
});

Auth::routes();

#Site
Route::get('/ads', 'Site\AnuncioController@index')->name('ads');
Route::get('/detalhe', 'Site\AnuncioController@detalhe')->name('detalhe');

#Admin
Route::get('/dashboard', 'Admin\UsuarioController@index')->name('dashboard');