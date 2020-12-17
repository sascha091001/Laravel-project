@extends('layouts.app')

@section('title')
	Список автомобилей
@endsection

@section('content')

	<div class = "container mt-5" style = "min-height: 514px">		
		@if(count($cars) > 0)

			<div class = "card mt-5 text-white bg-dark">
				<div class = "card-header dark">
					<h2 class = "text-center"> Автомобили </h2>
				</div>
			</div>

			<div class = "table-responsive">
				<table class="table table-striped task-table">
					<thead class="thead-light">
						<tr class = "text-center">
							<th>Номерной знак</th>
							<th>Модель</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($cars as $car)
							<tr class = "text-center">
								<td> 
									<h6> <a href = "{{route('showCarInfo', [$car->id])}}"> {{ $car->number }} </a> </h6>
								</td>
								
								<td>
									<p> <b> {{ $car->model }} </b> </p>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			{{ $cars->links('userpages.paginate') }}
		@else
			<div class= "alert alert-danger"> На текущий момент автомобилей нет! </div>
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