@extends('movie.layouts.app')

@section('content')
{{-- ランキング表示 --}}
<h2 class="pt-2 text-center rounded bg-dark text-white">MYランキング</h2>
<div class="container">

    <div class="row">
        <div class="col-md-5">
            <div class="card">
                    @if (isset($user->movies_1_title))
                        <div class="card-header">
                                <h3 class="" style="color: #ADA142;"><i class="fas fa-crown"></i>1位</h3>
                            <h5>{{str_limit($user->movies_1_title, 30)}}</h5>
                        </div>
                        <a href="movie/detail/{{$user->movies_1_id}}" class="href">
                            <img class="img-thumbnail card-img-bottom" src="https://image.tmdb.org/t/p/w500{{$user->movies_1_image_path}}" style="height: 500px;">
                        </a>
                    @else
                        <div class="card-header">
                                <h3 class="" style="color: #ADA142;"><i class="fas fa-crown"></i>1位</h3>
                            <h5>作品を選んでください</h5>
                        </div>
                        <a href="" class="href">
                            <img class="img-thumbnail card-img-bottom" src="/img/l_e_others_500.png" alt="MOVIE" style="height: 500px;">
                        </a>
                    @endif
                
            </div>
        </div>
        <div class="col-md-7">
            <div class="card-deck">
                <div class="card">
                    @if(isset($user->movies_2_title))
                        <div class="card-header">
                                <h3 class="" style="color: #9C9C9C;"><i class="fas fa-crown"></i>2位</h3>
                            <h6>{{str_limit($user->movies_2_title, 30)}}</h6>
                        </div>
                        <a href="movie/detail/{{$user->movies_2_id}}" class="href">
                            <img class="img-thumbnail card-img-bottom" src="https://image.tmdb.org/t/p/w500{{$user->movies_2_image_path}}" style="height: 350px;">
                        </a>
                    @else
                        <div class="card-header">
                                <h3 class="" style="color: #9C9C9C;"><i class="fas fa-crown"></i>2位</h3>
                            <h6>作品を選んでください</h6>
                        </div>
                        <a href="" class="href">
                            <img class="img-thumbnail card-img-bottom" src="/img/l_e_others_500.png" alt="MOVIE" style="height: 350px;">
                        </a>
                    @endif
                </div>
                <div class="card">
                    @if (isset($user->movies_3_title))
                        <div class="card-header">
                                <h3 class="" style="color: #AB7C45;"><i class="fas fa-crown"></i>3位</h3>
                            <h6>{{str_limit($user->movies_3_title, 30)}}</h6>
                        </div>
                        <a href="movie/detail/{{$user->movies_2_id}}" class="href">
                            <img class="img-thumbnail card-img-bottom" src="https://image.tmdb.org/t/p/w500{{$user->movies_3_image_path}}" style="height: 350px;">
                        </a>
                    @else
                        <div class="card-header">
                                <h3 class="" style="color: #AB7C45;"><i class="fas fa-crown"></i>3位</h3>
                            <h6>作品を選んでください</h6>
                        </div>
                        <a href="" class="href">
                            <img class="img-thumbnail card-img-bottom" src="/img/l_e_others_500.png" alt="MOVIE" style="height: 350px;">
                        </a>
                    @endif
                    
                </div>
            </div>
            <div class="container mt-3 d-flex justify-content-around">
                <a class="btn btn-secondary" href='mypage/myfavorite'>お気に入りページ</a>
                <a class="btn btn-secondary" href='/mypage/rankingupdate'>ランキング更新</a>
            </div>
        </div>
    </div>

    {{-- おすすめ表示 --}}
    <div class="container pt-3 px-3">
        <h5 class="p-1 text-center rounded bg-dark text-white">あなたへのおすすめ</h5>
        <div class="row">
            @for ($i = 0; $i < $count_recommended_movies; $i++)
                <div class="col-md-3 mt-2">
                    <div class="card">
                        <a href="/movie/detail/{{$recommended_movies[$i]->id}}">
                        <img class="card-img-top" src="https://image.tmdb.org/t/p/w500{{$recommended_movies[$i]->image_path}}" alt="Card image cap" style="height: 300px;">
                        </a>
                        <div class="card-footer">
                            <small class="text-muted">{{str_limit($recommended_movies[$i]->title, 27)}}</small>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

</div>

@endsection