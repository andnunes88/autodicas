@extends('layouts.admin')

@section('content')


<div class="container">
  	<div class="row">
	  	<ol class="breadcrumb">
		  <li><a href="{{route('admin.dashboard')}}">Home</a></li>
		  <li class="active">Editar Categoria</li>
		</ol>
	</div>

	<div class="container-fluid">
      	<div class="page-header">
      		<h3>Editar Categoria </h3>
      	</div>

		<div class="row">
			<div class="col-md-12">
				<form action="{{ route('admin.categoria.atualizar', $registro->id) }}" method="post">

					{{ csrf_field() }}
					<input type="hidden" name="_method" value="put">
					@include('admin.categoria._form')

					<button id="button" type="submit" class="btn btn-lg btn-success">Atualizar</button>

				</form>

			</div>
		</div><!--//row-->

	</div>
</div>


@endsection
