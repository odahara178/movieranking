@extends('movie.layouts.app')

@section('content')
<h1>お気に入りページ</h1>
<div class="container mt-1">
    <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            全ジャンル
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <button class="dropdown-item" type="button">アクション</button>
            <button class="dropdown-item" type="button">ミステリー</button>
            <button class="dropdown-item" type="button">ホラー</button>
        </div>
    </div>
</div>

<div class="container mt-2">
        <div class="card-group">

        @foreach ($favorites as $favorite)
            <div class=" border-bottom py-3">
                <div class="card">
                    <h5 class="card-title text-center pt-1" style="color: #646766;">{{$favorite->title}}</h5>
                    <a href="movie/detail/{{$favorite->movie_id}}">
                    <img class="img-thumbnail" src="https://image.tmdb.org/t/p/w500{{$favorite->image_path}}" alt="Card image cap" style="height: 200px; width: 300px;">
                    </a>
                </div>
            </div>
        @endforeach

    </div>
</div>




@endsection