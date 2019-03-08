@extends('layouts.admin')

@section('content')


<div class="container">
  	<div class="row">
	  	<ol class="breadcrumb">
		  <li><a href="{{route('admin.dashboard')}}">Home</a></li>
		  <li class="active">Cadastrar Loja</li>
		</ol>
	</div>

	<div class="container-fluid">
      	<div class="page-header">
      		<h3>Cadastrar Loja </h3>
      	</div>

		<div class="row">
			<div class="col-md-12">
				<form action="{{ route('admin.categoria.salvar') }}" method="post" enctype="multipart/form-data">
					
					{{ csrf_field() }}
					
					@include('admin.categoria._form')

					<button id="button" type="submit" class="btn btn-lg btn-success">Cadastrar</button>
			
				</form>	
				
			</div>				
		</div><!--//row-->
		
	</div>
</div>


@endsection





