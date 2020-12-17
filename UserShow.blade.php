@extends('layouts.admin')

@section('title')
	{{ $user->name }}
@endsection

@section('content')
	<div class = "container">
		<div class="card text-white bg-dark mt-5">
			<div class="card-header">
				<h5 class = "text-center"> Просмотр профиля пользователя </h5>
			</div>

			<div class="card-body">
				<div class = "row">
					<div class = "col-7 mt-2" style = "padding-left: 15%">
						<img src = "https://i.stack.imgur.com/V7ZYG.png?s=328&g=1" width = "100%">
					</div>
						
					<div class = "col-5 mt-2">
						<div class = "border-left border-secondary">
							<p class = "ml-4"> <b> Имя: </b> <b class = "text-danger"> {{ $user->name }} </b> </p>
							<p class = "ml-4"> <b> Почта: </b> <b class = "text-danger"> {{ $user->email }} </b> </p>
							@if($user->type == 'Водитель')
								<p class = "ml-4"> <b> Роль: </b> <b class = "text-danger"> {{ $user->type }} </b> </p>
								<p class = "ml-4"> <b> Профиль: </b> <b> <a class = "text-danger" href = "{{ route('drivers.show', $user->driver) }}"> {{ $user->driver->FIO or 'Пока не определён' }} </a> </b> </p>
							@else
								<p class = "ml-4"> <b> Роль: </b> <b class = "text-danger"> {{ $user->type }} </b> </p>
							@endif
							<p class = "ml-4"> <b> Создан: </b> <b class = "text-danger"> {{ $user->created_at }} </b> </p>
							<p class = "ml-4"> <b> Обновлён: </b> <b class = "text-danger"> {{ $user->updated_at }} </b> </p>
						</div>
						
						<a href = "{{ route('users.index') }}" class = "btn btn-secondary mt-4 form-control"> Назад </a>
					</div>
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