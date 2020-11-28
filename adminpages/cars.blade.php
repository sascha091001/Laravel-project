@extends('layouts.admin')

@section('title')
	Автомобили
@endsection

@section('content')

  @if (count($cars) > 0)
    <div class = "container mt-5">
		<h2 class = "text-center mb-5"> Автомобили </h2>
		
        <table class="table table-striped task-table">
			<thead class="thead-dark">
				<tr class = "text-center">
					<th>Номер</th>
					<th>Модель</th>
					<th>Состояние</th>
					<th>Действия</th>
				</tr>
			</thead>

          <tbody>
            @foreach ($cars as $car)
              <tr class = "text-center">				
				<td>
					<p> <b> {{ $car->number }} </b> </p>
				</td>
				
				<td>
					<p> <b> {{ $car->model }} </b> </p>
				</td>
				
				<td>
					<p class = "text-success"> <b> {{ $car->condition }} </b> </p>
				</td>

				<td>
					<a href = "{{ route('cars.show', $car->id) }}" class = "btn btn-success"> См. </a>
					<a href = "{{ route('cars.edit', $car->id) }}" class = "btn btn-warning"> Обн. </a>
					<form action="{{route('cars.destroy', $car->id)}}" method="POST" style = "display: contents">
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
				{{ $cars->links('userpages.paginate') }}
			</div>
			
			<div class = "col-6">
				<a href = "{{ route('cars.create') }}" class = "btn btn-primary" style = "float: right"> Добавить автомобиль </a>
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