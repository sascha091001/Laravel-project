@extends('layouts.admin')

@section('title')
	{{ $route->route_from }}-{{	$route->route_where }}
@endsection

@section('content')
	@include('layouts.route')
@endsection