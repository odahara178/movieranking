@extends('movie.layouts.app')

@section('content')

<div class="container">
    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ジャンル選択
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="btn dropdown-item" href='/ranking/0'>すべて</a>
            <a class="btn dropdown-item" href='/ranking/1'>アニメ</a>
            <a class="btn dropdown-item" href='/ranking/2'>アクション</a>
            <a class="btn dropdown-item" href='/ranking/3'>ミステリー</a>
        </div>
    </div>
</div>

<div class="title pt-2">
    <h5 class="p-1 text-center rounded bg-dark text-white">{{Config::get('genres')[$genre_id]}}のランキング</h5>
</div>

<div class="container mt-2">
    <div class="row">
        @foreach ($all_ranks as $all_rank)
            <div class="card col-3">
                <h4 class="card-title mt-2" style="color: #ADA142;"><i class="fas fa-crown"></i>{{$all_rank->rank}}位</h4>
                <a href="/movie/detail/{{$all_rank->movie_id}}">
                    <img class="card-img-top img-thumbnail" src="https://image.tmdb.org/t/p/w500{{$all_rank->image_path}}" alt="Card image cap" style="height: 300px; width: 280px;">
                </a>
                <div class="card-body">
                    <p class="card-text">{{$all_rank->title}}</p>
                    <p>{{Config::get('evaluations')[$all_rank->evaluation]}}{{$all_rank->evaluation}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection