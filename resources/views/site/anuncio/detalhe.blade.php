@extends('layouts.app')

@section('content')

<style>
    .produto-titulo{
        margin: 0;
        font-size: 26px;
        line-height: 1;
        font-weight: 600;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 5px;
        max-width: Inherited;

    } 

    .item a{
        color: #38b;
        text-decoration: none;
       
    }

    #panel-redes-sociais{
        padding: 0;
        margin: 0;
        text-align:center;        
    }

    #panel-redes-sociais ul{
        list-style: none;
        padding: 0;
        margin: 0;       
    }

    #panel-redes-sociais ul li{
        display: inline;
        font-size: 36px;

    }

    #btn-twitter{
        color: #00aced;
    }

    #btn-facebbok{
        color: #3b5998;

    }

    #btn-whatsapp a{
        color: #34af23;         
    }
    
    .btn-tel{
        width: 100%;   
        margin-bottom: 5px; 
        background: #F70;
        border: none;
    }

    .btn-tel a{
        color:#fff;  
    } 

    .btn-loja{
        width: 100%;
    }   

    .btn-loja a{
        color:#fff;
    }    

</style>

<div class="container">    
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#"> # </a></li>
            <li class="active">Detalhe</li>
        </ol>
    </div>
</div>

<div class="container">         
    <div class="row">
        
		<h1 class="produto-titulo">{{$registro->titulo}}</h1>
            
            <!-- Input para armazenar o id do anúncio-->
            <input type="hidden" id="anuncio_id" name="anuncio_id" value="{{$registro->id}}">

            <div class="col-md-9">
                
                <div>
                    
                    @if(isset($galeria) && $galeria->count() > 0)
                    
                        <ul id="lightSlider">

                            <li data-thumb="{{asset('img/thumb/cS-1.jpg')}}"> 
                                <img class="img" src="#"/>
                            </li>
                                    
                        </ul>

                    @else
                        <img class="imagem-produto" src="{{ asset($registro->imagem) }}" alt="{{ $registro->anuncio_slug }}">
                    @endif

                </div>

                </br>                 

                @if($registro->valor == 0)
                    <h4>Preço: <span class="produto-preco"> A combinar</span></h4>
                @else
                    <h4>Preço: <span class="produto-preco">R$ {{number_format($registro->valor,2,",",".")}}</span></h4>
                @endif

            </div>

            <div class="col-md-3">
                
                    <div class="panel panel-default">
                        <div class="panel-heading">Informações do Anunciante</div>
                        <div class="panel-body text-center">
                            <div class="informacoes-loja">
                                <div class="logo-loja">
                                  
                                    <h3> {{$registro->usuario->name}} </h3>                                            
                                    <p> Localização: <strong> {{isset($registro->usuario->cidade->cidade_nome) ? $registro->usuario->cidade->cidade_nome : ''}} </strong></p>
                                    
                                                                       
                                    <a href="tel:{{isset($registro->usuario->telefone) ? $registro->usuario->telefone : ''}}">                                  
                                        <button type="button" id="telefone" value="{{isset($registro->usuario->telefone) ? $registro->usuario->telefone : ''}}" class="btn btn-primary btn-tel">
                                            <span class="glyphicon glyphicon-earphone"></span>  Ver numero
                                        </button>                                    
                                    </a> 

                                </div>

                            </div>
                        </div>
                    </div>
                
            </div>           

            <div class="col-md-9">                
                <hr>
                <h4>Detalhe:</h4>
                <p>{!! nl2br($registro->descricao) !!}</p>
                
                <hr>

                <h4 class="text-uppercase">Localização: </h4>                   

                    <ul>
                        @if(isset($registro->usuario->cep))
                        <li><strong>CEP:</strong> {{ $registro->usuario->cep }} </li>
                        @endif

                        @if(isset($registro->usuario->estado->uf))
                        <li><strong>Estado:</strong> {{ $registro->usuario->estado->uf }} </li> 
                        @endif

                        @if(isset($registro->usuario->cidade->cidade_nome))
                        <li><strong>Cidade:</strong> {{ $registro->usuario->cidade->cidade_nome }} </li>
                        @endif

                        @if(isset($registro->usuario->bairro))
                        <li><strong>Bairro</strong> {{ $registro->usuario->bairro }}</li>
                        @endif

                        @if(isset($registro->usuario->endereco))
                        <li><strong>Endereço:</strong> {{ $registro->usuario->endereco }}</li>
                        @endif

                        @if(isset($registro->usuario->numero))
                        <li><strong>Número:</strong> {{ $registro->usuario->numero }} </li>
                        @endif

                        @if(isset($registro->usuario->complemento))
                        <li><strong>Complemento:</strong>  {{ $registro->usuario->complemento }} </li>
                        @endif

                    </ul>                    

            </div>

            <div class="col-md-3">
                <aside>
                    <div class="panel panel-default">
                        <div class="panel-heading">Dicas de segurança</div>
                        <div class="panel-body text-left">
                            <ul>
                                <li class="dicas-seguranca"><i class="fas fa-check"></i> Ligue para o Anunciante</li>
                                <li class="dicas-seguranca"><i class="fas fa-check"></i> Diga que viu no autodicas</li>
                                 <li class="dicas-seguranca"><i class="fas fa-check"></i> Confirme se tem o produto</li>
                                <li class="dicas-seguranca"><i class="fas fa-check"></i> Confirme o preço</li>
                            </ul>
                        </div>
                    </div>
                </aside> 
            </div>


             <div class="col-md-3">
                <aside>
                    <div class="panel panel-default">
                        <div class="panel-heading">Compartilhar nas redes sociais</div>

                        <div id="panel-redes-sociais" class="panel-body text-left">
                            
                            <ul>
                                
                                <li class="item" id="btn-facebbok">
                                    <a lurker="social_share_facebook" data-lurker_last_bump_age_secs="0" rel="nofollow" title="Compartilhar pelo Facebook" target="_blank" href="https://www.facebook.com/sharer.php?t=&amp;u={{url()->current()}}" onclick="return open_facebook('{{url()->current()}}');"> <i class="fab fa-facebook-square"></i>
                                         
                                    </a>

                                </li>

                                <li class="item" >
                                    <a id="btn-twitter" lurker="social_share_facebook" data-lurker_last_bump_age_secs="0" rel="nofollow" title="Compartilhar pelo Twitter" target="_blank" href="https://twitter.com/share?text=# - autodicas.com&url={{url()->current()}}" onclick="return open_twitter('{{url()->current()}}');"> <i class="fab fa-twitter"></i> 
                                         
                                    </a>
                                </li>

                                <li class="item">
                                    <a href="mailto:?subject=#&body={{url()->current()}}">
                                        <i class="far fa-envelope"></i>  
                                    </a>
                                </li>
                               
                                <li class="item" id="btn-whatsapp">
                                    <a  href='whatsapp://send?text={{url()->current()}}' title="Compartilhar no whatsapp" rel="nofollow"> 
                                    <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>

                            </ul>

                        </div>
                 

                    </div>
                </aside> 
            </div>            

            <div class="col-md-12">
            	
            	{{-- @include('layouts._site._galeria_produtos_recomendados') --}}

            </div>		

        </div> <!--//div -->
    </div>    
</div>
@endsection

