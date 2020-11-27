@extends('layouts.admin')

@section('title')
	{{ $car->model }}
@endsection

@section('content')
	<div class = "container">
		<div class = "row">
			<div class = "col-6 mt-4" style = "margin:0 auto">
				<img src = "{{ $car->img }}" width = "100%" class = "border border-primary">
				
				<div class = "mt-4">
					<div class = "border-left border-secondary">
						<p class = "ml-4"> <b> Номер: </b> <b class = "text-danger"> {{ $car->number }} </b> </p>
						<p class = "ml-4"> <b> Модель: </b> <b class = "text-danger"> {{ $car->model }} </b> </p>
						<p class = "ml-4"> <b> Состояние: </b> <b class = "text-danger"> {{ $car->condition }} </b> </p>
						<p class = "ml-4"> <b> Пробег: </b> <b class = "text-danger"> {{ $car->mileage }} км. </b> </p>
						<p class = "ml-4"> <b> Вес: </b> <b class = "text-danger"> {{ $car->tonnage }} т. </b> </p>
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