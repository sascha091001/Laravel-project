@extends('layouts.admin')

@section('title')
	Обновление пользователя 
@endsection

@section('content')
	<div class = "container" style = "min-height: 514px">
		@include('common.errors')
		@if (Session::has('message'))
			<div class = "alert alert-danger mt-3"> {{ Session::get('message') }} </div>
		@endif

		<div class="card text-white bg-dark mt-5" style = "width: 75%; margin: 0 auto">
			<div class="card-header">
				<h5 class = "text-center"> Добавление пользователя </h5>
			</div>

			<div class="card-body">
				<form action="{{ route('users.update', $user->id) }}" method="POST" class="form-horizontal mt-3">
					{{ csrf_field() }}
					{{ method_field('PUT') }}

					<div class = "row mt-3">
						<div class = "col-6">
							<p class = "mb-2"> <b> Логин </b> <input type = "text" value = "{{ $user->name }}" name = "name" class = "form-control"> </p>
						</div>

						<div class = "col-6">
							<p class = "mb-2"> <b> Почта </b> <input type = "text" value="{{ $user->email }}" name = "email" class = "form-control" placeholder="example@wxample.com"> </p>
						</div>
					</div>

					<div class="flexer">
						<div style = "width: 48%">
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
						</div>

						<div class = "Foreign" style = "width: 48%">
							<b> Водитель </b>
							<select class = "form-control" name = "driver_id">
								<option value = "{{ $user->driver_id or 'Не выбрано'}}"> {{ $user->driver->FIO or 'Не выбрано'}} </option>
							
								@foreach ($drivers as $driver)
									<option value = "{{ $driver->id }}"> {{ $driver->FIO }} </option>
								@endforeach
							</select>
						</div>
					</div>
					
					<input type = "submit" name = "Sub" value = "Обновить" class = "form-control mt-3 btn btn-primary" >
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