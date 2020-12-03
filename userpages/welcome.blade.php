  <!-- resources/views/tasks.blade.php -->
@extends('layouts.app')

@section('title')
	Гостевая страница
@endsection

@section('content')

<div class = "container">
	@if (Session::has('message'))
		<div class = "alert alert-danger mt-3"> {{ Session::get('message') }} </div>
	@endif
	<div class = "row">
		<div class = "col-12">
			<h1 class = "text-center"> Автотранспортная компания <span class = "text-danger"> "Авалон" </span> </h1>
		</div>
	</div>
	
	<div class = "row">
		<div class = "col-md-7 mt-3">
			<p> <img src = "https://www.riakchr.ru/upload/iblock/d41/d41d951ab6b68a4dbfe0f875057504ca.jpg" width = "100%"> </p>
		</div>
		
		<div class = "col-md-5 mt-3">
			<div class = "row">
				<div class = "col-md-12 col-6 mb-5">
					<p class = "text-justify" style = "font-family:COURIER"> Добрый день, Вас приветствует транспортная компания "Авалон", ниже Вы можете перейти по ссылкам, чтобы ознакомиться с нашими работниками и маршрутами. </p>
				</div>
			
				<div class = "col-md-12 col-6">
					<blockquote class="blockquote  border-left border-secondary">
					  <p class="mb-0 text-right">Нет смысла искать <span class = "text-danger"> лучшую автотранспортную компанию </span>, когда есть МЫ!</p>
					  <footer class="blockquote-footer text-right mt-4"> Автотранспортная компания <cite title="Название источника"> ООО АВАЛОН </cite></footer>
					</blockquote>
				</div>
			</div>
		</div>
	</div>
	
	<div class = "row mt-3">
		<div class = "col-12"> 
			<h2> <span class = "text-danger KarollaC"> БУДУЩЕЕ </span> БУДЕТ ЗА НАМИ </h2>
		</div>
	</div>	
		
	<div class = "row">
		<div class = "col-md-4 col-12 mb-4">
			<div class = "bg-danger">
				<h5 class = "text-white text-center mb-4 pt-4" style = "font-family:COURIER"> Особая забота о наших клиентах </h5>
				<img src = "https://avatars.mds.yandex.net/get-zen_doc/118284/pub_5c33360262248c00aa87388f_5c333939cffc6400aaecf4e1/scale_1200"; width = "100%">
			</div>
		</div>
		
		<div class = "col-md-4 col-12 mb-4">
			<div class = "bg-danger">
				<h5 class = "text-white text-center mb-4 pt-4" style = "font-family:COURIER"> Качественное выполнение работы </h5>
				<img src = "https://solreg.ru/upload/iblock/bf3/bf3c83422ce7b776386dd75e1f63df05.jpg" width = "100%">
			</div>
		</div>
		
		<div class = "col-md-4 col-12 mb-4">
			<div class = "bg-danger">
				<h5 class = "text-white text-center mb-4 pt-4" style = "font-family:COURIER"> Гарантия за здоровье наших клиентов </h5>
				<img src = "https://solreg.ru/upload/iblock/0bf/0bf91bc3184e7dc5ea5d0a0c1b1dbe78.jpg" width = "100%">
			</div>
		</div>
	</div>
</div>
<style>
	body{
		background-image: url(https://avatanplus.com/files/resources/original/5b88ffcc57cde1658f273648.jpg);
		<!--background-image: url(http://stportal.ru/wp-content/uploads/2019/03/TECBG.jpg);-->
	}
</style>
 
@endsection
