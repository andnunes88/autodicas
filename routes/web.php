<?php
Use App\Anuncio;
Use App\EstatisticaAnuncio;
use Illuminate\Support\Facades\DB;

Route::get('/teste', function(){	

	/* Query relatório Semanal para enviar para os clientes */
	$estatisticas = DB::table('anuncios')
            ->select('titulo','visualizacao','contato')            
            ->join('estatistica_anuncios', 'estatistica_anuncios.anuncio_id', '=', 'anuncios.id')
            ->where('usuario_id', 3)
            ->orderBy('visualizacao','DESC')
            ->get();	
	
	//return view('admin.email.estatisticaAnuncio', compact("estatisticas"));
	
	Mail::send('admin.email.estatisticaAnuncio', compact('estatisticas'), function($m){
		$m->from('andnunes88@gmail.com','Anderson');
		$m->to('shaynasilvares2@hotmail.com','shay');
		$m->subject('Resumo Semanal: autodicas.com');
	});
	
	
});

Route::get('/', 'Site\AnuncioController@index')->name('site.home');

#Site
Route::get('/ads/{id_categoria?}', 'Site\AnuncioController@ads')->name('ads');
//Route::get('/ads/{categoria?}', 'Site\AnuncioController@ads')->name('ads.categoria');
Route::get('/busca', 'Site\AnuncioController@busca')->name('busca');

#Anuncio com Slug
Route::get('anuncio/{slug}/{id?}', 'Site\AnuncioController@detalhe')->name('site.anuncio.detalhe');

Route::post('conta-visualizacao/{id_anuncio}', 'Site\AnuncioController@contaVisualizacao')->name('contaVisualizacao');
Route::get('conta-contato/{id_anuncio}', 'Site\AnuncioController@contaContato')->name('contaContato');

Auth::routes();

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

	/*Perfil do Usuário*/
	Route::get('/usuario/perfil', 'Admin\UsuarioController@ExibirFormPerfil')->name('admin.perfil');
	Route::get('/usuario/perfil/adicionar/', 'Admin\UsuarioController@adicionar')->name('admin.perfil.adicionar');
	Route::post('/usuario/perfil/salvar/', 'Admin\UsuarioController@completarPerfil')->name('admin.perfil.salvar');
	Route::get('/usuario/perfil/editar/{id_usuario}', 'Admin\UsuarioController@editarPerfil')->name('admin.perfil.editar');
	Route::put('/usuario/perfil/atualizar/{id_perfil}', 'Admin\UsuarioController@atualizar')->name('admin.perfil.atualizar');
	Route::get('/usuario/perfil/detetar/{id_usuario}', 'Admin\UsuarioController@deletar')->name('admin.perfil.deletar');
	Route::get('/cidades/{id_estado?}', 'Admin\UsuarioController@pegarCidadesDoEstado')->name('admin.cidades');

	/* Estatistica */
	Route::get('/estatistica', 'Admin\UsuarioController@estatistica')->name('admin.estatistica');

	/* Carrinho */
	Route::get('/cart', 'Admin\CartController@index')->name('admin.cart');
	Route::get('/cart/checkout/{id_produto}', 'Admin\CartController@checkout')->name('admin.cart.checkout');
		
	/* teste pagseguro */
	Route::post('/pagseguro-billet', 'Admin\PagSeguroController@billet')->name('pagseguro.billet');
	Route::post('pagseguro-transparente', 'Admin\PagSeguroController@getCode')->name('pagseguro.code.transparente');
	Route::get('pagseguro-transparente', 'Admin\PagSeguroController@transparente')->name('pagseguro.transparente');

	Route::get('/historico-compra', 'Admin\CartController@historico')->name('admin.historico');

	
});