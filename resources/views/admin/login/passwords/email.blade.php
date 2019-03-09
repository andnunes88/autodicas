@extends('layouts.app')

@section('content')
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">Reset senha</div>

				<div class="panel-body">
					
					 @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

					
					<form action="{{ url('/password/email') }}" method="POST">
						
						{{ csrf_field() }}

						<div class="form-group">
					      <label for="email">E-mail:</label>
					      <input type="email" class="form-control" id="email" name="email">
					    </div>

					    <button type="submit" class="btn btn-default">Resetar senha</button>

					</form>	
				</div>
			</div>
		</div>
	</div>

@endsection