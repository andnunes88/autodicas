@extends('layouts.admin')

@section('content')


<div class="container">
	<h2 class="center">Relatório autodicas</h2>

	<ul class="nav nav-tabs">
		<li><a href="{{route('admin.dashboard')}}">Area Pessoal</a></li>
		<li><a href="{{route('admin.anuncios')}}">Meus Anúncios</a></li>
		<li><a href="{{route('admin.estatistica')}}">Estatistica</a></li>
		<li><a href="{{route('admin.perfil')}}">Editar Perfil</a></li>
		<li class="active"><a data-toggle="tab" href="{{route('admin.perfil')}}">Relatórios</a></li>
	</ul>

	<div class="container">		
		
	  	<div class="row">

	  		<ul class="list-group">
			  <li class="list-group-item"><a href="{{route('admin.relatorio.anunciosVisitas')}}">Anuncios com mais visitas</a></li>			  
			</ul>
			
		</div>
	
	</div>	
</div>


@endsection