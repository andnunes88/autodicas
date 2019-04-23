@extends('layouts.admin')

@section('content')

<div class="container">    

	<div class="row">

		<div class="conteudo">	

			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Histórico de compra</li>
			</ol>	

			<div class="page-header">
			  <h1>Histórico de compra </h1>
			</div>

			<table class="table"> 

				 <thead> 
				 	<tr> 
				 		<th>#</th> 
				 		<th>Anúncios</th>
				 		<th>Data</th>
				 		<th>Preço Total</th> 
				 		<th>Tipo de Pagamento</th> 
				 		<th>Recibo</th> 

				 	</tr> 
				 </thead> 

				 <tbody> 
				 	<tr> 
				 		<th scope="row">1</th> 
				 		<td>5 anúncios</td> 
				 		<td>22/04/2018</td> 
				 		<td>25,00</td> 
				 		<td>Boleto</td> 
				 		<td><a href="#">Recibo</a></td> 
				 	</tr> 
				 	 
				 </tbody> 
			</table>

		</div>  

	</div>

</div>

</div>

@endsection

@push('js')
    
    <!-- plano JS -->      
    <script src="{{ asset('js/admin/planos.js') }}"></script>    

@endpush	