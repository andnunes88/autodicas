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
							<input type="text" class="form-control" id="nome" placeholder="Digite seu Nome" name="nome" value="{{ isset($registro->nome) ? $registro->nome : ''}}" required>
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

							<input type="text" class="form-control" id="cpf-cnpj" placeholder="Digite seu CNPJ ou CPF" name="cpf"
								@if( isset($registro->cpf) )
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
							<input type="text" class="form-control" id="cep" placeholder="Digie seu CEP" name="cep" value="{{ isset($registro->cep) ? $registro->cep : ''}}" required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="endereco">Estado:</label>
						<div class="col-sm-10">          
							<input type="text" class="form-control" id="estado" placeholder="Digite seu endereço" name="estado" value="{{ isset($registro->estado) ? $registro->estado : ''}}" required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="cidade">Cidade:</label>
						<div class="col-sm-10">          
							<input type="text" class="form-control" id="cidade" placeholder="Digite sua cidade" name="cidade" value="{{ isset($registro->cidade) ? $registro->cidade : ''}}" required>
						</div>
					</div> 

					<div class="form-group">
						<label class="control-label col-sm-2" for="cidade">Endereço:</label>
						<div class="col-sm-10">          
							<input type="text" class="form-control" id="endereco" placeholder="Digite seu endereço" name="endereco" value="{{ isset($registro->endereco) ? $registro->endereco : ''}}" required>
						</div>
					</div> 