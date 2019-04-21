@extends('movie.layouts.app')




@section('content')
<h1>マイページ</h1>
{{-- ランキング表示 --}}
    <h2 class="pt-2">MYランキング</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                        <h5 class="card-title" style="color: #ADA142;"><i class="fas fa-crown"></i>1位</h5>
                    <a href="/detail" class="href"><img class="card-img-top mx-auto d-block" src="/img/01.jpg" style="height: 500px; width: 400px;"></a>
                </div>
            </div>

            <div class="col-md-6">
                {{-- ページ遷移ボタン --}}
                <div class="container my-3 d-flex justify-content-around">
                        <a class="btn btn-secondary" href='/warehouse'>お気に入りページ</a>
                        <a class="btn btn-secondary" href='/update'>ランキング更新</a>
                    </div>

                <div class="card-deck">            
                    <div class="card">
                        <h5 class="card-title" style="color: #9C9C9C;"><i class="fas fa-crown"></i>2位</h5>
                        <a href="/detail" class="href"><img class="card-img-top" src="/img/02.jpg" style="height: 350px;"></a>
                    </div>
                    <div class="card">
                        <h5 class="card-title" style="color: #AB7C45;"><i class="fas fa-crown"></i>3位</h5>
                        <a href="/detail" class="href"><img class="card-img-top" src="/img/03.jpg" style="height: 350px;"></a>
                    </div>
                </div>
            </div>


        </div>     
    </div>

    

    {{-- おすすめ表示 --}}
    <div class="container  pt-3 px-3">
        <div class="recommendedForUser">
            <h5 class="p-1 rounded" style="background-color:black; color: #FDD200;"> 　MOVIEランキング　あなたへのおすすめ</h5>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card-group" alt="First slide">
                            <div class="card">
                                <img class="card-img-top" src="/img/01.jpg" alt="Card image cap" style="height: 300px;">
                                <div class="card-footer">
                                    <small class="text-muted">ヴェノム</small>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/02.jpg" alt="Card image cap" style="height: 300px;">
                                <div class="card-footer">
                                    <small class="text-muted">セブン</small>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/03.jpg" alt="Card image cap" style="height: 300px;">
                                <div class="card-footer">
                                    <small class="text-muted">ユージュアル・サスペクツ</small>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/04.jpg" alt="Card image cap" style="height: 300px;">
                                <div class="card-footer">
                                    <small class="text-muted">容疑者Xの献身</small>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/05.jpg" alt="Card image cap" style="height: 300px;">
                                <div class="card-footer">
                                    <small class="text-muted">言の葉の庭</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card-group" alt="Second slide">
                            <div class="card">
                                <img class="card-img-top" src="/img/01.jpg" alt="Card image cap" style="height: 230px;">
                                <div class="card-footer">
                                    <small class="text-muted">ヴェノム</small>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/02.jpg" alt="Card image cap" style="height: 230px;">
                                <div class="card-footer">
                                    <small class="text-muted">セブン</small>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/03.jpg" alt="Card image cap" style="height: 230px;">
                                <div class="card-footer">
                                    <small class="text-muted">ユージュアル・サスペクツ</small>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/04.jpg" alt="Card image cap" style="height: 230px;">
                                <div class="card-footer">
                                    <small class="text-muted">容疑者Xの献身</small>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/05.jpg" alt="Card image cap" style="height: 230px;">
                                <div class="card-footer">
                                    <small class="text-muted">言の葉の庭</small>
                                </div>
                            </div>
                        </div>
                    </div>    

                    <div class="carousel-item">
                        <div class="card-group" alt="Third slide">
                            <div class="card">
                                <img class="card-img-top" src="/img/01.jpg" alt="Card image cap" style="height: 230px;">
                                <div class="card-footer">
                                    <small class="text-muted">ヴェノム</small>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/02.jpg" alt="Card image cap" style="height: 230px;">
                                <div class="card-footer">
                                    <small class="text-muted">セブン</small>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/03.jpg" alt="Card image cap" style="height: 230px;">
                                <div class="card-footer">
                                    <small class="text-muted">ユージュアル・サスペクツ</small>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/04.jpg" alt="Card image cap" style="height: 230px;">
                                <div class="card-footer">
                                    <small class="text-muted">容疑者Xの献身</small>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="/img/05.jpg" alt="Card image cap" style="height: 230px;">
                                <div class="card-footer">
                                    <small class="text-muted">言の葉の庭</small>
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