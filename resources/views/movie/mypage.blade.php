@extends('movie.layouts.app')

@section('content')
<h1>マイページ</h1>
{{-- ランキング表示 --}}
    <h2 class="pt-2">MYランキング</h2>
    <div class="container">
        <div class="row">

            <div class="col-md-5">
                <h3 class="" style="color: #ADA142;"><i class="fas fa-crown"></i>1位:{{$user->movies_1_title}}</h3>
                <a href="/movie/detail/{id}" class="href"><img class="img-thumbnail" src={{$user->movies_1_image_path}} style="height: 500px; width: 400px;"></a>
            </div>

            <div class="col-md-7">
                {{-- ページ遷移ボタン --}}
                <div class="container my-3 d-flex justify-content-around">
                    <a class="btn btn-secondary" href='mypage/myfavorite'>お気に入りページ</a>
                    <a class="btn btn-secondary" href='/mypage/rankingupdate'>ランキング更新</a>
                </div>
                <div class="card-deck">
                    <div class="card">
                        <h4 class="card-title" style="color: #9C9C9C;"><i class="fas fa-crown"></i>2位:{{str_limit($user->movies_2_title, 14)}}</h4>
                        <a href="/detail" class="href"><img class="img-thumbnail mx-auto" src={{$user->movies_2_image_path}} style="height: 350px; width: 250px;"></a>
                    </div>
                    <div class="card">
                        <h4 class="card-title" style="color: #AB7C45;"><i class="fas fa-crown"></i>3位:{{$user->movies_3_title}}</h4>
                        <a href="/detail" class="href"><img class="img-thumbnail mx-auto" src={{$user->movies_3_image_path}} style="height: 350px; width: 250px;"></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- おすすめ表示 --}}
    <div class="container pt-3 px-3">
        <h5 class="p-1 text-center rounded bg-dark text-white">あなたへのおすすめ</h5>
        <div class="row">
            @for ($i = 0; $i < $count_recommended_movies; $i++)
                <div class="col-md-6 mt-2">
                    <div class="card">
                        <a href="/movie/detail/{{$recommended_movies[$i]->id}}">
                        <img class="card-img-top" src="https://image.tmdb.org/t/p/w500{{$recommended_movies[$i]->image_path}}" alt="Card image cap" style="height: 250px;">
                        </a>
                        <div class="card-footer">
                            <small class="text-muted">{{str_limit($recommended_movies[$i]->title, 50)}}</small>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

@endsection