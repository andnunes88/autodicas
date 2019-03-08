<!-- script para mascara dos campos input -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('js/jquery.maskMoney.js')}}"></script>
<script>
	jQuery(function($){
 		$("#preco").maskMoney();
	});
</script>
<div class="col-sm-12 col-xs-12 ajuda">
	<div class="panel panel-default">
		<div class="panel panel-heading">Informações do Anúncio</div>
		<div class="panel panel-body">

			<div class="form-group col-sm-4">
				<label for="categoria">Escolha a Categoria</label>
				<select class="form-control" name="categoria">

					<option selected disabled required>Selecione</option>
					@foreach($categorias as $categoria)

						<option value="{{$categoria->id}}" {{ isset($registro->categoria_id) && ( $registro->categoria_id == $categoria->id) ? 'selected' : ''}}> {{$categoria->categoria_nome}}</option>

					@endforeach
				</select>

			</div>

			<div class="form-group col-sm-8 {{ $errors->has('titulo') ? 'has-error' : '' }}">
				<label>Título do Anúncio</label>
				<input type="text" name="titulo" class="form-control" value="{{ isset($registro->titulo) ? $registro->titulo : '' }}" placeholder="Título" required>

				@if($errors->has('titulo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('titulo') }}</strong>
                    </span>
                @endif

			</div>

			<div class="form-group col-sm-8 {{ $errors->has('descricao') ? 'has-error' : '' }}">
				<label>Descrição do Anúncio</label>
				<textarea type="text" name="descricao" class="form-control"  placeholder="Descrição" rows="6" cols="50">{{ isset($registro->descricao) ? $registro->descricao : '' }}</textarea>

				@if($errors->has('descricao'))
                    <span class="help-block">
                        <strong>{{ $errors->first('descricao') }}</strong>
                    </span>
                @endif

			</div>
			
			<div class="form-group col-sm-4 {{ $errors->has('imagem') ? 'has-error' : '' }}">

				<label class="btn btn-default btn-file">
					<span class="glyphicon glyphicon-camera"></span>
					inserir
					<input type="file" name="imagem" accept="image/*" onchange='openFile(event)' style="display: none;">
				</label>

				
				@if($errors->has('valor'))
                    <span class="help-block">
                        <strong>{{ $errors->first('imagem') }}</strong>
                    </span>
                @endif

			</div>

			<img id="output" width="100px" height="100px"></img>

			<div class="form-group col-sm-4 {{ $errors->has('valor') ? 'has-error' : '' }}">
				<label>Valor do produto</label>
				<input id="preco" type="text" name="valor" class="form-control" value="{{ isset($registro->valor) ? $registro->valor : ''}}" placeholder="Ex: 288.80">

				@if($errors->has('valor'))
                    <span class="help-block">
                        <strong>{{ $errors->first('valor') }}</strong>
                    </span>
                @endif

			</div>

		</div>
	</div>
</div>
<style>
	
	.ajuda{
		padding: 0;
		margin: 0;
	}
	
	 .btn-file{
	 	position: relative;
    	overflow: hidden;
    	top: 0;
    	right: auto;
    	min-width: 100%;
    	font-size: 32px;
    	outline: none;
    	cursor: inherit;

	 }

	 #output{
	 	
    	display: block;
	    margin-left: auto;
	    margin-right: auto;
    	   	 	
    	
	 }

	 
</style>

<script >
	var openFile = function(event) {
    	
    	var input = event.target;
	    var reader = new FileReader();
	    
	    reader.onload = function(){
	    	var dataURL = reader.result;
	    	var output = document.getElementById('output');
	    	output.src = dataURL;
    };

    reader.readAsDataURL(input.files[0]);
  };

</script>