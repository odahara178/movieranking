@extends('movie.layouts.app')

@section('content')
{{-- タイトル --}}
<div class="container pt-5">
    <div class="row">
        <div class="">
            <h1 class="">{{$movies->title}}</h1>
            <h6>ジャンル:<a href='/ranking/{{$genre}}'>{{$genre}}</a></h6>
        </div>
    </div>
</div>

{{-- あらすじ&レビュー --}}
<div class="container mt-2">
    <div class="row">
        <div class="col-sm-6">
            
            <img class="img-thumbnail" src="https://image.tmdb.org/t/p/w500{{$movies->image_path}}">
            <div class="mt-4">
                @if ($is_favorite)
                    <form action="/favorite/delete/{{$movies->id}}" class="form" method="post">
                        @csrf
                        <button type="submit" class="btn btn-info" style="color:cornsilk;"><i class="fas fa-heart pr-1"></i>お気に入りを解除する</button>
                    </form>
                @else
                    <form action="/favorite/{{$movies->id}}" class="form" method="post">
                        @csrf
                        <button type="submit" class="btn btn-info" style="color:cornsilk;"><i class="fas fa-heart pr-1"></i>お気に入りに追加</button>
                    </form>
                @endif
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <h6 class="card-header">あらすじ</h6>
                <div class="card-body">
                    <p class="card-text h6">{{$movies->summary}}</p>
                </div>
            </div>

            <div class="card mt-2">
                <h6 class="card-header">{{$movies->title}}のレビュー</h6>
                <div class="card-body">
                    <h4 class="card-text text-center border-bottom">{{Config::get('evaluations')[$average]}}</h4>
                    
                    @isset($review)
                        <p class="h6">{{$review->content}}</p>
                    @endisset

                    @empty($review)
                        <p class="h6">この作品にはまだレビューがありません。</p>
                    @endempty
                    
                    <div class="text-center">
                        <a href="/review/{{$movies->id}}" class="btn btn-secondary">レビューをもっと見る・投稿する</a>
                    </div>              
                </div>
            </div>
        </div>
    </div>
</div>
    {{-- 動画表示 --}}
<div class="container mt-4">      
        <h5 class="p-1 text-center rounded bg-dark text-white">関連動画(YouTube)</h5>
    <div class="card-group">
        @foreach ($urls as $url)
            <div class="card">
                <iframe width="auto" height="auto" src="{{$url->url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                  
            </div>
        @endforeach
    </div>
</div>


        {{-- 関連作品表示 --}}
    <div class="container my-3">
        <h5 class="p-1 text-center rounded bg-dark text-white">関連作品</h5>
        <div class="row">
            
            @foreach ($related_movies_array as $i => $related_movies_id)
                <div class="col-md-3">
                    <div class="card">
                        <a href="{{$related_movies_id}}">
                        <img class="card-img-top" src="https://image.tmdb.org/t/p/w500{{$related_movies['results'][$i]['poster_path']}}" alt="Card image cap" style="height: 300px;">
                        </a>
                        <div class="card-footer">
                            <small class="text-muted">{{str_limit($related_movies['results'][$i]['title'], 20)}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        <div class="card-group">
            
        </div>

@endsection