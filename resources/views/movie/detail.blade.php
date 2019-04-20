@extends('movie.layouts.app')

@section('content')
<h1>映画詳細</h1>
{{-- タイトル --}}
<div class="container pt-5">
    <div class="row">
        <div class="col-sm-8">
            <h1 class="">映画タイトル</h1>
        </div>
        <div class="col-sm-4">
            <button type="button" class="btn btn-info" style="color:cornsilk;"><i class="fas fa-heart pr-1"></i>お気に入りに追加</button>
        </div>
    </div>  
</div>

{{-- あらすじ&レビュー --}}
<div class="container mt-2">
    <div class="row">
        <div class="col-sm-4">
            <div class="card" style="height:50%;">
                <img class="card-img-top" src="/img/05.jpg" style="">
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <h6 class="card-header">あらすじ</h6>
                <div class="card-body">
                    <p class="card-text h6">靴職人を目指す高校生のタカオ（秋月孝雄）は、雨の日の1限は授業をサボって、庭園で靴のデザインを考えていた。ある日、タカオはそこで昼間からビールを飲んでいる女性、ユキノ（雪野百香里）に出会う。どこかで会ったかとタカオが尋ねると、ユキノは否定し、万葉集の短歌 「雷神（なるかみ）の 少し響みて さし曇り 雨も降らぬか 君を留めむ」 を言い残して去っていった。</p>
                </div>
            </div>

            <div class="card pt-1">
                <h6 class="card-header">言の葉の庭のレビュー</h6>
                <div class="card-body">
                    <h4 class="card-text text-center border-bottom">★★★★☆</h4>
                    <p class="border-bottom h6">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis temporibus possimus incidunt perferendis voluptates expedita, deserunt enim molestiae nulla? Voluptatem doloribus soluta eveniet libero pariatur nemo expedita repudiandae beatae tempora excepturi totam, unde quaerat vero natus minus, amet molestias minima?</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-secondary">レビューをもっと見る・投稿する</a>
                    </div>              
                </div>
            </div>
        </div>
    </div>

    {{-- 動画表示 --}}
    <div class="container">   
        <div class="row">
            <div class="col-sm-6">
                <h5 class="p-1 text-center rounded" style="background-color:black; color: #FDD200;">関連動画(YouTube)</h5>
                <div class="card-group">
                    <div class="card">
                        <iframe width="auto" height="auto" src="https://www.youtube.com/embed/ZMblEc7KNQA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                    
                    </div>
                    <div class="card">
                        <iframe width="auto" height="auto" src="https://www.youtube.com/embed/udDIkl6z8X0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            {{-- 関連作品表示 --}}
            <div class="col-sm-6">
                    <h5 class="p-1 text-center rounded" style="background-color:black; color: #FDD200;">関連作品</h5>
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
    </div>
</div>
@endsection