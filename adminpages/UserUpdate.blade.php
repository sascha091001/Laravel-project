@extends('layouts.admin')

@section('title')
	Обновление пользователя 
@endsection

@section('content')
	<div class = "container">
		@include('common.errors')
		@if (Session::has('message'))
			<div class = "alert alert-danger mt-3"> {{ Session::get('message') }} </div>
		@endif
		<h1 class = "mt-5 text-center mb-5"> Обновление пользователя  </h1>
		<form action="{{ route('users.update', $user->id) }}" method="POST" class="form-horizontal mt-3">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<b> Имя </b> <input type = "text" value = "{{ $user->name }}" name = "name" class = "form-control">
			<b> Почта </b> <input type = "text" value="{{ $user->email }}" name = "email" class = "form-control">
			<b> Тип </b>
			<select class = "form-control" name = "type" id = "Driver">
				<option> {{ $user->type }} </option>
					@if ($user->type == 'Водитель' and count($drivers) == 0)
						<option> Обычный </option>
					@endif
					@foreach ($arr as $elem)
						<option> {{ $elem }} </option>
					@endforeach
			</select>
			
			<div class = "Foreign">
				<p> <b> Водитель </b> (Если тип водитель, то указываем водителя) </p>
				
				<select class = "form-control" name = "driver_id">
					<option value = "{{ $user->driver_id or 'Не выбрано'}}"> {{ $user->driver->FIO or 'Не выбрано'}} </option>
				
					@foreach ($drivers as $driver)
						<option value = "{{ $driver->id }}"> {{ $driver->FIO }} </option>
					@endforeach
				</select>
			</div>
			
			<script>
				let Block = document.querySelector('.Foreign');

				function Drop(){
					let Driver_select = document.getElementById('Driver').value;
					if (Driver_select != 'Водитель'){
						Block.innerHTML = '';
					}
					else if (Driver_select == 'Водитель' && Block.firstChild == null){
						let newDiv = document.createElement('div');
						newDiv.className = 'Foreign';
						newDiv.innerHTML = `
						
							<p> <b> Водитель </b> (Если тип водитель, то указываем водителя) </p>
				
							<select class = "form-control" name = "driver_id">
								<option value = "{{ $user->driver_id or 'Не выбрано'}}"> {{ $user->driver->FIO or 'Не выбрано'}} </option>
							
								@foreach ($drivers as $driver)
									<option value = "{{ $driver->id }}"> {{ $driver->FIO }} </option>
								@endforeach
							</select>
						
						`
						console.log(newDiv);
						Block.append(newDiv);
						}
					}
				
				setInterval(Drop, 250);
			</script>
		
			<input type = "submit" name = "Sub" value = "Обновить" class = "form-control mt-3 btn btn-primary" >
		</form>
	</div>	
@endsection