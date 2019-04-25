					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Email:</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" placeholder="Digite seu Email" name="email" value="{{Auth::user()->email}}" disabled>

							<div class="radio">
						  		<label><input type="radio" name="tipo" value="particular" {{ isset($registro->tipo) && $registro->tipo == 'particular' ? 'checked' : '' }} > Particular</label>
						  		<label><input type="radio" name="tipo" value="profissional" {{ isset($registro->tipo) && $registro->tipo == 'profissional' ? 'checked' : '' }} > Profissional</label>					  		

							</div>

						</div>					

					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" id="label-nome" for="nome">Nome:</label>
						<div class="col-sm-10">          
							<input type="text" class="form-control" id="nome" placeholder="Digite seu Nome" name="nome" value="{{ isset($registro->name) ? $registro->name : ''}}" required>
						</div>
					</div>        

					<div class="form-group">
						<label class="control-label col-sm-2" for="telefone">Telefone:</label>
						<div class="col-sm-10">          
							<input type="text" class="form-control" id="telefone" placeholder="Digite seu Telefone" name="telefone" value="{{ isset($registro->telefone) ? $registro->telefone : ''}}">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" id="titulo-cpf-cnpj" for="cpf-cpnj">CPF/CNPJ</label>
						<div class="col-sm-10">  
							<input type="text" class="form-control" id="cpfcnpj" name="cpf-cnpj" placeholder="Digite seu CNPJ ou CPF" disabled
							@if(isset($registro->cpf))
								    value="{{$registro->cpf}}";
								@elseif (isset($registro->cnpj))
								    value="{{$registro->cnpj}}";
								@else
								    value="";
								@endif
							>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-2" for="cep">CEP:</label>
						<div class="col-sm-10">          
							<input type="text" class="form-control" id="cep" placeholder="Digite seu CEP" name="cep" value="{{ isset($registro->cep) ? $registro->cep : ''}}" required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="endereco">Estado:</label>
						<div class="col-sm-4">
							<select class="form-control" name="estado_id" id="estado_id">
								
								@foreach ($estados as $estado)
									<option value="{{$estado->id}}"> {{$estado->estado_nome}}</option>									
								@endforeach								
							</select>
						</div>

						<label class="control-label col-sm-2" for="cidade">Cidade:</label>
						<div class="col-sm-4">
							<select class="form-control" name="cidade_id" id="cidades_id" disabled>
															
							</select>
						</div>
						
					</div>
			

					<div class="form-group">
						<label class="control-label col-sm-2" for="cidade">Endereço:</label>
						<div class="col-sm-6">          
							<input type="text" class="form-control" id="endereco" placeholder="Digite seu endereço" name="endereco" value="{{ isset($registro->endereco) ? $registro->endereco : ''}}" required>			
						</div>	

						<label class="control-label col-sm-2" for="numero">Número:</label>
						<div class="col-sm-2">          
							<input type="text" class="form-control" id="numero" placeholder="Digite seu Número" name="numero" value="{{ isset($registro->numero) ? $registro->numero : ''}}" required>			
						</div>
					</div> 

					<div class="form-group">
						<label class="control-label col-sm-2" for="complemento">Complemento:</label>
						<div class="col-sm-6">          
							<input type="text" class="form-control" id="complemento" placeholder="Digite seu complemento" name="complemento" value="{{ isset($registro->complemento) ? $registro->complemento : ''}}" >			
						</div>

					</div> 


@push('js')
    
    <!-- perfil JS -->      
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>   
	<script src="{{ asset('js/admin/perfil.js') }}"></script>

@endpush