@extends('layouts.app')

@section('content')	

	<style type="text/css">
		li>a{
			color: #666;
		}
	</style>

	
	<div class="container">
	  
	  @include('layouts._site._busca_home')

	  <h4>Categorias</h4>

	  <ul class="list-inline">
	    	@foreach($categorias as $categoria)
				<li><a href="{{route('ads',$categoria->id)}}">{{$categoria->categoria_nome}} </a></li>	
			@endforeach
	  </ul>

	</div>
	

	@include('layouts._site._galeria_anuncios')

	<div class="container">
		@include('layouts._site._mensagem')
	</div>
	
	
	

@endsection