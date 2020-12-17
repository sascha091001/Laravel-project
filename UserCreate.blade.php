@extends('layouts.admin')

@section('title')
	Добавление пользователя
@endsection

@section('content')
	<div class = "container" style = "min-height: 514px">
	@include('common.errors')

		<div class="card text-white bg-dark mt-5" style = "width: 75%; margin: 0 auto">
			<div class="card-header">
				<h5 class = "text-center"> Добавление пользователя </h5>
			</div>

			<div class="card-body">
				<form action="{{ route('users.store') }}" method="POST" class="form-horizontal mt-3">
				{{ csrf_field() }}	
				
					<div class = "row mt-3">
						<div class = "col-6">
							<p class = "mb-2"> <b> Логин </b> <input type = "text" value="{{ old('name') }}" name = "name" class = "form-control"> </p>
						</div>

						<div class = "col-6">
							<p class = "mb-2"> <b> Почта </b> <input type = "text" value="{{ old('email') }}" name = "email" class = "form-control" placeholder="example@wxample.com"> </p>
						</div>

						<div class = "col-12">
							<p class = "mb-2"> <b> Пароль </b> <input id="password" type="password" class="form-control" name="password" required placeholder = "Пароль"> </p>
							<p> <b> Проверка </b> <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder = "Проверка пароля"> </p>
						</div>
					</div>

					<div class="flexer">
						<div style = "width: 48%">
							<b> Тип </b>
							<select class = "form-control" name = "type" id = "Driver">
								@foreach ($arr as $elem)
									<option> {{ $elem }} </option>
								@endforeach
							</select>
						</div>

						<div class = "Foreign" style = "width: 48%">
							<b> Водитель </b>
							<select class = "form-control" name = "driver_id">
								<option> Не выбрано </option>
								@foreach ($drivers as $driver)
									<option value = "{{$driver->id}}"> {{ $driver->FIO }} </option>
								@endforeach
							</select>
						</div>
					</div>
					
					<input type = "submit" name = "Sub" value = "Добавить" class = "form-control btn btn-primary mt-3">
				</form>
			</div>
		</div>
	</div>	

	<style>
		.flexer{
			display: flex;
			justify-content: space-between;
		}

		body{
			background-image: url(https://avatanplus.com/files/resources/original/5b88ffcc57cde1658f273648.jpg);
		}
	</style>

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
					<b> Водитель </b>
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
@endsection