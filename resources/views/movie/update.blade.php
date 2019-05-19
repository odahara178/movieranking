@extends('movie.layouts.app')

@section('content')
<h1>ランキング更新ページ</h1>

<div class="container">
    

        
            
    

    <div class="card-deck"> 
        <div class="card">
                <h5 class="card-title" style="color: #ADA142;"><i class="fas fa-crown"></i>1位</h5>
            <a href="/detail" class="href"><img class="card-img-top img-thumbnail" src="/img/01.jpg" style="height: 450px;"></a>

            <div class="card-body text-center">
            <a href="#" class="btn btn-primary pt-1 btn-lg" data-toggle="modal" data-target="#modal1">変更</a>
            </div>

        </div>           
        <div class="card">
            <h5 class="card-title" style="color: #9C9C9C;"><i class="fas fa-crown"></i>2位</h5>
            <a href="/detail" class="href"><img class="card-img-top img-thumbnail" src="/img/02.jpg" style="height: 450px;"></a>
            <div class="card-body text-center">
                <a href="#" class="btn btn-primary pt-1 btn-lg" data-toggle="modal" data-target="#modal1">変更</a>
            </div>
        </div>
        <div class="card">
            <h5 class="card-title" style="color: #AB7C45;"><i class="fas fa-crown"></i>3位</h5>
            <a href="/detail" class="href"><img class="card-img-top img-thumbnail" src="/img/03.jpg" style="height: 450px;"></a>
            <div class="card-body text-center">
                <a href="#" class="btn btn-primary pt-1 btn-lg" data-toggle="modal" data-target="#modal1">変更</a>
            </div>
        </div>
    </div>
        
        
</div>



<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="label1">ランキング更新</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="list-group" style="max-width: 200px;">
                        @foreach ($favorites as $favorite)
                            <button type="button" class="list-group-item list-group-item-action">{{$favorite->title}}</button>
                        @endforeach
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                <button type="button" class="btn btn-primary">適応する</button>
            </div>
        </div>
    </div>
</div>









@endsection