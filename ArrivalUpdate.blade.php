@extends('layouts.admin')

@section('title')
	Обновление поездки
@endsection

@section('content')
	<div class = "container" style = "min-height: 514px">
		@include('common.errors')
		@if (Session::has('message'))
			<div class = "alert alert-danger mt-3"> {{ Session::get('message') }} </div>
		@endif

		<div class="card text-white bg-dark mt-5" style = "width: 75%; margin: 0 auto">
			<div class="card-header">
				<h5 class = "text-center"> Обновление поездки </h5>
			</div>

			<div class="card-body">
				<form action="{{ route('arrivals.update', $arrival->id) }}" method="POST" class="form-horizontal mt-3">
					{{ csrf_field() }}
					{{ method_field('PUT') }}

					<div class = "flexer">
						<div style = "width: 48%">
							<b> Маршрут: </b>
					
							<select class = "form-control" name = "route_id">
								@if ($arrival->route)
									<option value = "{{ $arrival->route_id }}"> {{ $arrival->route->route_from }}-{{ $arrival->route->route_where }} </option>
								@else
									<option> Не выбрано </option>
								@endif
								@foreach ($routes as $route)
									<option value = "{{$route->id}}"> {{ $route->route_from }}-{{ $route->route_where }} </option>
								@endforeach
							</select>
						</div>

						<div style = "width: 48%">
							<b> Авто: </b>
					
							<select class = "form-control" name = "car_id">
								@if ($arrival->car)
									<option value = "{{ $arrival->car_id }}"> {{ $arrival->car->model }} </option>
								@else
									<option> Не выбрано </option>
								@endif
								@foreach ($cars as $car)
									<option value = "{{$car->id}}"> {{ $car->model }} </option>
								@endforeach
							</select>
						</div>
					</div>

					<div class = "flexer mt-2">
						<div style = "width: 100%">
							<b> Водитель: </b> 
					
							<select class = "form-control" name = "driver_id">
								@if ($arrival->driver)
									<option value = "{{ $arrival->driver_id }}"> {{ $arrival->driver->FIO }} </option>
								@else
									<option> Не выбрано </option>
								@endif
								@foreach ($drivers as $driver)
									<option value = "{{$driver->id}}"> {{ $driver->FIO }} </option>
								@endforeach
							</select>
						</div>
					</div>

					<div class = "flexer mt-2">
						<div style = "width: 48%"> <b> Дата отправки: </b> <input type = "date" value = "{{ $arrival->date_of_departure }}" name = "date_of_departure" class = "form-control"></div>
						<div style = "width: 48%"> <b> Дата приезда: </b> <input type = "date" value = "{{ $arrival->date_of_arrival }}" name = "date_of_arrival" class = "form-control"></div>
					</div>

					<div class = "row mt-2">
						<div class = "col-12">
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