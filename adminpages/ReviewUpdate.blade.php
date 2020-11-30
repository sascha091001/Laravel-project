@extends('layouts.admin')

@section('title')
	Редактирование отзыва
@endsection

@section('content')
	<div class = "container">
		@include('common.errors')
		<h1 class = "mt-5 text-center mb-5"> Редактирование отзыва </h1>
		<form action="{{ route('reviews.update', $review->id) }}" method="POST" class="form-horizontal mt-3">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<b> Водитель: </b> 
			
			<select class = "form-control" name = "driver_id">
				<option value = "{{ $review->driver_id }}"> {{ $review->driver->FIO }} </option>
				@foreach ($drivers as $driver)
					<option value = "{{$driver->id}}"> {{ $driver->FIO }} </option>
				@endforeach
			</select>
			
			<b> Пользователь: </b>
			
			<select class = "form-control" name = "user_id">
				<option value = "{{ $review->user_id }}"> {{ $review->user->name }} </option>
				@foreach ($users as $user)
					<option value = "{{$user->id}}"> {{ $user->name }} </option>
				@endforeach
			</select>
			
			<b> Текст: </b> <input type = "text" name = "text" value = "{{ $review->text }}" class = "form-control">
			
			<input type = "submit" name = "Sub" value = "Обновить" class = "form-control mt-3 btn btn-primary" >
		</form>
	</div>	
@endsection