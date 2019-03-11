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

	
	Route::get('/admin/perfil/',['as'=>'admin.perfil', 'uses'=>'PerfilController@index']);
	Route::get('/admin/perfil/adicionar/',['as'=>'admin.perfil.adicionar', 'uses'=>'PerfilController@adicionar']);
	Route::post('/admin/perfil/salvar/',['as'=>'admin.perfil.salvar', 'uses'=>'PerfilController@salvar']);
	Route::get('/admin/perfil/editar/{id_usuario}',['as'=>'admin.perfil.editar', 'uses'=>'PerfilController@editar']);
	Route::put('/admin/perfil/atualizar/{id_perfil}',['as'=>'admin.perfil.atualizar', 'uses'=>'PerfilController@atualizar']);
	Route::get('/admin/perfil/detetar/{id}',['as'=>'admin.perfil.deletar', 'uses'=>'PerfilController@deletar']);
	
});