@extends('layouts.admin')

@section('title')
	Добавление водителя
@endsection

@section('content')
	<div class = "container">
		@include('common.errors')
		<h1 class = "mt-5 text-center mb-5"> Добавление водителя </h1>
		<form action="{{ route('drivers.store') }}" method="POST" class="form-horizontal mt-3">
		  {{ csrf_field() }}
			<b> ФИО: </b> <input type = "text" value="{{ old('FIO') }}" name = "FIO" class = "form-control">
			<b> Дата рождения: </b> <input type = "date" value="{{ old('birthday') }}" name = "birthday" class = "form-control">
			<b> Опыт: </b> <input type = "text" value="{{ old('experience') }}" name = "experience" class = "form-control">
			<b> Зарплата: </b> <input type = "text" value="{{ old('salary') }}" name = "salary" class = "form-control">
			
			<h1 class = "mt-5 text-center mb-5"> Добавление учётной записи </h1>
			
			<b> Имя </b> <input type = "text" value="{{ old('name') }}" name = "name" class = "form-control">
			<b> Почта </b> <input type = "text" value="{{ old('email') }}" name = "email" class = "form-control">
			<b> Пароль </b> <input id="password" type="password" class="form-control" name="password" required placeholder = "Пароль">
			<b> Проверка </b> <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder = "Проверка пароля"> 
			
			<input type = "submit" name = "Sub" value = "Добавить" class = "form-control mt-3 btn btn-primary" >
		</form>
	</div>	
@endsection