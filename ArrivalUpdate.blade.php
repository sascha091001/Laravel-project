@extends('layouts.admin')

@section('title')
	Добавление поездки
@endsection

@section('content')
	<div class = "container">
		<h1 class = "mt-5 text-center mb-5"> Добавление поездки </h1>
		<form action="{{ route('arrivals.update', $arrival->id) }}" method="POST" class="form-horizontal mt-3">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<b> Водитель: </b> 
			
			<select class = "form-control" name = "driver_id">
				<option value = "{{ $arrival->driver_id }}"> {{ $arrival->driver->FIO }} </option>
				@foreach ($drivers as $driver)
					<option value = "{{$driver->id}}"> {{ $driver->FIO }} </option>
				@endforeach
			</select>
			
			<b> Маршрут: </b>
			
			<select class = "form-control" name = "route_id">
				<option value = "{{ $arrival->route_id }}"> {{ $arrival->route->route_from }}-{{ $arrival->route->route_where }} </option>
				@foreach ($routes as $route)
					<option value = "{{$route->id}}"> {{ $route->route_from }}-{{ $route->route_where }} </option>
				@endforeach
			</select>
			
			<b> Авто: </b>
			
			<select class = "form-control" name = "car_id">
				<option value = "{{ $arrival->car_id }}"> {{ $arrival->car->model }} </option>
				@foreach ($cars as $car)
					<option value = "{{$car->id}}"> {{ $car->model }} </option>
				@endforeach
			</select>
			
			<b> Дата отправки: </b> <input type = "date" value = "{{ $arrival->date_of_departure }}" name = "date_of_departure" class = "form-control">
			<b> Дата приезда: </b> <input type = "date" value = "{{ $arrival->date_of_arrival }}" name = "date_of_arrival" class = "form-control">
			
			<input type = "submit" name = "Sub" value = "Добавить" class = "form-control mt-3 btn btn-primary" >
		</form>
	</div>	
@endsection