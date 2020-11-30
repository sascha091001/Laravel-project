@extends('layouts.admin')

@section('title')
	Добавление поездки
@endsection

@section('content')
	<div class = "container">
		@include('common.errors')
		<h1 class = "mt-5 text-center mb-5"> Добавление поездки </h1>
		<form action="{{ route('arrivals.store') }}" method="POST" class="form-horizontal mt-3">
		  {{ csrf_field() }}
			<b> Водитель: </b> 
			
			<select class = "form-control" name = "driver_id">
				<option> Не выбрано </option>
				@foreach ($drivers as $driver)
					<option value = "{{$driver->id}}"> {{ $driver->FIO }} </option>
				@endforeach
			</select>
			
			<b> Маршрут: </b>
			
			<select class = "form-control" name = "route_id">
				<option> Не выбрано </option>
				@foreach ($routes as $route)
					<option value = "{{$route->id}}"> {{ $route->route_from }}-{{ $route->route_where }} </option>
				@endforeach
			</select>
			
			<b> Авто: </b>
			
			<select class = "form-control" name = "car_id">
				<option> Не выбрано </option>
				@foreach ($cars as $car)
					<option value = "{{$car->id}}"> {{ $car->model }} </option>
				@endforeach
			</select>
			
			<b> Дата отправки: </b> <input type = "date" value="{{ old('date_of_departure') }}" name = "date_of_departure" class = "form-control">
			<b> Дата приезда: </b> <input type = "date" value="{{ old('date_of_arrival') }}" name = "date_of_arrival" class = "form-control">
			
			<input type = "submit" name = "Sub" value = "Добавить" class = "form-control mt-3 btn btn-primary" >
		</form>
	</div>	
@endsection