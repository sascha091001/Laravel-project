@extends('layouts.app')

@section('title')
	Список водителей
@endsection

@section('content')

 	<div class = "container mt-5" style = "min-height: 514px">
		@if (count($drivers) > 0)
			<div class = "card mt-5 text-white bg-dark">
				<div class = "card-header dark">
					<h2 class = "text-center"> Водители </h2>
				</div>
			</div>
			
			<div class = "table-responsive">
				<table class="table table-striped">
					<thead class="thead-light">
						<tr class = "text-center">
							<th>ФИО</th>
							<th>Опыт, лет</th>
							<th>Отзывы</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($drivers as $driver)
							<tr class = "text-center">
								<td> 
									<h6> <a href = "{{route('showDriverInfo', [$driver->id])}}"> {{ $driver->FIO }} </a> </h6>
								</td>
												
								<td>
									<p> <b> {{ $driver->experience }} </b> </p>
								</td>
								
								<td>
									<span class="badge badge-primary badge-pill"> {{ count($driver->reviews) }} </span>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		
			{{ $drivers->links('userpages.paginate') }}
		@else
			<div class= "alert alert-danger"> На текущий момент водителей нет! </div>
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
	
	</style>
@endsection