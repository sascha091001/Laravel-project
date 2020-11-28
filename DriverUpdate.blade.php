@extends('layouts.admin')

@section('title')
	Обновление водителя
@endsection

@section('content')
	<div class = "container">
		@include('common.errors')
		<h1 class = "mt-5 text-center mb-5"> Обновление водителя </h1>
		<form action="{{ route('drivers.update', $driver->id) }}" method="POST" class="form-horizontal mt-3">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<b> ФИО: </b> <input type = "text" name = "FIO" value = "{{ $driver->FIO }}" class = "form-control">
			<b> Дата рождения: </b> <input type = "date" value = "{{ $driver->birthday }}" name = "birthday" class = "form-control">
			<b> Опыт: </b> <input type = "text" value = "{{ $driver->experience }}" name = "experience" class = "form-control">
			<b> Зарплата: </b> <input type = "text" value = "{{ $driver->salary }}" name = "salary" class = "form-control">
			
			<input type = "submit" name = "Sub" value = "Обновить" class = "form-control mt-3 btn btn-primary" >
		</form>
	</div>	
@endsection