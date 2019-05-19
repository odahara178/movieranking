@extends('movie.layouts.app')

@section('content')
<h1>映画詳細</h1>
{{-- タイトル --}}
<div class="container pt-5">
    <div class="row">
        <div class="col-sm-8">
            <h1 class="">{{$movies->title}}</h1>
            <h6>ジャンル:<a href=''>{{$genre}}</a></h6>
        </div>
        
        <div class="col-sm-4">
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
</div>

{{-- あらすじ&レビュー --}}
<div class="container mt-2">
    <div class="row">
        <div class="col-sm-4">
            
            <img class="img-thumbnail" src={{$movies->image_path}}>
            
        </div>
        <div class="col-sm-8">
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
    <div class="container mt-4">
        <h5 class="p-1 text-center rounded bg-dark text-white">関連作品</h5>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card-group" alt="First slide">
                        <div class="card">
                            <img class="card-img-top" src="/img/01.jpg" alt="Card image cap" style="height: 250px;">
                            <div class="card-footer">
                                <small class="text-muted">ヴェノム</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="/img/02.jpg" alt="Card image cap" style="height: 250px;">
                            <div class="card-footer">
                                <small class="text-muted">セブン</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="/img/03.jpg" alt="Card image cap" style="height: 250px;">
                            <div class="card-footer">
                                <small class="text-muted">ユージュアル・サスペクツ</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="/img/01.jpg" alt="Card image cap" style="height: 250px;">
                            <div class="card-footer">
                                <small class="text-muted">ヴェノム</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="/img/01.jpg" alt="Card image cap" style="height: 250px;">
                            <div class="card-footer">
                                <small class="text-muted">ヴェノム</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="card-group" alt="Second slide">
                        <div class="card">
                            <img class="card-img-top" src="/img/01.jpg" alt="Card image cap" style="height: 250px;">
                            <div class="card-footer">
                                <small class="text-muted">ヴェノム</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="/img/02.jpg" alt="Card image cap" style="height: 250px;">
                            <div class="card-footer">
                                <small class="text-muted">セブン</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="/img/03.jpg" alt="Card image cap" style="height: 250px;">
                            <div class="card-footer">
                                <small class="text-muted">ユージュアル・サスペクツ</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="/img/03.jpg" alt="Card image cap" style="height: 250px;">
                            <div class="card-footer">
                                <small class="text-muted">ユージュアル・サスペクツ</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="/img/03.jpg" alt="Card image cap" style="height: 250px;">
                            <div class="card-footer">
                                <small class="text-muted">ユージュアル・サスペクツ</small>
                            </div>
                        </div>
                    </div>
                </div>       
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    
</div>
@endsection