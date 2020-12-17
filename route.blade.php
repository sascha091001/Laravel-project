<div class = "container" style = "min-height: 514px">
    <div class="card text-white bg-dark mt-5">
        <div class="card-header">
            <h5 class = "text-center"> Просмотр маршрута </h5>
        </div>

        <div class="card-body">
            <div class = "row">
                <div class = "col-7 mt-2">
                    <img src = "https://nationwideautotransportation.com/blog/wp-content/uploads/2019/01/auto-transportation-quote-1.jpg" width = "100%">
                </div>
                
                <div class = "col-5 mt-2">
                    <div class = "border-left border-secondary">
                        <p class = "ml-4"> <b> Откуда: </b> <b class = "text-danger"> {{ $route->route_from }} </b> </p>
                        <p class = "ml-4"> <b> Куда: </b> <b class = "text-danger"> {{ $route->route_where }} </b> </p>
                        <p class = "ml-4"> <b> Полный путь: </b> <b class = "text-danger"> {{ $route->full_route }} </b> </p>
                        <p class = "ml-4"> <b> Дистанция: </b> <b class = "text-danger"> {{ $route->distance }} км. </b> </p>
                    </div>

                    @if(preg_match('/^route/', explode("/", url()->current(), 4)[3]))
                        <a href = "{{ route('listRoutes') }}" class = "btn btn-secondary form-control mt-4"> Назад </a>
                    @else
                        <a href = "{{ route('routes.index') }}" class = "btn btn-secondary form-control mt-4"> Назад </a>
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