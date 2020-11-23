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
    <div class="panel panel-default">
      <div class="panel-heading">
        Водители
      </div>

      <div class="panel-body">
        <table class="table table-striped task-table table-bordered">
          <thead>
			<th>id</th>
            <th>ФИО</th>
			<th>Дата рождения</th>
			<th>Опыт, лет</th>
			<th>Зарплата, руб</th>
          </thead>

          <tbody>
            @foreach ($drivers as $driver)
              <tr>
                <td class="table-text">
					<div>{{ $driver->id }}</div>
                </td>
				
				<td> 
					<div> <a href = "{{route('show', [$driver->id])}}"> {{ $driver->FIO }} </a> </div>
				</td>
				
				<td>
					{{ $driver->birthday }}
				</td>
				
				<td>
					{{ $driver->experience }}
				</td>
				
				<td>
					{{ $driver->salary }}
				</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>	
   @endif
@endsection