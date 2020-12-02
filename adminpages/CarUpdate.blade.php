@extends('layouts.admin')

@section('title')
	Обновление Автомобиля
@endsection

@section('content')
	<div class = "container">
		@include('common.errors')
		@if (Session::has('message'))
			<div class = "alert alert-danger mt-3"> {{ Session::get('message') }} </div>
		@endif
		<h1 class = "mt-5 text-center mb-5"> Обновление автомобиля </h1>
		<form action="{{ route('cars.update', $car->id) }}" method="POST" class="form-horizontal mt-3">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<b> Номер: </b> <input type = "text" name = "number" value = "{{ $car->number }}" class = "form-control">
			<b> Модель: </b> <input type = "text" name = "model" value = "{{ $car->model }}" class = "form-control">
			<b> Состояние: </b> <input type = "text" name = "condition" value = "{{ $car->condition }}" class = "form-control">
			<b> Пробег: </b> <input type = "text" name = "mileage" value = "{{ $car->mileage }}" class = "form-control">
			<b> Вес: </b> <input type = "text" name = "tonnage" value = "{{ $car->tonnage }}" class = "form-control">
			<b> Картинка: </b> <input type = "text" name = "img" value = "{{ $car->img }}" class = "form-control">
			
			<input type = "submit" name = "Sub" value = "Обновить" class = "form-control mt-3 btn btn-primary" >
		</form>
	</div>	
@endsection