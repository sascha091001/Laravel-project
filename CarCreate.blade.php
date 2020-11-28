@extends('layouts.admin')

@section('title')
	Добавление Автомобиля
@endsection

@section('content')
	<div class = "container">
		@include('common.errors')
		<h1 class = "mt-5 text-center mb-5"> Добавление автомобиля </h1>
		<form action="{{ route('cars.store') }}" method="POST" class="form-horizontal mt-3">
		  {{ csrf_field() }}
			<b> Номер: </b> <input type = "text" name = "number" class = "form-control">
			<b> Модель: </b> <input type = "text" name = "model" class = "form-control">
			<b> Состояние: </b> <input type = "text" name = "condition" class = "form-control">
			<b> Пробег: </b> <input type = "text" name = "mileage" class = "form-control">
			<b> Вес: </b> <input type = "text" name = "tonnage" class = "form-control">
			<b> Картинка: </b> <input type = "text" name = "img" class = "form-control">
			
			<input type = "submit" name = "Sub" value = "Добавить" class = "form-control mt-3 btn btn-primary" >
		</form>
	</div>	
@endsection