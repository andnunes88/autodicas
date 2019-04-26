@extends('layouts.admin')

@section('content')

<style type="text/css">
	
	#total_anuncio{
		font-size:36px;
	}

</style>

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
						<form id="form" method="POST" action="{{route('admin.cart.checkout')}}">

							{{ csrf_field() }}

							<div class="form-group">				                  

				                  <div class="col-md-3">
				                  	<img src="{{asset('img/ads.png')}}">
				                  </div>

				                  <label for="quantidade_anuncio" class="col-sm-3 control-label">Escolha a quantidade de Anúncios</label>

				                  <div class="col-md-6"> 			                  	

				                    <input type="number" name="quantidade_anuncio" class="form-control" id="quantidade_anuncio" placeholder="Ex: 10" required>
				                  </div>
				                  
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
				          
					          	<button type="button" id="btn-finalizar" class="btn btn-success pull-right">Finalizar Compra
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
                    url: "{{route('pagseguro.code.transparente')}}",
                    method: "POST",
                    data: data
                }).done(function(data){

                    PagSeguroDirectPayment.setSessionId(data);                    
                                   
                    paymentBillet();
                }).fail(function(){
                    alert("Bla 1 Fail request... :-(");
                });
            }       

            
            function paymentBillet()
            {
                var sendHash = PagSeguroDirectPayment.getSenderHash();
                
                var data = $('#form').serialize()+"&sendHash="+sendHash;
                
                $.ajax({
                    url: "{{route('pagseguro.billet')}}",
                    method: "POST",
                    data: data
                }).done(function(url){
                    console.log(data);
                    
                    location.href=url;
                }).fail(function(){
                    alert("Bla 2 Fail request... :-(");
                });
            }
        </script>

@endpush	