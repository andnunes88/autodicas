@extends('layouts.admin')

@section('content')

<div class="container">    

	<div class="row">

		<div class="conteudo">

			<ul class="nav nav-tabs">
				<li><a data-toggle="tab" href="#home">Area Pessoal</a></li>
				<li><a href="{{route('admin.anuncios')}}">Meus Anúncios</a></li>
				<li class="active"><a href="{{route('admin.cart')}}">Planos</a></li>
				<li><a href="{{route('admin.perfil')}}">Editar Perfil</a></li>
			</ul>

			<div class="tab-content">

				<div id="home" class="tab-pane fade in active">

					<div class="row">

						<div class="col-md-12">
							<h2 class="page-header"><i class="glyphicon glyphicon-th-list"></i> Quantos Anuncios quer divulgar ?</h2>

						</div>
						
						<!--// Form -->
						<form method="POST" action="{{route('admin.cart.checkout')}}">

							{{ csrf_field() }}

							<div class="form-group">
				                  <label for="quantidade_anuncio" class="col-sm-2 control-label">Escolha a quantidade de Anúncios</label>

				                  <div class="col-md-4">
				                    <input type="number" name="quantidade_anuncio" class="form-control" id="quantidade_anuncio" placeholder="Ex: 10" required>
				                  </div>
				            </div>
						
					</div>	

					<div class="row">

						
							<div class="col-md-6">
								<label>Dados do Titular</label>
								<div class="form-group">								
									<input type="text" name="nome" class="form-control" placeholder="Nome*" required>
								</div>	

								<div class="form-group">
									<input type="text" name="sobre_nome" class="form-control" placeholder="Sobre Nome*" required>
								</div>	
								
								<div class="form-group">
									<input type="" name="cpf_cnpj" class="form-control" placeholder="CPF/CNPJ do Titular*" required>	
								</div>

								
								<p>Ao finalizar seu pagamento, você concorda com os <a href="#">Termos de Uso</a> do site e que sua assinatura é renovada automaticamente.</p>							
							</div>

							<div class="col-md-6">
								<p>Resumo do pedido</p>
								<div class="table-responsive">
					            <table class="table">
					              <tbody><tr>
					                <th style="width:50%">Preço individual do anúncio:</th>
					                <td>5,00 R$</td>
					              </tr>
					               <tr>
					                <th>Quantidade de Anuncio:</th>
					                <td id="qdt_anuncio">0</td>
					              </tr>

					              <tr>
					                <th>Valor Total:</th>
					                <td id="total_anuncio">0 R$</td>
					              </tr>
					            </tbody></table>
					          </div>
							</div>

							<div class="col-xs-12">
				          
					          	<button type="button" id="btn-finalizar" class="btn btn-success pull-right"><i class="glyphicon glyphicon-barcode"></i> Gerar Boleto
					          	</button>

				        	</div>	

			        	<!--// Form -->
			        	</form>

					</div>								

				</div>

			</div>

		</div>  

	</div>

</div>

</div>

@endsection

@push('js')
    
    <!-- plano JS -->      
    <script src="{{ asset('js/admin/planos.js') }}"></script>  

    <!--URL PagSeguro Transparent-->
    <script src="{{config('pagseguro.url_transparente_js_sandbox')}}"></script>  

    <script>
            $(function(){
                $('#btn-finalizar').click(function(){
                    setSessionId();
                    
                    return false;
                });
            });
            
            function setSessionId()
            {
                var data = $('#form').serialize();
                
                $.ajax({
                    url: "{{route('admin.boleto.codigo')}}",
                    method: "POST",
                    data: data
                }).done(function(data){
                    PagSeguroDirectPayment.setSessionId(data);
                    
                    //getPaymentMethods();
                    
                    //paymentBillet();
                }).fail(function(){
                    alert("Fail request... :-(");
                });
            }
            
            function getPaymentMethods()
            {
                PagSeguroDirectPayment.getPaymentMethods({
                    success: function(response){
                        console.log(response);
                        if( response.error == false ) {
                            $.each(response.paymentMethods, function(key, value){
                                $('.payments-methods').append(key+"<br>");
                            });
                        }
                    },
                    error: function(response){
                        console.log(response);
                    },
                    complete: function(response){
                        //console.log(response);
                    }
                });
            }
            
            function paymentBillet()
            {
                var sendHash = PagSeguroDirectPayment.getSenderHash();
                
                var data = $('#form').serialize()+"&sendHash="+sendHash;
                
                $.ajax({
                    url: "{{route('pagseguro.boleto')}}",
                    method: "POST",
                    data: data
                }).done(function(url){
                    //console.log(data);
                    
                    location.href=url;
                }).fail(function(){
                    alert("Fail request... :-(");
                });
            }
        </script>

@endpush	