@extends('layouts.admin')

@section('title')
	Добавление водителя
@endsection

@section('content')
	<div class = "container" style = "min-height: 514px">
		@include('common.errors')

		<div class="card text-white bg-dark mt-5" style = "width: 75%; margin: 0 auto">
			<div class="card-header">
				<h5 class = "text-center"> Добавление водителя и аккаунта </h5>
			</div>

			<div class="card-body">
				<form action="{{ route('drivers.store') }}" method="POST" class="form-horizontal mt-3">
					{{ csrf_field() }}

					<div class = "row">
						<div class = "col-6">
							<p class = "mb-2"> <b> ФИО: <input type = "text" value="{{ old('FIO') }}" name = "FIO" class = "form-control"> </b> </p>
							<p> <b> Дата рождения: <input type = "date" value="{{ old('birthday') }}" name = "birthday" class = "form-control"> </b> </p>
						</div>

						<div class = "col-6">
							<p class = "mb-2"> <b> Опыт: </b> <input type = "text" value="{{ old('experience') }}" name = "experience" class = "form-control"> </p>
							<p> <b> Зарплата: </b> <input type = "text" value="{{ old('salary') }}" name = "salary" class = "form-control"> </p>
						</div>
					</div>
							
					<div class = "row mt-5">
						<div class = "col-6">
							<p class = "mb-2"> <b> Логин </b> <input type = "text" value="{{ old('name') }}" name = "name" class = "form-control"> </p>
						</div>

						<div class = "col-6">
							<p class = "mb-2"> <b> Почта </b> <input type = "text" value="{{ old('email') }}" name = "email" class = "form-control" placeholder = "example@example.com"> </p>
						</div>

						<div class = "col-12">
							<p class = "mb-2"> <b> Пароль </b> <input id="password" type="password" class="form-control" name="password" required placeholder = "Пароль"> </p>
							<p> <b> Проверка </b> <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder = "Проверка пароля"> </p>
							<input type = "submit" name = "Sub" value = "Добавить" class = "form-control btn btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	

	<style>
		body{
			background-image: url(https://avatanplus.com/files/resources/original/5b88ffcc57cde1658f273648.jpg);
		}
	</style>

@endsection