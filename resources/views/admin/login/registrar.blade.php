
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Criar conta</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">

    <style type="text/css">
    	#btn-google{
    		margin-top: 5px;
    	}

    	#btn-google a{
    		text-decoration: none;
    	}
    </style>
  </head>

  <body>

	<h2 class="text-center">Autodicas</h2>
	
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
											
					<form action="{{ route('admin.registrar') }}" method="post" enctype="multipart/form-data" >
						
						{{ csrf_field() }}

						<div class="well well-lg">
							<p class="lead">Criar nova conta</p>
							<div class="form-group">
								<label>E-mail:</label>
								<input type="text" name="email" value="" class="form-control" placeholder="Digite seu E-mail" autofocus="" required>
							</div>
							<div class="form-group">
								<label>Senha:</label>
								<input type="password" name="password" value="" placeholder="Digite sua senha" class="form-control">
							</div>
																					
							<hr>
							<button type="submit" class="btn btn-primary btn-block">Criar conta</button>
							
							
							<div id="btn-google">
								<a href="/login/google">
									<button type="button" class="btn btn-danger btn-block">Entrar com google </button>
								</a>
							</div>
							
						</div>
					</form>
				</div>
			</div>
		</div>
	

	<footer class="text-center">
		<a target="_blank" href="#">
		  Condições de Uso
		</a>
		<span>|</span>
	  
	  
		<a target="_blank" href="#">
		  Política de Privacidade
		</a>
		<span>|</span>
	  
	   
		<a target="_blank" href="#">
		  Ajuda
		</a>

		<a href="/email">Email</a>
		
	</footer>
	


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
   
  </body>
</html>


