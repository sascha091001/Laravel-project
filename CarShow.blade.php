@extends('layouts.admin')

@section('title')
	{{ $car->model }}
@endsection

@section('content')
	@include('layouts.car')
@endsection