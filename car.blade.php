<div class = "container" style = "min-height: 514px">
    <div class="card text-white bg-dark mt-5">
        <div class="card-header">
            <h5 class = "text-center"> Просмотр автомобиля </h5>
        </div>

        <div class="card-body">
            <div class = "row">
                <div class = "col-7 mt-2">
                    <img src = "{{ $car->img }}" width = "100%">
                </div>
                   
                <div class = "col-5 mt-2">
                    <div class = "border-left border-secondary">
                        <p class = "ml-4"> <b> Номер: </b> <b class = "text-danger"> {{ $car->number }} </b> </p>
                        <p class = "ml-4"> <b> Модель: </b> <b class = "text-danger"> {{ $car->model }} </b> </p>
                        <p class = "ml-4"> <b> Состояние: </b> <b class = "text-danger"> {{ $car->condition }} </b> </p>
                        <p class = "ml-4"> <b> Пробег: </b> <b class = "text-danger"> {{ $car->mileage }} км. </b> </p>
                        <p class = "ml-4"> <b> Вес: </b> <b class = "text-danger"> {{ $car->tonnage }} т. </b> </p>
                    </div>
                   
                    @if(preg_match('/^car/', explode("/", url()->current(), 4)[3]))
                        <a href = "{{ route('listCars') }}" class = "btn btn-secondary form-control mt-4"> Назад </a>
                    @else
                        <a href = "{{ route('cars.index') }}" class = "btn btn-secondary form-control mt-4"> Назад </a>
                    @endif
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