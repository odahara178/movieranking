@extends('movie.layouts.app')

@section('content')
<h1>検索結果ページ</h1>
<div class="container">

    <hr>

    @foreach ($movies as $movie)
    <div class="search_result border-bottom py-3">
        <div class="media">           
            <a class="media-left mr-3" href="/detail/{{$movie->id}}">
                <img class="img-thumbnail card-img-top mx-auto d-block" src="{{$movie->image_path}}" alt="Card image cap" style="height: 350px; width: 280px;">
            </a>           
            <div class="media-body">
                <h4 class="media-heading d-inline border-left border-warning">{{$movie->title}}</h4>
                <h6 class="d-inline float-right">ジャンル:<a href='#'>{{Config::get('genres')[$movie->genre]}}</a></h6>
                <h5 class="mt-2">あらすじ</h5>
                <hr>
                <h6>{{$movie->summary}}</h6>
                <div class="float-right">
                    <a href="/detail/{{$movie->id}}" class="btn btn-primary ">作品情報を見る</a>
                </div>
            </div>
        </div>
    </div> 
    @endforeach

    <div class="container mx-auto pt-2" style="width: 200px;">
        <nav aria-label="Page navigation example" class="text-center">
            <ul class="pagination">
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
                </li>
            </ul>
        </nav>
    </div>




</div>









@endsection