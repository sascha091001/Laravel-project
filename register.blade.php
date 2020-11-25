@extends('layouts.app')

@section('title')
	Регистрация
@endsection

@section('content')
<div class="container">
    <div class="row">
		<div class = "col">
		</div>
        <div class="col-md-6">
			<h2 class = "text-center mb-5"> Регистрация </h2>
			
			<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

					<div class="col-md-12">
						<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder = "Имя">

						@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

					<div class="col-md-12">
						<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder = "Почта">

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
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder = "Проверка пароля"> 
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Register
						</button>
					</div>
				</div>
			</form>
        </div>
		<div class = "col">
		</div>
	</div>
</div>
@endsection
