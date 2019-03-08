@extends('layouts.admin')

@section('content')

<div class="container">
  	
	<div class="container-fluid">
      	<div class="page-header">
      		<h3>Editar produto </h3>
      	</div>

		<div class="row">
			<div class="col-md-12">
				<form action="{{ route('admin.anuncios.atualizar', $registro->id) }}" method="post" enctype="multipart/form-data">
					
					{{ csrf_field() }}
					
					<input type="hidden" name="_method" value="put">
					@include('admin.anuncio._form')

					<button type="submit" class="btn btn-lg btn-success">Atualizar</button>
			
				</form>	
				
			</div>				
		</div><!--//row-->
		
	</div>
</div>


@endsection





