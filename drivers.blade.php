@extends('layouts.admin')

@section('title')
	Водители
@endsection

@section('content')

  @if (count($drivers) > 0)
    <div class = "container mt-5">
		<h2 class = "text-center mb-5"> Водители </h2>
		
        <table class="table table-striped task-table">
			<thead class="thead-dark">
				<tr class = "text-center">
					<th>ФИО</th>
					<th>Дата рождения</th>
					<th>Опыт, лет</th>
					<th>Зарплата, руб.</th>
					<th>Действия</th>
				</tr>
			</thead>

          <tbody>
            @foreach ($drivers as $driver)
              <tr class = "text-center">				
				<td>
					<p> <b> {{ $driver->FIO }} </b> </p>
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

				<td>
					<a href = "{{ route('drivers.show', $driver->id) }}" class = "btn btn-success"> См. </a>
					<a href = "{{ route('drivers.edit', $driver->id) }}" class = "btn btn-warning"> Обн. </a>
					<form action="{{route('drivers.destroy', $driver->id)}}" method="POST" style = "display: contents">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}

						<button type="submit" class="btn btn-danger">
							<i class="fa fa-search"></i>Удал.
						</button>
					</form>
				</td>
              </tr>
            @endforeach
          </tbody>
        </table>
	@endif
	
	<div class = "row">
			<div class = "col-6">
				{{ $drivers->links('userpages.paginate') }}
			</div>
			
			<div class = "col-6">
				<a href = "{{ route('drivers.create') }}" class = "btn btn-primary" style = "float: right"> Добавить водителя </a>
			</div>
		</div>
	</div>
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

@endsection