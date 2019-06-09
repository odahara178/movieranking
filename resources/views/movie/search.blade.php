@extends('movie.layouts.app')

@section('content')
<h1>検索結果ページ</h1>
<div class="container">

    <hr>

    @foreach ($movies as $movie)
    <div class="search_result border-bottom py-3">
        <div class="media">           
            <a class="media-left mr-3" href="/movie/detail/{{$movie->id}}">
                <img class="img-thumbnail card-img-top mx-auto d-block" src="https://image.tmdb.org/t/p/w500{{$movie->image_path}}" alt="Card image cap" style="height: 350px; width: 300px;">
            </a>           
            <div class="media-body">
                <h4 class="media-heading d-inline border-left border-warning">{{$movie->title}}</h4>
                <h6 class="d-inline float-right">ジャンル:<a href='#'>{{Config::get('genres')[$movie->genre]}}</a></h6>
                <h5 class="mt-2">あらすじ</h5>
                <hr>
                <h6>{{$movie->summary}}</h6>
                <div class="float-right">
                    <a href="/movie/detail/{{$movie->id}}" class="btn btn-primary ">作品情報を見る</a>
                </div>
            </div>
        </div>
    </div> 
    @endforeach
    <div class="mt-2">
        {{ $movies->appends(['keyword' => $keyword])->links() }}
    </div>
</div>









@endsection