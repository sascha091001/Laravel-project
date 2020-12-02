@extends('layouts.admin')

@section('title')
	Отзывы
@endsection

@section('content')

  @if (count($reviews) > 0)
    <div class = "container mt-5">
		<h2 class = "text-center mb-5"> Отзывы </h2>
		@if (Session::has('message'))
			<div class = "alert alert-primary mt-3"> {{ Session::get('message') }} </div>
		@endif
		
        <table class="table table-striped task-table">
			<thead class="thead-dark">
				<tr class = "text-center">
					<th>Кем создан</th>
					<th>Текст</th>
					<th>Водитель</th>
					<th>Действия</th>
				</tr>
			</thead>

          <tbody>
            @foreach ($reviews as $review)
              <tr class = "text-center">				
				<td>
					<p> <b> {{ $review->user->name }} </b> </p>
				</td>
				
				<td>
					<p class = "text-success"> <b> {{ $review->text }} </b> </p>
				</td>
				
				<td>
					<p> <b> {{ $review->driver->FIO }} </b> </p>
				</td>

				<td>
					<a href = "{{ route('reviews.show', $review->id) }}" class = "btn btn-success"> См. </a>
					<a href = "{{ route('reviews.edit', $review->id) }}" class = "btn btn-warning"> Обн. </a>
					<form action="{{route('reviews.destroy', $review->id)}}" method="POST" style = "display: contents">
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
				{{ $reviews->links('userpages.paginate') }}
			</div>
			
			<div class = "col-6">
				<a href = "{{ route('reviews.create') }}" class = "btn btn-primary" style = "float: right"> Создать отзыв </a>
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