@extends('layouts.app')

@section('title')
	Авторизация
@endsection

@section('content')

<div class="container">
    <div class="row">
		<div class = "col">
		</div>
        <div class="col-md-6">
			<h2 class = "text-center mb-5"> Авторизация </h2>

			<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

					<div class="col-md-12">
						<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder = "test@example.com">

						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

					<div class="col-md-12">
						<input id="password" type="password" class="form-control" name="password" required placeholder = "Пароль">

						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8">
						<button type="submit" class="btn btn-primary">
							Login
						</button>

						<a class="btn btn-primary" href="{{ url('/password/reset') }}">
							Forgot Your Password?
						</a>
					</div>
				</div>
			</form>
        </div>
		<div class = "col">
		</div>
    </div>
</div>
@endsection
