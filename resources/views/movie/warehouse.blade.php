@extends('movie.layouts.app')

@section('content')

<div class="container mt-2">
        <div class="row">
                @foreach ($favorites as $favorite)
            <div class="col-md-3">
                <div class="border-bottom py-3">
                    <div class="card">
                        <h6 class="card-title pt-1" style="color: #646766;">{{str_limit($favorite->title, 25)}}</h6>
                        <a href="/movie/detail/{{$favorite->movie_id}}">
                            <img class="img-thumbnail card-img-bottom" src="https://image.tmdb.org/t/p/w500{{$favorite->image_path}}" alt="Card image cap" style="height: 270px;">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection