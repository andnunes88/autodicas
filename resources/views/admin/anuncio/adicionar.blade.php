@extends('layouts.admin')

@section('content')

<div class="container">
	
      	<h3>O Seu Anúncio </h3>
     
		<div class="row">
			<div class="col-md-12">
				<form action="{{ route('admin.anuncios.salvar')}}"  method="post" enctype="multipart/form-data">
					
					{{ csrf_field() }}
					
					@include('admin.anuncio._form')

					<button id="btn-cadastrar" type="submit" class="btn btn-lg btn-success">Cadastrar</button>
			
				</form>	
				
			</div>				
		</div><!--//row-->	
	
</div>

@endsection




