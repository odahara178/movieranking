@extends('movie.layouts.app')

@section('content')
<h1>TOPページ</h1>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <table class="table table-dark">
                <thead class="text-center">
                    <tr>
                        <th scope="col"  colspan="3">
                            <a href="">全て</a>
                        </th>
                    </tr>
                </thead>
                    <tbody>

                        @foreach ($all_ranks as $all_rank)
                            <tr>
                                <th scope="row" class="text-center">{{$all_rank->rank}}</th>
                                    <td>
                                        <a href="movie/detail/{{$all_rank->id}}">{{str_limit($all_rank->title, 40)}}</a>
                                    </td>
                                <td>{{Config::get('evaluations')[$all_rank->evaluation]}}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        <div class="col-md-6">
            <table class="table table-dark">
                <thead class="text-center">
                    <tr>
                    <th scope="col"  colspan="3">
                        <a href="">アニメ</a>
                    </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($animation_ranks as $animation_rank)
                        <tr>
                            <th scope="row" class="text-center">{{$animation_rank->rank}}</th>
                                <td>
                                    <a href="movie/detail/{{$animation_rank->id}}">{{str_limit($animation_rank->title, 40)}}</a>
                                </td>
                            <td>{{Config::get('evaluations')[$animation_rank->evaluation]}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>







</div>

@endsection