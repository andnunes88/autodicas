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
				<li class="active"><a data-toggle="tab" href="#home">Area Pessoal</a></li>
				<li><a href="{{route('admin.anuncios')}}">Meus Anúncios</a></li>
				<li><a href="{{route('admin.estatistica')}}">Estatistica</a></li>
				<li><a href="{{route('admin.perfil')}}">Editar Perfil</a></li>
			</ul>

			<div class="tab-content">

				<div id="home" class="tab-pane fade in active">

					
					<h3 id="txt-boas-vidas">Olá {{Auth::user()->name}} Bem-vindo à sua área pessoal.</h3>

					<div class="row">
						<div class="col-md-4">

							<h2>{{isset($totalVisualizacao) ? $totalVisualizacao : '0'}}</h2>
							<p>Visualizações</p>
							

						</div>

						<div class="col-md-4">

							<h2>{{0}}</h2>
							<p>Contatos</p>
							

						</div>
						<div class="col-md-4">

							<h2 class="moedas">{{$total_produtos->count()}}</h2>
							<p>Total de Anúncios</p>
							
						</div>
					</div>

					<div class="row">

						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading">Meus Anúncios</div>
								<div class="panel-body">
									Ativos <strong> 12 </strong> | Pendentes <strong> 3 </strong> | Expirados <strong> 7 </strong>
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