<?php

Route::get('/', 'Site\AnuncioController@index')->name('site.home');

Auth::routes();

#Site
Route::get('/ads', 'Site\AnuncioController@ads')->name('ads');
Route::get('/detalhe', 'Site\AnuncioController@detalhe')->name('detalhe');

Route::group(['middleware'=>'auth'], function(){

	#Admin
	Route::get('/dashboard', 'Admin\UsuarioController@index')->name('admin.dashboard');
	Route::get('/admin/login/sair',['as'=>'admin.login.sair', 'uses'=>'Admin\UsuarioController@sair']);

	/*Anúncios ADMIN*/
	Route::get('/admin/anuncios/',['as'=>'admin.anuncios', 'uses'=>'Admin\AnuncioController@index']);
	Route::get('/admin/anuncios/cadastrar/',['as'=>'admin.anuncios.cadastrar', 'uses'=>'Admin\AnuncioController@addAnuncio']);
	Route::post('/admin/anuncios/salvar/',['as'=>'admin.anuncios.salvar', 'uses'=>'Admin\AnuncioController@salvar']);
	Route::get('/admin/anuncios/editar/{id}',['as'=>'admin.anuncios.editar', 'uses'=>'Admin\AnuncioController@editar']);
	Route::put('/admin/anuncios/atualizar/{id}',['as'=>'admin.anuncios.atualizar', 'uses'=>'Admin\AnuncioController@atualizar']);
	Route::get('/admin/anuncios/detetar/{id}',['as'=>'admin.anuncios.deletar', 'uses'=>'Admin\AnuncioController@deletar']);	

	Route::get('/usuario/perfil', 'Admin\UsuarioController@ExibirFormPerfil')->name('admin.perfil');
	Route::get('/usuario/perfil/adicionar/', 'Admin\UsuarioController@adicionar')->name('admin.perfil.adicionar');
	Route::post('/usuario/perfil/salvar/', 'Admin\UsuarioController@completarPerfil')->name('admin.perfil.salvar');
	Route::get('/usuario/perfil/editar/{id_usuario}', 'Admin\UsuarioController@editarPerfil')->name('admin.perfil.editar');
	Route::put('/usuario/perfil/atualizar/{id_perfil}', 'Admin\UsuarioController@atualizar')->name('admin.perfil.atualizar');
	Route::get('/usuario/perfil/detetar/{id}', 'Admin\UsuarioController@deletar')->name('admin.perfil.deletar');
	
});