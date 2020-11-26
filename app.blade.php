<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="{{ url('/') }}"> Домашняя страница <span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href = "{{ route('listDrivers') }}"> К водителям </a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href=" {{ route('listRoutes') }} "> К маршрутам </a>
			  </li>
			   <li class="nav-item">
				<a class="nav-link" href=" {{ route('listCars') }}"> К авто </a>
			  </li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
					@if (Auth::guest())
                        <li><a class="nav-link" href="{{ url('/login') }}">Войти</a></li>
                        <li><a class="nav-link" href="{{ url('/register') }}">Зарегистрироваться</a></li>
                    @else
                        <div class="btn-group">
							<div class="btn-group dropleft" role="group">
								<button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  <span class="sr-only">Toggle Dropleft</span>
								</button>
								<div class="dropdown-menu">
									<a class= "dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
                                    </form>
								</div>
							</div>
							<button type="button" class="btn btn-secondary">
								{{ Auth::user()->name }}
							</button>
						</div>
                    @endif
                </ul>
		  </div>
		</nav>

        @yield('content')
    </div>


	<!-- Scripts -->

	<footer class="container-fluid bg-grey py-5 mt-5">
		<div class="container">
		   <div class="row">
			  <div class="col-md-6">
				 <div class="row">
					<div class="col-md-6 ">
					   <div class="logo-part">
							<h6> ООО АВАЛОН </h6>
					   </div>
					</div>
					<div class="col-md-6 px-4">
					   <h6> О компании </h6>
					   <p>Мы на первом месте по грузоперевозке в России.</p>
					   <a href="#" class="btn-footer"> Больше о нас </a><br>
					   <a href="#" class="btn-footer"> Контакты </a>
					</div>
				 </div>
			  </div>
			  <div class="col-md-6">
				 <div class="row">
					<div class="col-md-6 px-4">
					   <h6> Поддержать нас</h6>
					   <div class="row ">
						  <div class="col-md-6">
							 <ul>
								<li> <a href="#"> Home</a> </li>
								<li> <a href="#"> About</a> </li>
								<li> <a href="#"> Service</a> </li>
								<li> <a href="#"> Team</a> </li>
								<li> <a href="#"> Help</a> </li>
								<li> <a href="#"> Contact</a> </li>
							 </ul>
						  </div>
						  <div class="col-md-6 px-4">
							 <ul>
								<li> <a href="#"> Cab Faciliy</a> </li>
								<li> <a href="#"> Fax</a> </li>
								<li> <a href="#"> Terms</a> </li>
								<li> <a href="#"> Policy</a> </li>
								<li> <a href="#"> Refunds</a> </li>
								<li> <a href="#"> Paypal</a> </li>
							 </ul>
						  </div>
					   </div>
					</div>
					<div class="col-md-6 ">
					   <h6> Новости</h6>
					   <div class="social">
						  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
							<path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
						  </svg>
					   </div>
					   <form class="form-footer my-3">
						  <input type="text"  placeholder="Искать ..." name="search">
						  <input type="button" value="Go!" >
					   </form>
					   <p>Спасибо за то, что Вы с нами!</p>
					</div>
				 </div>
			  </div>
		   </div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<!--<script src="https://code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="/js/app.js"></script>-->
	
	<style>
     .bg-grey {
        background: #292929;
     }
     .logo-footer {
        margin-bottom: 40px;
     }
     footer {
            color: grey;
     }
     footer p, a {
}
footer h6 {
    margin-bottom: 40px;
    position: relative;
}
footer h6:after {
    position: absolute;
    content: "";
    background: grey;
    width: 12%;
    height: 1px;
    left: 0;
    bottom: -20px;
}
     .btn-footer {
                 color: grey;
              
                text-decoration: none;
                border: 1px solid;
                border-radius: 43px;
                padding: 7px 30px;
                line-height: 47px;
     }
     .btn-footer:hover {
                
                text-decoration: none;
               
     }
    .form-footer input[type="text"] {
        border: none;
    border-radius: 16px 0 0 16px;
    outline: none;
    padding-left: 10px;
    
}
::placeholder {
    padding-left: 10px;
    font-style: italic;
}
 .form-footer input[type="button"] {
    border: none;
    background:#232323;
        margin-left: -5px;
    color: #fff;
    outline: none;
    border-radius: 0 16px 16px 0;
    padding: 2px 12px;
}
     .social .fa {
    color: grey;
    font-size: 22px;
    padding: 10px 15px;
    background: #3c3c3c;
}
     footer ul li {
    list-style: none;
    display: block;
}
  footer ul  {
   padding-left: 0;
}
footer ul  li a{
  text-decoration: none;
  color: grey;
  text-decoration:none;
}
a:hover {
    text-decoration: none;
    
    
}
.logo-part {
    border-right: 1px solid grey;
    height: 100%;
    }
	</style>
	
</body>
</html>
