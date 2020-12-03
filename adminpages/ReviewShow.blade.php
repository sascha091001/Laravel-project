@extends('layouts.admin')

@section('title')
	Отзыв
@endsection

@section('content')
	<div class = "container">
		<div class = "row">
			<div class = "col-9 mt-4" style = "padding-left: 25%">
				<img src = "https://5bucks.ru/wp-content/uploads/2019/12/otziv01.jpg" width = "100%">
				
				<div class = "mt-4">
					<div class = "border-left border-secondary">
						<p class = "ml-4"> <b> Кто оставил: </b> <b class = "text-danger"> {{ $review->user->name }} </b> </p>
						<p class = "ml-4"> <b> О каком водителе: </b> <b class = "text-danger"> {{ $review->driver->FIO }} </b> </p>
						<p class = "ml-4"> <b> Текст: </b> <b class = "text-danger"> {{ $review->text }} </b> </p>
						<p class = "ml-4"> <b> Дата создания: </b> <b class = "text-danger"> {{ $review->created_at }} </b> </p>
						<p class = "ml-4"> <b> Дата редактирования: </b> <b class = "text-danger"> {{ $review->updated_at }} </b> </p>
					</div>
				</div>
			</div>
			
			<div class = "col-3">
				<a href = "{{ route('reviews.index') }}" class = "btn btn-secondary mt-4 form-control"> Назад </a>
			</div>
		</div>
	</div>
<style>
body{
	background-image: url(https://avatanplus.com/files/resources/original/5b88ffcc57cde1658f273648.jpg);
}
</style>
@endsection