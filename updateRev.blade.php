@extends('layouts.app')

@section('title')
	Обновление
@endsection

@section('content')
<div class = "contaiber" style = "margin-bottom: 250px">
	<div class = "row">
		<div class = "col-12 mt-4">
			<form action = "{{ route('review.update', $review->id) }}" method = "POST">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class = "form-group">
					<div class="col-12">
						<input type="text" name="text" class="form-control" placeholder="Оставьте Ваш отзыв" value = "{{ $review->text }}">
					</div>
				
					<div class="col-12 mt-2">
						<button type="submit" class="form-control btn-primary">
							<i class="fa fa-plus"></i> Добавить отзыв
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection