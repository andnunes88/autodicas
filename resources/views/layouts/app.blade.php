<!DOCTYPE html>
<html lang="pt-br">
<head>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111872517-2"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  @hasSection('titulo')

  <title>@yield('titulo') | autodicas.com</title>

  @else

  <title>autodicas.com - O maior site de compra e vendas de autopeças</title>

  @endif   

  <meta name="description" content="Autodicas - Vender e Comprar peças para carro e moto! Anuncie online no auto dicas" >
  <link rel="shortcut icon" type="image/png" href="{{asset('img/favico.png')}}"/>
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/menu.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('slick/slick-theme.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('css/lightslider.css')}}">

  <link rel="manifest" href="{{asset('manifest.json')}}">

  <!-- adsense do google-->
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


<!--Metatags para facebook -->  
<meta property="og:locale" content="pt_BR">
<meta property="og:type" content= "website" />
<meta property="og:url" content="@yield('url')">
<meta property="og:title" content="@yield('titulo')">
<meta property="og:site_name" content="autodicas.com">
<!-- Descrição do site-->
<meta property="og:description" content="@yield('descricao'), @yield('incentivo')">
<!-- Imagem do site-->
<meta property="og:image" content="@yield('imagem')">
<meta property="og:image:width" content="800"> 
<meta property="og:image:height" content="600"> 

<!--Metatags para twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@autodicasbr">
<meta name="twitter:creator" content="@autodicasbr">
<meta name="twitter:title" content="@yield('titulo') | autodicas">
<meta name="twitter:description" content="@yield('descricao'), @yield('incentivo')">
<meta name="twitter:image" content="@yield('imagem')"> 

<meta property="og:image" itemprop="image primaryImageOfPage" content="@yield('imagem')" />

<style>

@media only screen and (max-width: 600px) {

  #contact{
   text-align: center;
} 

}
</style>

</head>
<body>

  @include('layouts._site._nav')

  <main>

    @yield('content')

</main>

<section id="contact">
    <div class="container">
      <div class="col-md-2">
        <img src="{{asset('img/autodicas_footer.png')}}">
    </div>

    <div class="col-md-3">
        <h5 style="color: white">Navegação</h5>
        <ul class="list quicklinks link-rodape" style="list-style: none">
          <li><a href="http://blog.autodicas.com/">Blog</a></li>
          <li><a href="#">Mapa do site</a></li>
      </ul>
  </div>

  <div id="div-facebook" class="col-md-3">
     <h5 style="color: white">Rede Social</h5>
     <iframe id="btn-facebook" src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fautodicasbr%2F&width=176&layout=button&action=like&size=large&show_faces=true&share=true&height=65&appId=154701368560966" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
 </div>

 <div class="col-md-3">
  <h5 style="color: white">Sobre o Autodicas</h5>
  <ul class="list quicklinks link-rodape" style="list-style: none">
    <li><a href="#">Contatos</a></li>
     <li><a href="#">Regras</a></li>
 </ul>
</div>

<div class="col-md-3 col-md-offset-5">
    <ul class="list-inline social-buttons">
      <li><a href="https://twitter.com/autodicas1"><i class="fab fa-twitter" style="margin-left: 10px"></i></a>
      </li>
      <li><a href="https://facebook.com/autodicasbr"><i class="fab fa-facebook-f" style="margin-left: 15px"></i></a>
      </li>
  </ul>
</div>
</div>
</div>
</section>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 pull-right">
        <span class="copyright">Copyright &copy; Albutech Sistemas <?php echo date("Y"); ?></span>
    </div>
</div>
</div>
</footer>

<script src="{{asset('js/jquery.js')}}"></script>

<script src="{{asset('js/bootstrap.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

<script src="{{asset('js/main.js')}}"></script>

<script src="{{asset('slick/slick.js')}}" type="text/javascript" charset="utf-8"></script>

<script src="{{asset('js/lightslider.js')}}" type="text/javascript"></script>

@yield('post-script')

</body>
</html>
