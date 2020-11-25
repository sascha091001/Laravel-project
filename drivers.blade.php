  <!-- resources/views/tasks.blade.php -->
@extends('layouts.app')

@section('title')
	Список водителей
@endsection

@section('content')

  <!-- Bootstrap шаблон... -->
 <div class = "container">
  <!-- TODO: Текущие задачи -->

  <!-- Форма создания задачи... -->

  <!-- Текущие задачи -->
  @if (count($drivers) > 0)
    <div class = "container mt-5">
        <table class="table table-striped task-table">
			<thead class="thead-dark">
				<tr class = "text-center">
					<th >ФИО</th>
					<th>Дата рождения</th>
					<th>Опыт, лет</th>
					<th>Зарплата, руб</th>
				</tr>
			</thead>

          <tbody>
            @foreach ($drivers as $driver)
              <tr class = "text-center">
				<td> 
					<div> <a href = "{{route('show', [$driver->id])}}"> {{ $driver->FIO }} </a> </div>
				</td>
				
				<td>
					<p> <b> {{ $driver->birthday }} </b> </p>
				</td>
				
				<td>
					<p> <b> {{ $driver->experience }} </b> </p>
				</td>
				
				<td>
					<p> <b> {{ $driver->salary }} </b> </p>
				</td>
              </tr>
            @endforeach
          </tbody>
        </table>
  </div>	
  
  <style>
	td{
		border: 1px solid black;
		background-color: white;
	}
	
	th{
		border: 1px solid black;
	}
	
	body{
		background-image: url(https://img1.akspic.ru/image/109219-tekstura-belye-liniya-uzor-stena-1920x1080.jpg);
		<!--background-image: url(http://rebeccagordongroup.org/site/wp-content/uploads/2012/08/RGGWebBackground.png);-->
	}
  
  </style>
   @endif
@endsection