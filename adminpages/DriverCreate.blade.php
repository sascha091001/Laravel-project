@extends('layouts.admin')

@section('title')
	Добавление водителя
@endsection

@section('content')
	<div class = "container">
		<h1 class = "mt-5 text-center mb-5"> Добавление водителя </h1>
		<form action="{{ route('drivers.store') }}" method="POST" class="form-horizontal mt-3">
		  {{ csrf_field() }}
			<b> ФИО: </b> <input type = "text" name = "FIO" class = "form-control">
			<b> Дата рождения: </b> <input type = "date" name = "birthday" class = "form-control">
			<b> Опыт: </b> <input type = "text" name = "experience" class = "form-control">
			<b> Зарплата: </b> <input type = "text" name = "salary" class = "form-control">
			
			<input type = "submit" name = "Sub" value = "Добавить" class = "form-control mt-3 btn btn-primary" >
		</form>
	</div>	
@endsection