<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Albutech.com">
    <link rel="icon" href="../../favicon.ico">

    <title>{{ $titulo }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    
    <!-- Css personalizado -->
    <link href="{{asset('css/estilo.css')}}" rel="stylesheet">

  </head>

  <body>

    @include('layouts._site._nav')

    <main>
        
        <br><br><br>
        <!-- add mensagem de sucesso ou erro ao tentar logar-->
        @if(Session::has('mensagem'))

            <div class="container">
                <div class="row">
                   <div class="{{ Session::get('mensagem')['class']}}">
                       {{ Session::get('mensagem')['msg']}}
                   </div>

                </div>
            </div>

        @endif

        @yield('content')

    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
       
  </body>
</html>
