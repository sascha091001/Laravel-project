<!DOCTYPE html>
<html lang="en">
  <head>
    <title> @yield('title') </title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <!-- CSS и JavaScript -->
  </head>

  <body>
    <div id="app">
        <nav class="navbar navbar-dark bg-dark">
		  <a class="navbar-brand" href="#">Навигационная панель</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="{{ url('/') }}"> Домашняя страница <span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href = "{{ route('list') }}"> К водителям </a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Страница Администратора</a>
			  </li>
			</ul>
		  </div>
		</nav>

        @yield('content')
    </div>
<script src="https://code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>