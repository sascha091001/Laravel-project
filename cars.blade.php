@extends('layouts.app')

@section('title')
	Список автомобилей
@endsection

@section('content')
	<div class = "container mt-5">
		<h2 class = "text-center mb-5"> Автомобили </h2>
		
		@if(count($cars) > 0)
			<table class="table table-striped task-table">
				<thead class="thead-dark">
					<tr class = "text-center">
						<th>Номерной знак</th>
						<th>Модель</th>
					</tr>
				</thead>

			  <tbody>
				@foreach ($cars as $car)
				  <tr class = "text-center">
					<td> 
						<div> <a href = "{{route('showCarInfo', [$car->id])}}"> {{ $car->number }} </a> </div>
					</td>
					
					<td>
						<p> <b> {{ $car->model }} </b> </p>
					</td>
				  </tr>
				@endforeach
			  </tbody>
			</table>
		@else
			Нет авто
		@endif
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