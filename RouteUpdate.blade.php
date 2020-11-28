@extends('layouts.admin')

@section('title')
	Обновление маршрута
@endsection

@section('content')
	<div class = "container">
		@include('common.errors')
		<h1 class = "mt-5 text-center mb-5"> Обновление маршрута </h1>
		<form action="{{ route('routes.update', $route->id) }}" method="POST" class="form-horizontal mt-3">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<b> Откуда: </b> <input type = "text" value = "{{ $route->route_from }}" name = "route_from" class = "form-control">
			<b> Куда: </b> <input type = "text" value = "{{ $route->route_where }}" name = "route_where" class = "form-control">
			<b> Полный путь: </b> <input type = "text" value = "{{ $route->full_route }}" name = "full_route" class = "form-control">
			<b> Расстояние: </b> <input type = "text" value = "{{ $route->distance }}" name = "distance" class = "form-control">
			
			<input type = "submit" name = "Sub" value = "Обновление" class = "form-control mt-3 btn btn-primary" >
		</form>
	</div>	
@endsection