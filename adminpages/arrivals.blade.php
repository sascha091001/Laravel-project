@extends('layouts.admin')

@section('title')
	Поездки
@endsection

@section('content')

  @if (count($arrivals) > 0)
    <div class = "container mt-5">
		<h2 class = "text-center mb-5"> Поездки </h2>
		@if (Session::has('message'))
			<div class = "alert alert-primary mt-3"> {{ Session::get('message') }} </div>
		@endif
		
        <table class="table table-striped task-table">
			<thead class="thead-dark">
				<tr class = "text-center">
					<th>Водитель</th>
					<th>Авто</th>
					<th>Дата отправки</th>
					<th>Дата прибытия</th>
					<th>Маршрут</th>
					<th>Действия</th>
				</tr>
			</thead>

          <tbody>
            @foreach ($arrivals as $arrival)
              <tr class = "text-center">				
				<td>
					<p> <b> {{ $arrival->driver->FIO }} </b> </p>
				</td>
				
				<td>
					<p> <b> {{ $arrival->car->model }} </b> </p>
				</td>
				
				<td>
					<p class = "text-success"> <b> {{ $arrival->date_of_departure }} </b> </p>
				</td>
				
				<td>
					<p class = "text-success"> <b> {{ $arrival->date_of_arrival or 'Не приехал' }} </b> </p>
				</td>
				
				<td>
					<p> <b> {{ $arrival->route->route_from }}-{{ $arrival->route->route_where }} </b> </p>
				</td>

				<td>
					<a href = "{{ route('arrivals.show', $arrival->id) }}" class = "btn btn-success"> См. </a>
					<a href = "{{ route('arrivals.edit', $arrival->id) }}" class = "btn btn-warning"> Обн. </a>
					<form action="{{route('arrivals.destroy', $arrival->id)}}" method="POST" style = "display: contents">
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
				{{ $arrivals->links('userpages.paginate') }}
			</div>
			
			<div class = "col-6">
				<a href = "{{ route('arrivals.create') }}" class = "btn btn-primary" style = "float: right"> Добавить поездку </a>
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