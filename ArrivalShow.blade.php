@extends('layouts.admin')

@section('title')
	Просмотр поездки
@endsection

@section('content')
	<div class = "container">
		<div class = "row">
			<div class = "col-6 mt-4" style = "margin:0 auto">
				<img src = "https://mignews.com/aimages/05_17/210517_211232_60495_2.jpg" width = "100%">
				
				<div class = "mt-4">
					<div class = "border-left border-secondary">
						<p class = "ml-4"> <b> Водитель: </b> <b class = "text-danger"> {{ $arrival->driver->FIO }} </b> </p>
						<p class = "ml-4"> <b> Машина: </b> <b class = "text-danger"> {{ $arrival->car->model }} </b> </p>
						<p class = "ml-4"> <b> Полный маршрут: </b> <b class = "text-danger"> {{ $arrival->route->full_route }} </b> </p>
						<p class = "ml-4"> <b> Дата отправки: </b> <b class = "text-danger"> {{ $arrival->date_of_departure }} </b> </p>
						<p class = "ml-4"> <b> Дата приезда: </b> <b class = "text-danger"> {{ $arrival->date_of_arrival or 'Не приехал' }} </b> </p>
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