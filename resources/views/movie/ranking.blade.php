@extends('movie.layouts.app')

@section('content')
<h1>ランキングページ</h1>
<div class="container mt-1">
    <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ジャンル選択
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="btn dropdown-item" href='/ranking/0'>すべて</a>
            <a class="btn dropdown-item" href='/ranking/1'>アニメ</a>
            <a class="btn dropdown-item" href='/ranking/2'>アクション</a>
            <a class="btn dropdown-item" href='/ranking/3'>ミステリー</a>
            <a class="btn dropdown-item" href='/ranking/4'>サスペンス</a>
            <a class="btn dropdown-item" href='/ranking/5'>ホラー</a>
            <a class="btn dropdown-item" href='/ranking/6'>ファンタジー</a>
            <a class="btn dropdown-item" href='/ranking/7'>SF</a>
            <a class="btn dropdown-item" href='/ranking/8'>ドラマ</a>
            <a class="btn dropdown-item" href='/ranking/9'>ドキュメンタリー</a>
            <a class="btn dropdown-item" href='/ranking/10'>戦争</a>
            <a class="btn dropdown-item" href='/ranking/11'>犯罪</a>
            <a class="btn dropdown-item" href='/ranking/12'>コメディ</a>
            <a class="btn dropdown-item" href='/ranking/13'>スポーツ</a>
            <a class="btn dropdown-item" href='/ranking/14'>恋愛</a>
        </div>
    </div>
</div>

<div class="container mt-2">
    <div class="row">
        @foreach ($all_ranks as $all_rank)
            <div class="card col-3">
                <h4 class="card-title mt-2" style="color: #ADA142;"><i class="fas fa-crown"></i>{{$all_rank->rank}}位</h4>
                <a href="/movie/detail/{{$all_rank->movie_id}}">
                    <img class="card-img-top img-thumbnail" src={{$all_rank->image_path}} alt="Card image cap" style="height: 300px; width: 280px;">
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