@extends('layouts.admin')

@section('content')
<div class="container">		

	<div class="conteudo">

		<ul class="nav nav-tabs">
			<li><a href="{{route('admin.dashboard')}}">Area Pessoal</a></li>
			<li><a href="{{route('admin.anuncios')}}">Meus Anúncios</a></li>
			<li><a href="{{route('admin.planos')}}">Planos</a></li>
			<li class="active"><a data-toggle="tab" href="#perfil">Adicionar Perfil</a></li>
		</ul>

		<div class="tab-content">

			<div id="perfil" class="tab-pane fade in active">

				<h2>Cadastrar Perfil</h2>
				<form class="form-horizontal" action="{{ route('admin.perfil.salvar') }}" method="post">

					{{ csrf_field() }}
					
					@include('admin.usuario._form')

					<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Salvar</button>
						</div>
					</div>
				</form>
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

	
