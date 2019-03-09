   <style type="text/css">
     #btn-Anunciar{
      font-size: 16px;     
      background: #ed6b3e!important;
      
     }

     #btn-Anunciar a{
      color:#fff;
      padding: 10px 15px;
     }
     #barra-admin{
        background: #ffcd00;
        border: none;      
     }

     #barra-admin:focus{
        background: red;
       
     }

     #barra-admin > div > div.navbar-header > a{     
        color: #444;
     }

     #navbar > ul > li > a{
      color: #444;
      background: #ffcd00;
     }

     #navbar > ul > li > ul > li > a{
      color: #444;
     }

     #navbar > ul > li > ul > li > a:hover{
      color: #fff;
      background: #ffcd00;
     }

     #navbar > ul > li:nth-child(2) > a{
      font-size: 16px;
      margin-top: 10px;
      margin-bottom: 10px;
      padding: 5px 10px;
      color: #fff;
      background: #F70;
      border: 1px solid #F70;
     }

   </style>
   <!-- Fixed navbar -->
   <nav id="barra-admin" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('site.home')}}">Autodicas.com</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        
        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
            <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
             {{Auth::user()->name}}<span class="caret"></span></a>
             
            <ul class="dropdown-menu">              

              <li><a href="{{route('admin.dashboard')}}"><span class="glyphicon glyphicon-user"> </span> Área Pessoal</a></li>
              <li><a href="{{route('admin.anuncios')}}"><span class="glyphicon glyphicon-th-large"> </span> Meus Anúncios</a></li>
              <li><a href="{{route('admin.perfil')}}"><span class="glyphicon glyphicon-edit"> </span> Editar Perfil</a></li>
              <li><a href="{{route('admin.login.sair')}}"><span class="glyphicon glyphicon-remove-circle"> </span> Sair</a></li>            
                                    
            </ul>
          </li>

          <li><a class="btn-anunciar btn btn-xs btn-warning" href="{{route('admin.anuncios.cadastrar')}}">Anunciar</a></li>          
          
        </ul>        

      </div><!--/.nav-collapse -->
    </div>

  </nav>

