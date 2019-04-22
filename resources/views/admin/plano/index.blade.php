@extends('layouts.admin')

@section('content')

<style>

	#img-perfil{

		width: 128px;
		height: 128px;
		display: inline;
	}
	#txt-boas-vidas{
		display: inline;
	}
	#img-moeda{
		width: 64px;
		height: 64px;

	}
	.moedas{
		display: inline;
	}

</style>

<div class="container">    

	<div class="row">

		<div class="conteudo">

			<ul class="nav nav-tabs">
				<li><a data-toggle="tab" href="#home">Area Pessoal</a></li>
				<li><a href="{{route('admin.anuncios')}}">Meus Anúncios</a></li>
				<li class="active"><a href="{{route('admin.planos')}}">Planos</a></li>
				<li><a href="{{route('admin.perfil')}}">Editar Perfil</a></li>
			</ul>

			<div class="tab-content">

				<div id="home" class="tab-pane fade in active">

					<div class="row">

						<div class="col-md-12">
							<h2 class="page-header"><i class="glyphicon glyphicon-th-list"></i> Quantos Anuncios quer divulgar ?</h2>
							<small>Data: 22/04/2019</small>							

						</div>

						<div class="form-group">
			                  <label for="quantidade_anuncio" class="col-sm-2 control-label">Escolha a quantidade de anúncios</label>

			                  <div class="col-md-4">
			                    <input type="text" class="form-control" id="quantidade_anuncio" placeholder="Ex: 10">
			                  </div>
			            </div>
						
					</div>	

					<div class="row">
						
						<div class="col-md-6">
							<p>Formas de Pagamento</p>
							Boleto
						</div>

						<div class="col-md-6">
							<p>Valor a pagar</p>
							<div class="table-responsive">
				            <table class="table">
				              <tbody><tr>
				                <th style="width:50%">Preço individual do anúncio</th>
				                <td>5,00 R$</td>
				              </tr>
				               <tr>
				                <th>Quantidade de Anuncio:</th>
				                <td id="qdt_anuncio">0</td>
				              </tr>

				              <tr>
				                <th>Total:</th>
				                <td id="total_anuncio">0 R$</td>
				              </tr>
				            </tbody></table>
				          </div>
						</div>

					</div>	

					<div class="col-xs-12">


			          
			          <button type="button" class="btn btn-success pull-right"><i class="glyphicon glyphicon-barcode"></i> Gerar Boleto
			          </button>

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

@endpush	