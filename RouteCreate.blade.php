@extends('layouts.admin')

@section('title')
	Добавление маршрута
@endsection

@section('content')
	<div class = "container" style = "min-height:  514px">
		@include('common.errors')

		<div class="card text-white bg-dark mt-5" style = "width: 75%; margin: 0 auto">
			<div class="card-header">
				<h5 class = "text-center"> Добавление маршрута </h5>
			</div>

			<div class="card-body">
				<form action="{{ route('routes.store') }}" method="POST" class="form-horizontal mt-3">
					{{ csrf_field() }}

					<div class = "row">
						<div class = "col-6">
							<p class = "mb-2"> <b> Откуда: </b> <input type = "text" value="{{ old('route_from') }}" name = "route_from" class = "form-control"> </p>
							<p> <b> Полный путь: </b> <input type = "text" value="{{ old('full_route') }}" name = "full_route" class = "form-control"> </p>
						</div>

						<div class = "col-6">
							<p class = "mb-2"> <b> Куда: </b> <input type = "text" value="{{ old('route_where') }}" name = "route_where" class = "form-control"> </p>
							<p> <b> Расстояние: </b> <input type = "text" value="{{ old('distance') }}" name = "distance" class = "form-control"> </p>
						</div>

						<div class="col-12">
							<input type = "submit" name = "Sub" value = "Добавить" class = "form-control mt-3 btn btn-primary" >
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	

	<style>
		body{
			background-image: url(https://avatanplus.com/files/resources/original/5b88ffcc57cde1658f273648.jpg);
		}
	</style>

@endsection