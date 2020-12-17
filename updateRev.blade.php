@extends('layouts.app')

@section('title')
	Обновление отзыва
@endsection

@section('content')
<div class = "contaiber" style = "min-height: 514px">
	<div class = "container">
		<div class="card text-white bg-dark mt-5" style = "width: 75%; margin: 0 auto">
			<div class="card-header">
				<h5 class = "text-center"> Редактирование отзыва </h5>
			</div>

			<div class="card-body">
				<div class = "row">
					<div class = "col-12 mt-4">
						<form action = "{{ route('review.update', $review->id) }}" method = "POST">
							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<div class = "form-group">
								<div class="col-12">
									<textarea type="text" name="text" class="form-control" placeholder="Оставьте Ваш отзыв" style="min-height: 150px">{{ $review->text }}</textarea>
								</div>
							
								<div class="col-12 mt-2">
									<button type="submit" class="form-control btn-primary">
										<i class="fa fa-plus"></i> Изменить отзыв
									</button>
								</div>
							</div>
						</form>
					</div>
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