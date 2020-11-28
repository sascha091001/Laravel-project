@extends('layouts.admin')

@section('title')
	Добавление маршрута
@endsection

@section('content')
	<div class = "container">
		@include('common.errors')
		<h1 class = "mt-5 text-center mb-5"> Добавление маршрута </h1>
		<form action="{{ route('routes.store') }}" method="POST" class="form-horizontal mt-3">
		  {{ csrf_field() }}
			<b> Откуда: </b> <input type = "text" name = "route_from" class = "form-control">
			<b> Куда: </b> <input type = "text" name = "route_where" class = "form-control">
			<b> Полный путь: </b> <input type = "text" name = "full_route" class = "form-control">
			<b> Расстояние: </b> <input type = "text" name = "distance" class = "form-control">
			
			<input type = "submit" name = "Sub" value = "Добавить" class = "form-control mt-3 btn btn-primary" >
		</form>
	</div>	
@endsection