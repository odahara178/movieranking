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
                        <a href="">アクション</a>
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row" class="text-center">1</th>
                    <td>
                        <a href="">キングスマン</a>
                    </td>
                    <td>★★★★★</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center">2</th>
                    <td>
                        <a href="">ミッション:インポッシブル/ローグ・ネイション(...表示)</a>
                    </td>
                    <td>★★★★☆</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center">3</th>
                    <td>
                        <a href="">ダイ・ハード</a>
                    </td>
                    <td>★★★☆☆</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-dark">
                <thead class="text-center">
                    <tr>
                    <th scope="col"  colspan="3">
                        <a href="">ミステリー</a>
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row" class="text-center">1</th>
                    <td>
                        <a href="">セブン</a>
                    </td>
                    <td>★★★★★</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center">2</th>
                    <td>
                        <a href="">ユージュアル・サスぺクツ</a>
                    </td>
                    <td>★★★★☆</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center">3</th>
                    <td>
                        <a href="">容疑者Xの献身</a>
                    </td>
                    <td>★★★☆☆</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>






</div>

@endsection