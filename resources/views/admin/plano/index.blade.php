@extends('layouts.admin')

@section('content')

<style>

	#img-perfil{

		width: 128px;
		height: 128px;
		display: inline;
	}
	#txt-boas-vidas{
		display: inline;
	}
	#img-moeda{
		width: 64px;
		height: 64px;

	}
	.moedas{
		display: inline;
	}

</style>

<div class="container">    

	<div class="row">

		<div class="conteudo">

			<ul class="nav nav-tabs">
				<li><a data-toggle="tab" href="#home">Area Pessoal</a></li>
				<li><a href="{{route('admin.anuncios')}}">Meus Anúncios</a></li>
				<li class="active"><a href="{{route('admin.planos')}}">Planos</a></li>
				<li><a href="{{route('admin.perfil')}}">Editar Perfil</a></li>
			</ul>

			<div class="tab-content">

				<div id="home" class="tab-pane fade in active">

					<img id="img-perfil" src="{{asset('img/coin.png')}}" alt="moeda">

					<h3 id="txt-boas-vidas">Planos Autodicas</h3> <small>Venda Mais com mais anúncios</small>

					<div class="row">

						<div id="creditpanel">
							<div class="row">
								<div class="col-md-12 no-padding">
									<div id="panel_packs">

										<div class="pack-box col-md-2 " >
											<h3>Bronze</h3>
											<div class="price-box">
												<span class="big-3">20</span> R$
											</div>
											<div id="discount" class="big-4">&nbsp;</div>
											<div class="big-5">10 Anúncios</div>
											<div class="row">
												<a class="col-md-12 btn btn-primary btn-shadow btn-block">
													<span class="hide-active">Escolher</span>
												</a>
											</div>
										</div>

										<div class="pack-box col-md-2 " >
											<h3>Prata</h3>
											<div class="price-box">
												<span class="big-3">50</span> R$
											</div>
											<div id="discount" class="big-4">+ 8%</div>
											<div class="big-5">27 Anúncios</div>
											<div class="row">
												<a class="col-md-12 btn btn-primary btn-shadow btn-block">
													<span class="hide-active">Escolher</span>
												</a>
											</div>
										</div>


										<div class="pack-box col-md-2 bestpack">
											<h3>Ouro</h3>
											<div class="price-box">
												<span class="big-3">100</span> R$
											</div>
											<div id="discount" class="big-4">+ 20%</div>
											<div class="big-5">60 Anúncios</div>
											<div class="row">
												<a class="col-md-12 btn btn-primary btn-shadow btn-block">
													<span class="hide-active">Escolher</span>
												</a>
											</div>
										</div>

										<div class="pack-box col-md-2 " >
											<h3>Diamante</h3>
											<div class="price-box">
												<span class="big-3">200</span> R$
											</div>
											<div id="discount" class="big-4">+ 30%</div>
											<div class="big-5">130 Anúncios</div>
											<div class="row">
												<a class="col-md-12 btn btn-primary btn-shadow btn-block">
													<span class="hide-active">Escolher</span>
												</a>
											</div>
										</div>


									</div>
								</div>
							</div>
						</div>

						
					</div>					

				</div>

			</div>

		</div>  

	</div>

</div>

</div>


@endsection