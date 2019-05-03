@extends('movie.layouts.app')

@section('content')
<h1>ランキングページ</h1>
<div class="container mt-1">
    <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            全ジャンル
        </button>
        <div class="dropdown-menu dropdown-menu-right">

            @foreach ($genres as $genre)
            <button class="dropdown-item" type="button">{{$genre}}</button> 
            @endforeach

        </div>
    </div>
</div>


<div class="container mt-2">
    <div class="card-group">
        <div class="card">
            <h5 class="card-title" style="color: #ADA142;"><i class="fas fa-crown"></i>1位</h5>
            <img class="card-img-top img-thumbnail" src="/img/01.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                  
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #9C9C9C;"><i class="fas fa-crown"></i>2位</h5>
            <img class="card-img-top img-thumbnail" src="/img/02.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #AB7C45;"><i class="fas fa-crown"></i>3位</h5>
            <img class="card-img-top img-thumbnail" src="/img/03.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #646766;">4位</h5>
            <img class="card-img-top img-thumbnail" src="/img/04.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #646766;">5位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
    </div>

    <div class="card-group">
        <div class="card">
            <h5 class="card-title" style="color: #646766;">6位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                  
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #646766;">7位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #646766;">8位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #646766;">9位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #646766;">10位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
    </div>

    <div class="card-group">
        <div class="card">
            <h5 class="card-title" style="color: #646766;">11位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                  
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #646766;">12位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #646766;">13位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #646766;">14位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #646766;">15位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
    </div>
    <div class="card-group">
        <div class="card">
            <h5 class="card-title" style="color: #646766;">16位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                  
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #646766;">17位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #646766;">18位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #646766;">19位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #646766;">20位</h5>
            <img class="card-img-top img-thumbnail" src="/img/05.jpg" alt="Card image cap" style="height: 300px; width: 280px;">
            <div class="card-body">                   
                <p class="card-text">タイトル名</p>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto" style="width: 200px;">
    <nav aria-label="Page navigation example" class="text-center">
        <ul class="pagination">
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
        </ul>
    </nav>
</div>
      

@endsection