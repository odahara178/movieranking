@extends('movie.layouts.app')

@section('content')
<div class="container">

    <div class="card-deck"> 
        <div class="card">
                <h5 class="card-title" style="color: #ADA142;"><i class="fas fa-crown"></i>1位</h5>
                <h5>{{str_limit($my_ranking->movies_1_title, 28)}}</h5>
            <a href="/movie/detail/{{$my_ranking->movies_1_id}}" class="href"><img class="card-img-top img-thumbnail" src="https://image.tmdb.org/t/p/w500{{$my_ranking->movies_1_image_path}}" style="height: 450px;"></a>
        </div>

        <div class="card">
            <h5 class="card-title" style="color: #9C9C9C;"><i class="fas fa-crown"></i>2位</h5>
            <h5>{{str_limit($my_ranking->movies_2_title, 28)}}</h5>
            <a href="/movie/detail/{{$my_ranking->movies_2_id}}" class="href"><img class="card-img-top img-thumbnail" src="https://image.tmdb.org/t/p/w500{{$my_ranking->movies_2_image_path}}" style="height: 450px;"></a>
        </div>

        <div class="card">
            <h5 class="card-title" style="color: #AB7C45;"><i class="fas fa-crown"></i>3位</h5>
            <h5>{{str_limit($my_ranking->movies_3_title, 28)}}</h5>
            <a href="/movie/detail/{{$my_ranking->movies_3_id}}" class="href"><img class="card-img-top img-thumbnail" src="https://image.tmdb.org/t/p/w500{{$my_ranking->movies_3_image_path}}" style="height: 450px;"></a>
        </div>
    </div>

    <div class="text-center mt-3 ">
        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal1">変更する</a>
    </div>



</div>


<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="label1">ランキング更新</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/mypage/rankingupdate" class="form" method="post">
                    @csrf
                    <h5 class="mt-1" style="color: #ADA142;"><i class="fas fa-crown"></i>1位</h5>
                        <select class="form-control" name="movie_id_1">
                            @foreach ($favorites as $favorite)
                                <option value="{{$favorite->movie_id}}">{{$favorite->title}}</option>
                            @endforeach
                        </select>
                        <h5 class="mt-1" style="color: #9C9C9C;"><i class="fas fa-crown"></i>2位</h5>
                        <select class="form-control" name="movie_id_2">
                            @foreach ($favorites as $favorite)
                                <option value="{{$favorite->movie_id}}">{{$favorite->title}}</option>
                            @endforeach
                        </select>
                        <h5 class="mt-1" style="color: #AB7C45;"><i class="fas fa-crown"></i>3位</h5>
                        <select class="form-control" name="movie_id_3">
                            @foreach ($favorites as $favorite)
                                <option value="{{$favorite->movie_id}}">{{$favorite->title}}</option>
                            @endforeach
                        </select>
                        <input class="btn btn-info text-white mt-2 btn-block" type="submit" value="変更する">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection