@extends('layouts.admin')

@section('content')


<div class="container">
	<h2 class="center">Categorias</h2>

	<div class="row">
	    <ol class="breadcrumb">
	       	<li><a href="{{route('admin.dashboard')}}">Home</a></li>
	       	<li class="active">Categorias</li>
	    </ol> 
  	</div>

	<div class="container">

		<div class="row">
			
			<a href="{{route('admin.categoria.cadastrar')}}">  
				<button id="button" class="btn btn-lg btn-success"> Novo </button>
			</a>
			
		</div>
		
	  	<div class="row">
			<table class="table">
				<thead>
					<tr>
						
						<th>id</th>						
						<th>Nome da Categoria</th>
						<th>Categoria Pai</th>
						<th>Ação</th>

					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
						
						<td>{{ $registro->id }}</td>
						<td>{{ $registro->categoria_nome }}</td>
						<td>{{ $registro->id_pai_categoria }}</td>
						
						<td>
							<a class="btn btn-primary" href="{{ route('admin.categoria.editar',$registro->id) }}">
							<span class="glyphicon glyphicon-pencil"></span>		
							</a>
							
							<a class="btn btn-danger 
								{{ !isset($registro->id) ? $registro->id : 'disabled'}}

							" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.loja.deletar',$registro->id) }}' }">
							<span class="glyphicon glyphicon-trash"></span>	
							</a>

						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			
		</div>
	
	</div>	
</div>


@endsection