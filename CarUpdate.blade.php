@extends('layouts.admin')

@section('title')
	Обновление Автомобиля
@endsection

@section('content')
	<div class = "container" style = "min-height: 514px">
		@include('common.errors')
		@if (Session::has('message'))
			<div class = "alert alert-danger mt-3"> {{ Session::get('message') }} </div>
		@endif

		<div class="card text-white bg-dark mt-5" style = "width: 75%; margin: 0 auto">
			<div class="card-header">
				<h5 class = "text-center"> Обновление автомобиля </h5>
			</div>

			<div class="card-body">
				<form action="{{ route('cars.update', $car->id) }}" method="POST" class="form-horizontal mt-3">
					{{ csrf_field() }}
					{{ method_field('PUT') }}

					<div class = "flexer">
						<div style = "width: 48%"> <b> Номер: </b> <input type = "text" name = "number" value = "{{ $car->number }}" class = "form-control"></div>
						<div style = "width: 48%"> <b> Модель: </b> <input type = "text" name = "model" value = "{{ $car->model }}" class = "form-control"></div>
					</div>

					<div class = "flexer mt-2">
						<div style = "width: 41%"> <b> Состояние: </b> <input type = "text" name = "condition" value = "{{ $car->condition }}" class = "form-control"></div>
						<div style = "width: 31%"> <b> Пробег: </b> <input type = "text" name = "mileage" value = "{{ $car->mileage }}" class = "form-control"></div>
						<div style = "width: 21%"> <b> Вес: </b> <input type = "text" name = "tonnage" value = "{{ $car->tonnage }}" class = "form-control"></div>
					</div>

					<div class = "row mt-2">
						<div class = "col-12">
							<b> Картинка: </b> <input type = "text" name = "img" value = "{{ $car->img }}" class = "form-control">
							<input type = "submit" name = "Sub" value = "Обновить" class = "form-control mt-3 btn btn-primary" >
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<style>
		.flexer{
			display: flex;
			justify-content: space-between;
		}

		body{
			background-image: url(https://avatanplus.com/files/resources/original/5b88ffcc57cde1658f273648.jpg);
		}
	</style>

@endsection