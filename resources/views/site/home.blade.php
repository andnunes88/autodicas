@extends('layouts.app')

@section('content')
	
	@include('layouts._site._busca_home')

	<style type="text/css">
		li>a{
			color: #666;
		}
	</style>

	<div class="container">
		<div class="row">
			<ul id="categorias" class="list-inline">
				
				@foreach($categorias as $categoria)
				<li><a href="{{route('ads',$categoria->id)}}">{{$categoria->categoria_nome}} </a></li>	
				@endforeach
				
			</ul>
		</div>
	</div>
	

	@include('layouts._site._galeria_anuncios')

	@include('layouts._site._mensagem')

	{{-- @include('layouts._site._newsletter') --}}
	

@endsection