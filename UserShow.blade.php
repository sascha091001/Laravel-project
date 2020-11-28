@extends('layouts.admin')

@section('title')
	{{ $user->name }}
@endsection

@section('content')
	<div class = "container">
		<div class = "row">
			<div class = "col-12">
				<h1 class = "text-center"> Информация о пользователе </h1>
			</div>

			<div class = "col-6 mt-4" style = "margin:0 auto">
				<img src = "https://i.stack.imgur.com/V7ZYG.png?s=328&g=1" width = "100%">
				
				<div class = "mt-4">
					<div class = "border-left border-secondary">
						<p class = "ml-4"> <b> Имя: </b> <b class = "text-danger"> {{ $user->name }} </b> </p>
						<p class = "ml-4"> <b> Почта: </b> <b class = "text-danger"> {{ $user->email }} </b> </p>
						<p class = "ml-4"> <b> Роль: </b> <b class = "text-danger"> {{ $user->type }} </b> </p>
						@if($user->type == 'Водитель')
							<p class = "ml-4"> <b> Роль: </b> <b class = "text-danger"> {{ $user->type }} - {{ $user->driver->FIO }} </b> </p>
						@endif
						<p class = "ml-4"> <b> Создан: </b> <b class = "text-danger"> {{ $user->created_at }} </b> </p>
						<p class = "ml-4"> <b> Обновлён: </b> <b class = "text-danger"> {{ $user->updated_at }} </b> </p>
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