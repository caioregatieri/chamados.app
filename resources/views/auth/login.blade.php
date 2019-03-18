@extends('auth.template')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Acesso ao sistema</div>
				<div class="panel-body">
					@if (Session::has('flash_error'))
						<div class="alert alert-danger">{!! Session('flash_error'); !!}</div>
					@endif
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Algo está errado.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Senha</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember">Lembrar credenciais
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Entrar</button>
								<!-- <a class="btn btn-link" href="{{ url('/password/email') }}">Esqueceu sua senha?</a> -->
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $('input[name=email').on('blur', function(e){
      e.preventDefault();
      inputValue = $(this).val();
      if (inputValue.length == 0) return;
      if (inputValue.indexOf('@') >= 0) return;
      $(this).val(inputValue + '@franca.sp.gov.br')
    })
  </script>
@endsection