
	<div class="container">
		<div class="row">
			<ul id="categorias" class="list-inline">
				
				@foreach($categorias as $categoria)
				<li><a href="{{route('ads',$categoria->id)}}">{{$categoria->categoria_nome}} </a></li>	
				@endforeach
				
			</ul>
		</div>
	</div>