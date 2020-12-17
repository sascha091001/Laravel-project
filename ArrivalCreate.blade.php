@extends('layouts.admin')

@section('title')
	Добавление поездки
@endsection

@section('content')
	<div class = "container" style = "min-height: 514px">
		@include('common.errors')
		@if (Session::has('message'))
			<div class = "alert alert-danger mt-3"> {{ Session::get('message') }} </div>
		@endif
	
		<div class="card text-white bg-dark mt-5" style = "width: 75%; margin: 0 auto">
			<div class="card-header">
				<h5 class = "text-center"> Добавление поездки </h5>
			</div>

			<div class="card-body">
				<form action="{{ route('arrivals.store') }}" method="POST" class="form-horizontal mt-3">
				{{ csrf_field() }}

					<div class = "flexer">
						<div style = "width: 48%">
							<b> Маршрут: </b>
							<select class = "form-control" name = "route_id">
								<option> Не выбрано </option>
								@foreach ($routes as $route)
									<option value = "{{$route->id}}"> {{ $route->route_from }}-{{ $route->route_where }} </option>
								@endforeach
							</select>
						</div>

						<div style = "width: 48%">
							<b> Авто: </b>
							<select class = "form-control" name = "car_id">
								<option> Не выбрано </option>
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
								<option> Не выбрано </option>
								@foreach ($drivers as $driver)
									<option value = "{{$driver->id}}"> {{ $driver->FIO }} </option>
								@endforeach
							</select>
						</div>
					</div>

					<div class = "flexer mt-2">
						<div style = "width: 48%"> <b> Дата отправки: </b> <input type = "date" value="{{ old('date_of_departure') }}" name = "date_of_departure" class = "form-control"></div>
						<div style = "width: 48%"> <b> Дата приезда: </b> <input type = "date" value="{{ old('date_of_arrival') }}" name = "date_of_arrival" class = "form-control"></div>
					</div>

					<div class = "row mt-2">
						<div class = "col-12">
							<input type = "submit" name = "Sub" value = "Добавить" class = "form-control mt-3 btn btn-primary">
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