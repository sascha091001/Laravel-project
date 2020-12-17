@extends('layouts.admin')

@section('title')
	Обновление водителя
@endsection

@section('content')
	<div class = "container" style = "min-height: 514px">
		@include('common.errors')

		<div class="card text-white bg-dark mt-5" style = "width: 75%; margin: 0 auto">
			<div class="card-header">
				<h5 class = "text-center"> Обновление водителя </h5>
			</div>

			<div class="card-body">
				<form action="{{ route('drivers.update', $driver->id) }}" method="POST" class="form-horizontal mt-3">
					{{ csrf_field() }}
					{{ method_field('PUT') }}

					<div class = "row">
						<div class = "col-6">
							<p class = "mb-2"> <b> ФИО: </b> <input type = "text" name = "FIO" value = "{{ $driver->FIO }}" class = "form-control"> </p>
							<p> <b> Дата рождения: </b> <input type = "date" value = "{{ $driver->birthday }}" name = "birthday" class = "form-control"> </p>
						</div>

						<div class = "col-6">
							<p class = "mb-2"> <b> Опыт: </b> <input type = "text" value = "{{ $driver->experience }}" name = "experience" class = "form-control"> </p>
							<p> <b> Зарплата: </b> <input type = "text" value = "{{ $driver->salary }}" name = "salary" class = "form-control"> </p>
						</div>
					
						<div class = "col-12">
							<input type = "submit" name = "Sub" value = "Обновить" class = "form-control btn btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<style>
		body{
			background-image: url(https://avatanplus.com/files/resources/original/5b88ffcc57cde1658f273648.jpg);
		}
	</style>

@endsection