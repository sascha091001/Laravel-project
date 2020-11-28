@extends('layouts.app')

@section('title')
	{{$driver->FIO}}
@endsection

@section('content')

  <!-- Bootstrap шаблон... -->
	<div class = "container">
		@include('common.errors')
		<div class = "row">
			<div class = "col-12">
				<h1 class = "text-left"> Информация о водителе </h1>
			</div>
			
			<div class = "col-5 mt-4">
				<div class = "border-left border-secondary">
					<p class = "ml-4"> <b> ФИО: </b> <b class = "text-danger"> {{ $driver->FIO }} </b> </p>
					<p class = "ml-4"> <b> Опыт работы: </b> <b class = "text-danger"> {{ $driver->experience }} год(а) </b> </p>
					<p class = "ml-4"> <b> Дата рождения: </b> <b class = "text-danger"> {{ $driver->birthday }} </b> </p>
					
					@if(Auth::user() and Auth::user()->driver_id == $driver->id)
						<p class = "ml-4"> <b> Зарплата: </b> <b class = "text-danger"> {{ $driver->salary }} рублей </b> </p>
					@else
						<p class = "ml-4"> <b> Зарплата: </b> <b class = "text-warning"> Данная информация доступна только конкретному водителю! </b>
					@endif
				</div>
			</div>
			
			<div class = "col-7 mt-4">
				<img src = "https://avatars.mds.yandex.net/get-zen_doc/1668923/pub_5d788b6fbc251400bfe2db6e_5d788bf0bc251400bfe2db70/scale_1200" width = "100%" class = "border border-primary">
			</div>
		</div>
		
		@if(Auth::user() and Auth::user()->driver_id == $driver->id)
			<div class = "row mt-5">
				<div class = "col-12">
					@if (count($driver->arrivals) > 0)
						<h1 class = "text-left mb-4"> Недавние поездки </h1>
						
						<table class="table table-striped task-table">
							<thead class="thead-dark">
								<tr class = "text-center">
									<th>Маршрут</th>
									<th>Автомобиль</th>
									<th>Дата отправки</th>
									<th>Дата прибытия</th>
								</tr>
							</thead>

						  <tbody>
							@foreach ($driver->arrivals as $arrival)
							  <tr class = "text-center">
								<td>
									<div> <a href = "{{route('showRouteInfo', [$arrival->route->id])}}"> {{ $arrival->route->full_route }} </a> </div>
								</td>
								
								<td>
									<div> <a href = "{{route('showCarInfo', [$arrival->car->id])}}"> {{ $arrival->car->model }} </a> </div>
								</td>
								
								<td>
									<p> <b> {{ $arrival->date_of_departure}} </b> </p>
								</td>
								
								<td>
									<p> <b> {{ $arrival->date_of_arrival}} </b> </p>
								</td>
							  </tr>
							@endforeach
						  </tbody>
						</table>
					@endif	
				</div>
			</div>
		@endif
		
		<div class = "row mt-5">
			<div class = "col-12">
				<h1 class = "text-left"> Отзывы о водителе </h1>
				
				<div class = "row mt-4">
					@forelse ($reviews as $review)
						<div class = "col-6 mb-3">

						@if($driver->user and $review->user_id == $driver->user->id)
							<div class="alert alert-success" role="alert">
						@else
							<div class="alert alert-primary" role="alert">
						@endif
								Пользователь: <b> {{ $review->user->name }} </b> <br>
								Время: <b> {{ $review->created_at }} </b>
								<hr>
								<h5> {{ $review->text }} </h5>
								
								@if (Auth::user() and Auth::user()->id == $review->user_id)
									<hr>
									<div class = "row">
										<div class = "col-md-6 col-12">
											<form action = "{{ route('review.destroy', $review->id) }}" method = "POST" style = "display: contents">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
												<div class = "form-group">
													<button type="submit" class="form-control btn-danger" style = "width: 200px">
														<i class="fa fa-plus"></i> Удалить отзыв
													</button>
												</div>
											</form>
										</div>
										
										<div class = "col-md-6 col-12">
											<a href = "{{ route('review.edit', $review->id) }}" class = "btn btn-warning" style = "width: 200px"> Изменить отзыв </a>
										</div>
									</div>
								@endif
								
							</div>
						</div>
					@empty
						<p> Отзывов нет </p>
					@endforelse
				</div>
			</div>
			
			{{ $reviews->links('userpages.paginate') }}
		</div>
		
		<div class = "row">
			<div class = "col-12">
				<h1 class = "text-left"> Создание отзывов </h1>
			</div>
			
			@if (Auth::user())
				<div class = "col-12 mt-4">
					<form action = "{{ route('review.store') }}" method = "POST">
						{{ csrf_field() }}
						<div class = "form-group">
							<input type = "hidden" value = "{{ $driver->id }}" name = "driver_id">
							<input type = "hidden" value = "{{ Auth::user()->id }}" name = "user_id">
		
							<div class="col-12">
							  <input type="text" name="text" class="form-control" placeholder="Оставьте Ваш отзыв">
							</div>
								
							<div class="col-12 mt-2">
							  <button type="submit" class="form-control btn-primary">
								<i class="fa fa-plus"></i> Добавить отзыв
							  </button>
							</div>
						</div>
					</form>
				</div>
			@else
				<div class = "col-12 mt-4">
					<div class="alert alert-danger" role="alert">
						<h5 class = "text-center"> Необходима авторизация для того, чтобы оставить отзыв! </h5>
					</div>
				</div>
			@endif
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
