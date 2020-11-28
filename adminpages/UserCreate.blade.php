@extends('layouts.admin')

@section('title')
	Добавление пользователя
@endsection

@section('content')
	<div class = "container">
		<h1 class = "mt-5 text-center mb-5"> Добавление пользователя </h1>
		<form action="{{ route('users.store') }}" method="POST" class="form-horizontal mt-3">
		  {{ csrf_field() }}			
			<b> Имя </b> <input type = "text" name = "name" class = "form-control">
			<b> Почта </b> <input type = "text" name = "email" class = "form-control">
			<b> Пароль </b> <input id="password" type="password" class="form-control" name="password" required placeholder = "Пароль">
			<b> Проверка </b> <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder = "Проверка пароля"> 
			<b> Тип </b>
			<select class = "form-control" name = "type">
				@foreach ($arr as $elem)
					<option> {{ $elem }} </option>
				@endforeach
			</select>
			<p> <b> Водитель </b> (Если тип водитель, то указываем водителя) </p>
			
			<select class = "form-control" name = "driver_id">
				<option> Не выбрано </option>
				@foreach ($drivers as $driver)
					<option value = "{{$driver->id}}"> {{ $driver->FIO }} </option>
				@endforeach
			</select>
			
			<input type = "submit" name = "Sub" value = "Добавить" class = "form-control mt-3 btn btn-primary" >
		</form>
	</div>	
@endsection