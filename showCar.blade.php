@extends('layouts.app')

@section('title')
	{{ $car->model }}
@endsection

@section('content')
	@include('layouts.car')
@endsection