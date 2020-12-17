@extends('layouts.admin')

@section('title')
	Отзыв
@endsection

@section('content')
	<div class = "container">
		<div class="card text-white bg-dark mt-5">
			<div class="card-header">
				<h5 class = "text-center"> Просмотр отзыва </h5>
			</div>

			<div class="card-body">
				<div class = "row">
					<div class = "col-7 mt-2">
						<img src = "https://5bucks.ru/wp-content/uploads/2019/12/otziv01.jpg" width = "100%">
					</div>
						
					<div class = "col-5 mt-2">
						<div class = "border-left border-secondary">
							<p class = "ml-4"> <b> Кто оставил: </b> <b class = "text-danger"> {{ $review->user->name or "Пользователь был удалён" }} </b> </p>
							<p class = "ml-4"> <b> О каком водителе: </b> <b class = "text-danger"> {{ $review->driver->FIO }} </b> </p>
							<p class = "ml-4"> <b> Текст: </b>
							<div class = "bg-light p-2 ml-4 mb-2" style = "min-height: 150px">
								<b class = "text-danger"> {{ $review->text }} </b> </p>
							</div>
							<p class = "ml-4"> <b> Дата создания: </b> <b class = "text-danger"> {{ $review->created_at }} </b> </p>
							<p class = "ml-4"> <b> Дата редактирования: </b> <b class = "text-danger"> {{ $review->updated_at }} </b> </p>
						</div>

						<a href = "{{ route('reviews.index') }}" class = "btn btn-secondary mt-4 form-control"> Назад </a>
					</div>
				</div>
			</div>
		</div>
	</div>
<style>
body{
	background-image: url(https://avatanplus.com/files/resources/original/5b88ffcc57cde1658f273648.jpg);
}
</style>
@endsection