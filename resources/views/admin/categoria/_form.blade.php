

<div class="container-fluid col-sm-12">
	<div class="panel panel-default">
		<div class="panel panel-heading">Formulário de Categorias</div>
		<div class="panel panel-body">

			<div class="form-group col-sm-6 {{ $errors->has('categoria_nome') ? 'has-error' : '' }}">
				
				<label>Categoria</label><span class="asterisco"> *</span>
				<input type="text" name="categoria" class="form-control" value="{{ isset($registro->categoria_nome) ? $registro->categoria_nome : ''}}" required>

			</div>

			<div class="form-group col-sm-6">
				<label for="categoria">Categoria pai</label>
				<select class="form-control" name="categoria_pai">

					<option selected value="0">Selecione</option>
					@foreach($categorias as $categoria)

						<option value="{{$categoria->id}}" {{ isset($registro->categoria_nome) && ( $registro->id_pai_categoria == $categoria->id) ? 'selected' : ''}}> {{$categoria->categoria_nome}}</option>

					@endforeach
				</select>

			</div>				

		</div>
	</div>
</div>
