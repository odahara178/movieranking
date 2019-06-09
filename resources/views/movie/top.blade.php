@extends('movie.layouts.app')

@section('content')

{{-- 2ジャンル毎にコンテナを作成する --}}
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <table class="table table-dark">
                <thead class="text-center">
                    <tr>
                        <th scope="col"  colspan="3">
                            <a href="/ranking/0">全て</a>
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
                        <a href="/ranking/1">アニメ</a>
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

{{-- 2ジャンル毎にコンテナを作成する --}}
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <table class="table table-dark">
                <thead class="text-center">
                    <tr>
                        <th scope="col"  colspan="3">
                            <a href="/ranking/2">アクション</a>
                        </th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($action_ranks as $action_rank)
                            <tr>
                                <th scope="row" class="text-center">{{$action_rank->rank}}</th>
                                    <td>
                                        <a href="movie/detail/{{$action_rank->id}}">{{str_limit($action_rank->title, 40)}}</a>
                                    </td>
                                <td>{{Config::get('evaluations')[$action_rank->evaluation]}}</td>
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
                        <a href="/ranking/3">ミステリー</a>
                    </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mystery_ranks as $mystery_rank)
                        <tr>
                            <th scope="row" class="text-center">{{$mystery_rank->rank}}</th>
                                <td>
                                    <a href="movie/detail/{{$mystery_rank->id}}">{{str_limit($mystery_rank->title, 40)}}</a>
                                </td>
                            <td>{{Config::get('evaluations')[$mystery_rank->evaluation]}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection