@extends('layouts.admin')

@section('title')
	Создание отзыва
@endsection

@section('content')
	<div class = "container">
		@include('common.errors')
		<h1 class = "mt-5 text-center mb-5"> Создание отзыва </h1>
		<form action="{{ route('reviews.store') }}" method="POST" class="form-horizontal mt-3">
		  {{ csrf_field() }}
			<b> Водитель: </b> 
			
			<select class = "form-control" name = "driver_id">
				<option> Не выбрано </option>
				@foreach ($drivers as $driver)
					<option value = "{{$driver->id}}"> {{ $driver->FIO }} </option>
				@endforeach
			</select>
			
			<b> Пользователь: </b>
			
			<select class = "form-control" name = "user_id">
				<option> Не выбрано </option>
				@foreach ($users as $user)
					<option value = "{{$user->id}}"> {{ $user->name }} </option>
				@endforeach
			</select>
			
			<b> Текст: </b> <input type = "text" value="{{ old('text') }}" name = "text" class = "form-control">
			
			<input type = "submit" name = "Sub" value = "Добавить" class = "form-control mt-3 btn btn-primary" >
		</form>
	</div>	
@endsection