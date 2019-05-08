
@extends('layouts.admin')

@section('content')


<style type="text/css">
	#valor_total{
		font-size: 26px;
	}
</style>

<div class="container">   

	<form id="form" method="POST" >

		{{ csrf_field() }}

		<div class="col-md-6">
			<label>Dados do Titular</label>
			<div class="form-group">								
				<input type="text" name="nome" class="form-control" placeholder="Nome*" required>
			</div>	

			<div class="form-group">
				<input type="text" name="sobre_nome" class="form-control" placeholder="Sobre Nome*" required>
			</div>	
			
			<div class="form-group">
				<input type="text" name="cpf_cnpj" class="form-control" placeholder="CPF/CNPJ do Titular*" required>	
			</div>
			
			<input type="hidden" name="id_produto" class="form-control" value="{{$produto->id}}">

			<p>Ao finalizar seu pagamento, você concorda com os <a href="#">Termos de Uso</a> do site e que sua assinatura é renovada automaticamente.</p>							
		</div>

		<div class="col-md-6">
			<h1>Resumo do Pedido</h1>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Serviço</th>
						<th scope="col">Quantidade de Anúncios</th>
						<th scope="col">Preço</th>
						
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>{{$produto->nome}}</th>
						<td>{{$produto->quantidade}}</td>
						<td>R$ {{number_format($produto->preco,2,",",".")}}</td>
						
					</tr>
				
				</tbody>
			</table>
			<p><span id="valor_total">Valor Total: {{number_format($produto->preco,2,",",".")}}</span></p>
			
			<input type="submit" id="btn-finalizar" class="btn btn-success" value="Finzalizar Pagamento">

		</div>

	</form>

	<div class="preloader" style="display: none;">
    	<img src="{{asset('img/preloader.gif')}}" alt="Preloader" style="max-width: 50px;">
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

			$(".preloader").show();

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
			$(".preloader").hide();
			alert("Bla 1 Fail request... :-(");
		});
	}       


	function paymentBillet()
    {
        var sendHash = PagSeguroDirectPayment.getSenderHash();

        var data = $('#form').serialize()+"&sendHash="+sendHash;

        alert(data);

        $.ajax({
            url: "{{route('pagseguro.billet')}}",
            method: "POST",
            data: data
        }).done(function(data){
            console.log(data);
            
            if(data.success) {
                
                location.href=data.payment_link;                

            } else {
                alert("Falha!");
            }
        }).fail(function(){
            alert("Fail request... :-(");
        }).always(function(){
            $(".preloader").hide();
        });
    }
</script>

@endpush	

