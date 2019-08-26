@extends('layouts.admin')

@section('content')

<style >
	
	.btn-anuncio{
		margin-bottom: 10px;
	}
</style>
<div class="container">

	<div class="conteudo">

		<ul class="nav nav-tabs">
			<li><a href="{{route('admin.dashboard')}}">Area Pessoal</a></li>
			<li><a href="{{route('admin.anuncios')}}">Meus Anúncios</a></li>
			<li class="active"><a data-toggle="tab" href="#">Estatistica</a></li>
			<li><a href="{{route('admin.perfil')}}">Editar Perfil</a></li>
		</ul>

		<div class="tab-content">

			<div id="produtos" class="tab-pane fade in active">
				<h3>Estatistica dos Anúncios</h3>
				
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Anúncio</th>
							<th>Visualização</th>
							<th>Contato</th>						
						</tr>
					</thead>
					<tbody>	

						@foreach($estatisticas as $estatistica)
						<tr>
							<td>{{$estatistica->anuncio->titulo}}</td>
							<td>{{$estatistica->visualizacao}}</td>
							<td>3</td>						
						</tr>
						@endforeach									
						
					</tbody>
				</table>
			</div>

		</div>

		@endsection

		<style >

		#conteudo-titulo{
			margin-bottom: 5px;

		}

		#titulo-produto{
			display: inline;

		}

		@media only screen and (max-width: 600px) {

			#conteudo-titulo{
				padding: 4px;
				text-align: center;
			}

			#td-acao{
				padding: 0;
				margin: 0;
			}
		}

	</style>
