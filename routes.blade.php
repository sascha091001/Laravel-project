@extends('layouts.app')

@section('title')
	Список маршрутов
@endsection

@section('content')

	<div class = "container mt-5" style = "min-height: 514px">
		@if (count($routes) > 0)
			<div class = "card mt-5 text-white bg-dark">
				<div class = "card-header dark">
					<h2 class = "text-center"> Маршруты </h2>
				</div>
			</div>
			
			<div class = "table-responsive">
				<table class="table table-striped">
					<thead class="thead-light">
						<tr class = "text-center">
							<th>Маршрут</th>
							<th>Дистанция, км</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($routes as $route)
							<tr class = "text-center">
								<td> 
									<h6> <a href = "{{route('showRouteInfo', [$route->id])}}"> {{ $route->route_from }}-{{ $route->route_where }} </a> </h6>
								</td>
								
								<td>
									<p> <b> {{ $route->distance }} </b> </p>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			{{ $routes->links('userpages.paginate') }}
		@else
			<div class= "alert alert-danger"> На текущий момент маршрутов нет! </div>
		@endif
	</div>
	
	<style>
		body{
			background-image: url(https://avatanplus.com/files/resources/original/5b88ffcc57cde1658f273648.jpg);
		}

		tr.text-center {
			background-color: rgb(255, 255, 255);
		}

		tr:nth-child(2n) {
			background-color: rgb(220, 220, 220);
		}
	</style>
@endsection