@extends('layouts.app')

@section('title')
	Список маршрутов
@endsection

@section('content')
	<div class = "container mt-5">
		<h2 class = "text-center mb-5"> Маршруты </h2>
		
		<table class="table table-striped task-table">
			<thead class="thead-dark">
				<tr class = "text-center">
					<th>Маршрут</th>
					<th>Дистанция, км</th>
				</tr>
			</thead>

          <tbody>
            @foreach ($routes as $route)
              <tr class = "text-center">
				<td> 
					<div> <a href = "{{route('showRouteInfo', [$route->id])}}"> {{ $route->route_from }}-{{ $route->route_where }} </a> </div>
				</td>
				
				<td>
					<p> <b> {{ $route->distance }} </b> </p>
				</td>
              </tr>
            @endforeach
          </tbody>
        </table>
	</div>
	
	<style>
		td{
			border: 1px solid black;
			background-color: white;
		}
		
		th{
			border: 1px solid black;
		}
	
		body{
			background-image: url(https://img1.akspic.ru/image/109219-tekstura-belye-liniya-uzor-stena-1920x1080.jpg);
			<!--background-image: url(http://rebeccagordongroup.org/site/wp-content/uploads/2012/08/RGGWebBackground.png);-->
		}
	</style>
@endsection