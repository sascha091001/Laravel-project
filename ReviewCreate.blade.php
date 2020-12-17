@extends('layouts.admin')

@section('title')
	Создание отзыва
@endsection

@section('content')
	<div class = "container" style = "min-height: 514px">
		@include('common.errors')

		<div class = "container">
			<div class="card text-white bg-dark mt-5" style = "width: 75%; margin: 0 auto">
				<div class="card-header">
					<h5 class = "text-center"> Создание отзыва </h5>
				</div>

				<div class="card-body">

					<form action="{{ route('reviews.store') }}" method="POST" class="form-horizontal mt-3">
						{{ csrf_field() }}

						<div class = "row">
							<div class = "col-6">
								<b> Водитель: </b> 
			
								<select class = "form-control" name = "driver_id">
									<option> Не выбрано </option>
									@foreach ($drivers as $driver)
										<option value = "{{$driver->id}}"> {{ $driver->FIO }} </option>
									@endforeach
								</select>
							</div>

							<div class = "col-6">
								<b> Пользователь: </b>
			
								<select class = "form-control" name = "user_id">
									<option> Не выбрано </option>
									@foreach ($users as $user)
										<option value = "{{$user->id}}"> {{ $user->name }} </option>
									@endforeach
								</select>
							</div>
						</div>

						<div class = "row mt-2">
							<div class = "col">
								<b> Текст: </b> 
								<textarea type = "text" name = "text" class = "form-control" style = "max-height: 100px; overflow-y: auto" placeholder="Ваш отзыв..."></textarea>
								<input type = "submit" name = "Sub" value = "Создать" class = "form-control mt-3 btn btn-primary" >
							</div>
						</div>
					</form>
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