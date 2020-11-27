@extends('layouts.admin')

@section('title')
	Маршруты
@endsection

@section('content')

  @if (count($routes) > 0)
    <div class = "container mt-5">
		<h2 class = "text-center mb-5"> Маршруты </h2>
		
        <table class="table table-striped task-table">
			<thead class="thead-dark">
				<tr class = "text-center">
					<th>Откуда</th>
					<th>Куда</th>
					<th>Полный путь</th>
					<th>Расстояние, км.</th>
					<th>Действия</th>
				</tr>
			</thead>

          <tbody>
            @foreach ($routes as $route)
              <tr class = "text-center">				
				<td>
					<p> <b> {{ $route->route_from }} </b> </p>
				</td>
				
				<td>
					<p> <b> {{ $route->route_where }} </b> </p>
				</td>
				
				<td>
					<p> <b> {{ $route->full_route }} </b> </p>
				</td>
				
				<td>
					<p> <b> {{ $route->distance }} </b> </p>
				</td>

				<td>
					<a href = "{{ route('routes.show', $route->id) }}" class = "btn btn-success"> См. </a>
					<a href = "{{ route('routes.edit', $route->id) }}" class = "btn btn-warning"> Обн. </a>
					<form action="{{route('routes.destroy', $route->id)}}" method="POST" style = "display: contents">
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
				{{ $routes->links('userpages.paginate') }}
			</div>
			
			<div class = "col-6">
				<a href = "{{ route('routes.create') }}" class = "btn btn-primary" style = "float: right"> Добавить маршрутт </a>
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