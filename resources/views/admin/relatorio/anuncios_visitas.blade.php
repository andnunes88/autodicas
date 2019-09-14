@extends('layouts.admin')

@section('content')


<div class="container">
	<h2 class="center">Anúncios com mais visitas</h2>

	<div class="row">
	    <ol class="breadcrumb">
	       	<li><a href="{{route('admin.dashboard')}}">Home</a></li>
	       	<li class="active"><a href="{{route('admin.relatorio')}}">Relatórios</a></li>
	    </ol> 
  	</div>

	<div class="container">		
		
	  	<div class="row">

	  		<table class="table table-bordered">
				<thead>
					<tr>
						<th>Anúncio</th>
						<th>Visualização</th>
						<th>Contato</th>						
						<th>Anunciante</th>						
					</tr>
				</thead>
				<tbody>	

					@foreach($estatisticas as $estatistica)
					<tr>
						<td>{{$estatistica->titulo}}</td>
						<td>{{$estatistica->visualizacao}}</td>
						<td>{{$estatistica->contato}}</td>						
						<td>{{$estatistica->name}}</td>						
					</tr>
					@endforeach									
					
				</tbody>
			</table>
			
		</div>
	
	</div>	
</div>


@endsection