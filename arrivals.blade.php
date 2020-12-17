@extends('layouts.admin')

@section('title')
	Поездки
@endsection

@section('content')

<div class = "container mt-5" style = "min-height: 530px">
  	@if (count($arrivals) > 0)
		@if (Session::has('message'))
			<div class = "alert alert-primary mt-3"> {{ Session::get('message') }} </div>
		@endif

		<div class = "card mt-5 text-white bg-dark">
			<div class = "card-header dark">
				<h2 class = "text-center"> Поездки </h2>
			</div>
		</div>
		
		<div class = "table-responsive">
			<table class="table table-striped">
				<thead class="thead-light">
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
								@if ($arrival->driver)
									<p> <b> {{ $arrival->driver->FIO }} </b> </p>
								@else
									<p> <b> Водитель был удалён </b> </p>
								@endif
							</td>
							
							<td>
								@if ($arrival->car)
									<p> <b> {{ $arrival->car->model }} </b> </p>
								@else
									<p> <b> Авто было удалено </b> </p>
								@endif
							</td>
							
							<td>
								<p class = "text-danger"> <b> {{ $arrival->date_of_departure }} </b> </p>
							</td>
							
							<td>
								<p class = "text-danger"> <b> {{ $arrival->date_of_arrival or 'Не приехал' }} </b> </p>
							</td>
							
							<td>
								@if ($arrival->route)
									<p> <b> {{ $arrival->route->route_from }}-{{ $arrival->route->route_where }} </b> </p>
								@else
									<p> <b> Маршрут был удален </b> </p>
								@endif
							</td>

							<td>
								<a class = "btn p-0">
									<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-eye mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" onclick="location.href='{{route('arrivals.show', $arrival->id)}}'">
										<path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
										<path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
									</svg>
								</a>

								<a class = "btn p-0">
									<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-pencil-square mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" onclick="location.href='{{route('arrivals.edit', $arrival->id)}}'">
										<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
										<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
									</svg>
								</a>
								
								<form action = "{{ route('arrivals.destroy', $arrival->id) }}" method = "POST" style = "display: inline">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									
									<button type = "submit" class = "p-0">
										<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
											<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
										</svg>
									</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class = "row">
				<div class = "col-md-6 col-12">
					{{ $arrivals->links('userpages.paginate') }}
				</div>
				
				<div class = "MyBut col-md-6 col-12">
					<a href = "{{ route('arrivals.create') }}" class = "btn btn-primary form-control"> Добавить поездку </a>
				</div>
			</div>
		</div>
	@else
		<div class= "alert alert-danger"> На текущий момент поездок нет! </div>

		<a class = "btn btn-primary form-control" href = "{{ route('arrivals.create') }}"> Добавить поездку </a>
	@endif
</div>
	
<style>
	body{
		background-image: url(https://avatanplus.com/files/resources/original/5b88ffcc57cde1658f273648.jpg);
	}

	tr.text-center {
		background-color: rgb(255, 255, 255);
	}

	tr:nth-child(2n) {
		background-color: rgb(220, 220, 220);
	}

	form > button{
		background-color: Transparent;
		background-repeat:no-repeat;
		border: none;
		cursor:pointer;
		overflow: hidden;
	}
	
</style>

@endsection