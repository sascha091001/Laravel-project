@extends('layouts.admin')

@section('title')
	Просмотр поездки
@endsection

@section('content')
	<div class = "container">
		<div class="card text-white bg-dark mt-5">
			<div class="card-header">
				<h5 class = "text-center"> Просмотр поездки </h5>
			</div>
	
			<div class="card-body">
				<div class = "row">
					<div class = "col-7 mt-2">
						<img src = "https://mignews.com/aimages/05_17/210517_211232_60495_2.jpg" width = "100%">
					</div>	
						
					<div class = "col-5 mt-2">
						<div class = "border-left border-secondary">
							<p class = "ml-4"> <b> Водитель: </b> <b class = "text-danger"> {{ $arrival->driver->FIO or 'Водиитель был удалён'}} </b> </p>
							<p class = "ml-4"> <b> Машина: </b> <b class = "text-danger"> {{ $arrival->car->model or 'Автомобиль был удалён'}} </b> </p>
							<p class = "ml-4"> <b> Полный маршрут: </b> <b class = "text-danger"> {{ $arrival->route->full_route or 'Маршрут был удалён'}} </b> </p>
							<p class = "ml-4"> <b> Дата отправки: </b> <b class = "text-danger"> {{ $arrival->date_of_departure }} </b> </p>
							<p class = "ml-4"> <b> Дата приезда: </b> <b class = "text-danger"> {{ $arrival->date_of_arrival or 'Не приехал' }} </b> </p>
						</div>

						<a href = "{{ route('arrivals.index') }}" class = "btn btn-secondary mt-4 form-control"> Назад </a>
					</div>
				</div>
			</div>
		</div>
	</div>
<style>
body{
	background-image: url(https://avatanplus.com/files/resources/original/5b88ffcc57cde1658f273648.jpg);
}
</style>
@endsection