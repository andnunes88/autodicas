@extends('layouts.app')

@section('content')
	
	@include('layouts._site._busca_home')

	<style type="text/css">
		ul#categorias li {
			display: inline;
		}
	</style>

	<div class="container">
		<div class="row">
			<ul id="categorias">
				
				@foreach($categorias as $categoria)
				<li><a href="{{route('ads',$categoria->id)}}">{{$categoria->categoria_nome}} </a></li>	
				@endforeach
				
			</ul>
		</div>
	</div>
	

	@include('layouts._site._galeria_anuncios')

	@include('layouts._site._mensagem')

@endsection