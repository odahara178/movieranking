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
        <div class="card">
            <h5 class="card-title text-center pt-1" style="color: #646766;">タイトル名</h5>
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">                  
                <p class="card-text">★★★☆☆</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title text-center pt-1" style="color: #646766;">タイトル名</h5>
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">                   
                <p class="card-text">★★★☆☆</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title text-center pt-1" style="color: #646766;">タイトル名</h5>
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">                   
                <p class="card-text">★★★☆☆</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title text-center pt-1" style="color: #646766;">タイトル名</h5>
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">                   
                <p class="card-text">★★★☆☆</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title text-center pt-1" style="color: #646766;">タイトル名</h5>
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">                   
                <p class="card-text">★★★☆☆</p>
            </div>
        </div>
    </div>
</div>
      














@endsection