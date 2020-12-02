@extends('layouts.app')

@section('title')
	{{ $route->route_from }}-{{	$route->route_where }}
@endsection

@section('content')
	<div class = "container">
		<div class = "row">
			<div class = "col-3">
			</div>
		
			<div class = "col-6 mt-4" style = "margin:0 auto">
				<img src = "https://nationwideautotransportation.com/blog/wp-content/uploads/2019/01/auto-transportation-quote-1.jpg" width = "100%" class = "border border-primary">
				
				<div class = "mt-4">
					<div class = "border-left border-secondary">
						<p class = "ml-4"> <b> Откуда: </b> <b class = "text-danger"> {{ $route->route_from }} </b> </p>
						<p class = "ml-4"> <b> Куда: </b> <b class = "text-danger"> {{ $route->route_where }} </b> </p>
						<p class = "ml-4"> <b> Полный путь: </b> <b class = "text-danger"> {{ $route->full_route }} </b> </p>
						<p class = "ml-4"> <b> Дистанция: </b> <b class = "text-danger"> {{ $route->distance }} км. </b> </p>
					</div>
				</div>
			</div>
			
			<div class = "col-3">
				<a href = "{{ route('listRoutes') }}" class = "btn btn-secondary form-control mt-4"> Назад </a>
			</div>
		</div>
	</div>
<style>
body{
	background-image: url(https://avatanplus.com/files/resources/original/5b88ffcc57cde1658f273648.jpg);
}
</style>
@endsection