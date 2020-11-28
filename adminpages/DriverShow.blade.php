@extends('layouts.admin')

@section('title')
	{{$driver->FIO}}
@endsection

@section('content')

  <!-- Bootstrap шаблон... -->
	<div class = "container">
		<div class = "row">
			<div class = "col-12">
				<h1 class = "text-left"> Информация о водителе </h1>
			</div>
			
			<div class = "col-5 mt-4">
				<div class = "border-left border-secondary">
					<p class = "ml-4"> <b> ФИО: </b> <b class = "text-danger"> {{ $driver->FIO }} </b> </p>
					<p class = "ml-4"> <b> Опыт работы: </b> <b class = "text-danger"> {{ $driver->experience }} год(а) </b> </p>
					<p class = "ml-4"> <b> Дата рождения: </b> <b class = "text-danger"> {{ $driver->birthday }} </b> </p>
					<p class = "ml-4"> <b> Зарплата: </b> <b class = "text-danger"> {{ $driver->salary }} рублей </b> </p>
				</div>
			</div>
			
			<div class = "col-7 mt-4">
				<img src = "https://avatars.mds.yandex.net/get-zen_doc/1668923/pub_5d788b6fbc251400bfe2db6e_5d788bf0bc251400bfe2db70/scale_1200" width = "100%" class = "border border-primary">
			</div>
		</div>
	</div>

<style>
body{
	background-image: url(https://avatanplus.com/files/resources/original/5b88ffcc57cde1658f273648.jpg);
}

td{
	border: 1px solid black;
	background-color: white;
}

th{
	border: 1px solid black;
}
</style>
	
@endsection
