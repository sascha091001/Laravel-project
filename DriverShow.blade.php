@extends('layouts.admin')

@section('title')
	{{$driver->FIO}}
@endsection

@section('content')

  <!-- Bootstrap шаблон... -->
	<div class = "container">
		<div class="card text-white bg-dark mt-5">
			<div class="card-header">
				<h5 class = "text-center"> Просмотр водителя </h5>
			</div>

			<div class="card-body">
				<div class = "row">
					<div class = "col-7 mt-2">
						<img src = "https://avatars.mds.yandex.net/get-zen_doc/1668923/pub_5d788b6fbc251400bfe2db6e_5d788bf0bc251400bfe2db70/scale_1200" width = "100%">
					</div>

					<div class = "col-5 mt-2">
						<div class = "border-left border-secondary">
							<p class = "ml-4"> <b> ФИО: </b> <b class = "text-danger"> {{ $driver->FIO }} </b> </p>
							<p class = "ml-4"> <b> Опыт работы: </b> <b class = "text-danger"> {{ $driver->experience }} год(а) </b> </p>
							<p class = "ml-4"> <b> Дата рождения: </b> <b class = "text-danger"> {{ $driver->birthday }} </b> </p>
							<p class = "ml-4"> <b> Зарплата: </b> <b class = "text-danger"> {{ $driver->salary }} рублей </b> </p>
						</div>
						
						<a href = "{{ route('drivers.index') }}" class = "btn btn-secondary mt-4 form-control"> Назад </a>
					</div>
				</div>
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
