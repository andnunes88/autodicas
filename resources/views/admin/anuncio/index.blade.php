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
			<li class="active"><a data-toggle="tab" href="#produtos">Meus Anúncios</a></li>
			<li><a href="{{route('admin.perfil')}}">Editar Perfil</a></li>
		</ul>

		<div class="tab-content">

			<div id="produtos" class="tab-pane fade in active">
				<h2>Meus Anúncios</h2>
				<p>Gerencie seus anúncios de forma simples.</p> 
					
				<div class="text-right btn-anuncio">
					<a class="btn btn-success" href="{{ route('admin.anuncios.cadastrar')}}">
					<span class="glyphicon glyphicon-plus"></span> Novo Anuncio</a>
				</div>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Título</th>
							<th>Descrição</th>
							<th>Preço</th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>

						@foreach($registros as $registro)

						<tr>
							<td>{{$registro->titulo}}</td>
							<td>{{$registro->descricao}}</td>
							<td>{{$registro->valor}}</td>
							<td> 
								<a href="{{route('admin.anuncios.editar', $registro->id)}}"> Editar </a> | 
								<a href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.anuncios.deletar', $registro->id) }}' }"> Excluir </a></td>								
							
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
