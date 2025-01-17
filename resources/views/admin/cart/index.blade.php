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
				<li><a href="{{route('admin.dashboard')}}">Area Pessoal</a></li>
				<li><a href="{{route('admin.anuncios')}}">Meus Anúncios</a></li>
				<li class="active"><a href="{{route('admin.cart')}}">Planos</a></li>
				<li><a href="{{route('admin.perfil')}}">Editar Perfil</a></li>
			</ul>

			<div class="tab-content">

				<div id="home" class="tab-pane fade in active">

						<div class="row">

							<div class="col-md-12">
								<h2 class="page-header"><i class="glyphicon glyphicon-th-list"></i> Quer inserir vários anúncios?</h2>
							</div>

							<div class="col-md-12">

								@foreach($produtos as $produto)
								
								<div class="col-md-4">
									<h1>{{$produto->nome}}</h1>
									<p>{{$produto->descricao}}</p>
									<p>{{$produto->quantidade}}</p>
									<h2>R$: {{number_format($produto->preco,2,",",".")}}</h2>
									<a href="{{route('admin.cart.checkout',$produto->id)}}"><button>Comprar</button></a>
								</div>

								@endforeach
								
								
							</div>					
			

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
                var sendHash = PagSeguroDirectPayment.onSenderHashReady();
                
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