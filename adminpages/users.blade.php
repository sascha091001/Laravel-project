@extends('layouts.admin')

@section('title')
	Пользователи
@endsection

@section('content')

  @if (count($users) > 0)
    <div class = "container mt-5">
		<h2 class = "text-center mb-5"> Пользователи</h2>
		
        <table class="table table-striped task-table">
			<thead class="thead-dark">
				<tr class = "text-center">
					<th>Имя</th>
					<th>Почта</th>
					<th>Тип</th>
					<th>Действия</th>
				</tr>
			</thead>

          <tbody>
            @foreach ($users as $user)
              <tr class = "text-center">				
				<td>
					<p> <b> {{ $user->name }} </b> </p>
				</td>
				
				<td>
					<p class = "text-success"> <b> {{ $user->email }} </b> </p>
				</td>
				
				<td>
					<p> <b> {{ $user->type }} </b> </p>
				</td>

				<td>
					<a href = "{{ route('users.show', $user->id) }}" class = "btn btn-success"> См. </a>
					<a href = "{{ route('users.edit', $user->id) }}" class = "btn btn-warning"> Обн. </a>
					<form action="{{route('users.destroy', $user->id)}}" method="POST" style = "display: contents">
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
				{{ $users->links('userpages.paginate') }}
			</div>
			
			<div class = "col-6">
				<a href = "{{ route('users.create') }}" class = "btn btn-primary" style = "float: right"> Добавить пользователя </a>
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