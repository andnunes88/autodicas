<style>
	.titulo-destaque{
		margin-top: 40px;
	}
	.pagination_button{
		color: #22b14c;
    	text-decoration: none;
    	font-size: 14px;
    	font-weight: 700;
	}

	@media (max-width: 600px) 
	{

		.pagination_button{
			
			background-color: #22b14c;
		    border-radius: 2px;
		    color: #FFF;
		    display: block;
		    text-decoration: none;
		    height: 45px;
		    font-size: 1.5rem;
		    font-weight: bold;
		    line-height: 4.5rem;
		    text-align: center;
		    margin-bottom: 10px;    

		}

		.anuncio-destaque{
			margin-top: 10px;	
			//border: 1px solid red;		
		}

		div > .container_ver_mais{
				padding: 0 10px;
			}
		
	}
	
	.pagination_button:hover{
		color:#333;
		background:#f7bd49;		
		text-decoration: none;

	}

	#produtos-galeria {
		background-color: #eeeeee;
		padding: 0;
	}

</style>

<section id="produtos-galeria">
	
    <div class="col-lg-12 text-center">
        <h3 class="section-heading anuncio-destaque">Anúncios em destaque</h3>
    </div>        
    
    <div class="container">			
		<div class="row">			
			
			@foreach($registros as $anuncio)
				<div class="gallery">
				  <a href="#">
					<img src="{{ asset($anuncio->imagem) }}" alt="Imagem do produto" width="224" height="224" class="img-responsive center-block">
				  </a>
				  <div class="desc">{{$anuncio->titulo}}</div>
				  
				   	@if($anuncio->valor == 0)
                    	<div class="preco">A combinar</div>
                	@else
                    	<div class="preco">R$ {{number_format($anuncio->valor,2,",",".")}}  </div>
                	@endif

				</div>	
			@endforeach		
			
			<div class="clearfix"></div>
			
			<div class="container_ver_mais">

				<a class="pagination_button" href="{{route('ads')}}">
					Mais Anúncios	
				</a>

			</div>
							
		
		</div>
			
	</div>

</section>