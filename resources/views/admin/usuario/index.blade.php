@extends('layouts.admin')

@section('content')
<div class="container">		

	<div class="conteudo">

		<ul class="nav nav-tabs">
			<li><a href="{{route('admin.dashboard')}}">Area Pessoal</a></li>
			<li><a href="{{route('admin.anuncios')}}">Meus Anúncios</a></li>
			<li class="active"><a data-toggle="tab" href="#perfil">Editar Perfil</a></li>
		</ul>

		<div class="tab-content">

			<div id="perfil" class="tab-pane fade in active">

				@include('admin.usuario.adicionar')

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

@push('js')
    
    <!-- ranking JS -->      
    <script src="{{ asset('js/admin/perfil.js') }}"></script>    

@endpush	
