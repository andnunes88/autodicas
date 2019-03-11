@extends('layouts.app')

@section('content')

@section('titulo', 'Autodicas.com - O maior site de autopeças do Brasil') 
@section('url', Request::url())
@section('descricao', 'Encontre auto peças e serviços perto de você. Acesse agora autodicas.com')
@section('imagem', asset('img/autodicas-social.png'))

<style >
.link-ordenacao{
    padding: 0 3px 10px;
    font-size: 14px;
    text-decoration: none;
}

#div-categoria{
    padding: 0;
    margin: 0;
}   

@media only screen and (max-width: 600px) {

    #breadcrumb{
        display: none;

    }
}

#filtro-categoria{
    border: 1px solid red;
    width: 300px;
    position: fixed;
    margin: 8px;
    border: 1px solid rgba(51,51,51,.1);
    float: left;
    background-color: #fff;
    border-radius: 4px;

}

#filtro-categoria h1{ 
    font-size: 16px;
    margin-left: 10px;
}

#filtro-categoria ul li{
    list-style: none;
}

#filtro-categoria a{
 color: #666;
 text-decoration: none;

}

#filtro-categoria a:hover{
    color: #999;
}

ul li{
    list-style: none;
    padding: 0;
    margin: 0;
}


.shelf-category-list  ul  li  a{
    padding: 0;
    margin: 0;
    display: block;
    color: #666;
    position: relative;
    text-decoration: none;
}

.shelf-category-list  ul  li  a:hover{
    text-decoration: none;
    color: #999;   
}

.titulo-anuncio{
   font-size: 20px;
   margin: 0;
   padding: 0;
}

#banner-autodicas{

    width: 728px;
    height: 90px;
    margin-bottom: 30px;
    margin-left: auto;
    margin-right: auto;
}

.search {
    margin: 10px 0 0 0;
}

</style>  

<div id="banner-autodicas">
    <img src="{{ asset('img/banners/anuncie_autodicas.png') }}" alt="">
</div>    

<div class="container">

    <div class="row">
        <div class="col-md-12">

            <ol class="breadcrumb">
                <li><a href="{{route('site.home')}}">Home</a></li>
                <li class="active">Todos os Produtos</li>
            </ol>

        </div>
    </div>

    @include('layouts._site._filtro')

</div>

<div class="container">        

    <div class="row-main">

        <div class="col-md-12" id="sidebar">


            <h4> Anúncios </h4>			

            @foreach($registros as $anuncio)

            <a href="#" class="lista-produto">

             <div id="lista-produto" class="row borda">

              <div class="col-xs-4 col-md-2 text-center">
                 <img src="{{ asset($anuncio->imagem) }}" width="160" height="160" alt="Imagem do produto"
                 class="img-rounded img-responsive img-list" />
             </div>

             <div class="col-xs-8 col-md-7 section-box">

                 <h1 class="titulo-anuncio">{{$anuncio->titulo}}</h4>

                 </br>

                 @if( $anuncio->valor == 0 )
                 <span id="preco">A Combinar</span>
                 @else
                 <span id="preco">R$ {{number_format($anuncio->valor,2,",",".")}}</span>
                 @endif

                 <p class="info-loja">
                     <small> {{ $anuncio->usuario->estado }} - {{ $anuncio->usuario->cidade }}</small> <br>
                     <small> {{ $anuncio->categoria->categoria_nome }}</small> 
                 </p>
             </div>

             <div class="col-xs-12 col-md-3 section-box">
                 <div class="row rating-desc">
                    <div class="col-md-12">

                       <p><strong>Vendedor:</strong> {{ $anuncio->usuario->name }} </p>
                       <p class="info-loja"><strong>Local:</strong> {{ $anuncio->usuario->cidade }}</p>	   

                   </div>
               </div>
           </div>

       </div>

   </a>

   @endforeach



   {{-- $registros->appends(Request::only('order'))->links() --}}				

</div>

</div>

</div>   


@endsection

