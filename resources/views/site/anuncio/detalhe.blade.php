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
        background: #0199de;
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
         
    <div class="row">
        
		<h1 class="produto-titulo">#</h1>
            
            <div class="col-md-9">
                <div>
                    
                    @if(1 == 1)
                    
                        <ul id="lightSlider">
                            
                           
                            
                                <li data-thumb="{{asset('img/thumb/cS-1.jpg')}}"> 
                                    <img class="img" src="#"/>
                                </li>

                           
                                    
                        </ul>

                    @else
                        <img class="imagem-produto" src="#" alt="#">
                    @endif

                </div>

                </br>                 

                @if(1 == 1)
                    <h4>Preço: <span class="produto-preco"> A combinar</span></h4>
                @else
                    <h4>Preço: <span class="produto-preco">R$ #</span></h4>
                @endif

            </div>

            <div class="col-md-3">
                
                    <div class="panel panel-default">
                        <div class="panel-heading">Informações da loja</div>
                        <div class="panel-body text-center">
                            <div class="informacoes-loja">
                                <div class="logo-loja">
                                   
                                   

                                    <a href="#">
                                        <img src="#" alt="#"> 
                                    </a>

                                    <h3> ###</h3>                                            
                                    <p> Localização: <strong> ### </strong></p>
                                    
                                    <a href="tel:#">                                  
                                        <button type="button" class="btn btn-primary btn-tel">
                                          <span class="glyphicon glyphicon-earphone"> </span> 
                                          ###
                                        </button>                                    
                                    </a>

                                </div>

                                <div>
                                    <a href="#">
                                        <button type="button" class="btn btn-primary btn-loja">
                                          <span class="glyphicon glyphicon-home"> </span> 
                                          Perfil da Loja 
                                        </button>   
                                    </a>                                   
                                </div>

                                
                            </div>
                        </div>
                    </div>
                
            </div>

            <div class="col-md-9">                
                <hr>
                <h3>Detalhe do produto</h3>
                <p>###</p>
                <p>###</p>
                <p>###</p>

                <hr>

                <h3 class="text-uppercase">Localização </h3> 

                  

                    <ul>
                        
                        <li><strong>Endereço:</strong>  ### </li>
                        <li><strong>CEP:</strong>      ###  </li>
                        <li><strong>Bairro:</strong>    ### </li>
                        <li><strong>Cidade:</strong>    ### </li>
                    </ul>             
                  

                   

            </div>

            <div class="col-md-3">
                <aside>
                    <div class="panel panel-default">
                        <div class="panel-heading">Dicas de segurança</div>
                        <div class="panel-body text-left">
                            <ul>
                                <li class="dicas-seguranca"><i class="fas fa-check"></i> Ligue para Anunciante</li>
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
                        <div class="panel-heading">Divulgar nas redes sociais</div>

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