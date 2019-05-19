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
                        <a href="/detail">キングスマン</a>
                    </td>
                    <td>★★★★★</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center d-block">2</th>
                    <td>
                        <a href="" >{{str_limit("ミッション:インポッシブル/ローグ・ネイション", 40)}}</a>
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

    <div class="row">
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
                    <tr>
                    <th scope="row" class="text-center">1</th>
                    <td>
                        <a href="/movie/detail/1">言の葉の庭</a>
                    </td>
                    <td>★★★★★</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center d-block">2</th>
                    <td>
                        <a href="">秒速5センチメートル</a>
                    </td>
                    <td>★★★★☆</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center">3</th>
                    <td>
                        <a href="">時をかける少女</a>
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
                        <a href="">SF</a>
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row" class="text-center">1</th>
                    <td>
                        <a href="">ターミネーター2</a>
                    </td>
                    <td>★★★★★</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center">2</th>
                    <td>
                        <a href="">バック・トゥ・ザ・フューチャーPART2</a>
                    </td>
                    <td>★★★★☆</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center">3</th>
                    <td>
                        <a href="">インターステラー</a>
                    </td>
                    <td>★★★☆☆</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <table class="table table-dark">
                <thead class="text-center">
                    <tr>
                    <th scope="col"  colspan="3">
                        <a href="">サスペンス</a>
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row" class="text-center">1</th>
                    <td>
                        <a href="#">真実の行方</a>
                    </td>
                    <td>★★★★★</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center d-block">2</th>
                    <td>
                        <a href="#">エンゼル・ハート</a>
                    </td>
                    <td>★★★★☆</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center">3</th>
                    <td>
                        <a href="#">シックス・センス</a>
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
                        <a href="#">ファンタジー</a>
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row" class="text-center">1</th>
                    <td>
                        <a href="#">ロード・オブ・ザ・リング　王の帰還</a>
                    </td>
                    <td>★★★★★</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center">2</th>
                    <td>
                        <a href="#">美女と野獣（2017）</a>
                    </td>
                    <td>★★★★☆</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center">3</th>
                    <td>
                        <a href="#">ハリー・ポッターと賢者の石</a>
                    </td>
                    <td>★★★☆☆</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <table class="table table-dark">
                <thead class="text-center">
                    <tr>
                    <th scope="col"  colspan="3">
                        <a href="">ドラマ</a>
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row" class="text-center">1</th>
                    <td>
                        <a href="#">たった一度の歌</a>
                    </td>
                    <td>★★★★★</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center d-block">2</th>
                    <td>
                        <a href="#">ボヘミアン・ラプソディ</a>
                    </td>
                    <td>★★★★☆</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center">3</th>
                    <td>
                        <a href="#">ショーシャンクの空に</a>
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
                        <a href="#">恋愛</a>
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row" class="text-center">1</th>
                    <td>
                        <a href="#">ちはやふる　上の句</a>
                    </td>
                    <td>★★★★★</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center">2</th>
                    <td>
                        <a href="#">Love Letter</a>
                    </td>
                    <td>★★★★☆</td>
                    </tr>
                    <tr>
                    <th scope="row" class="text-center">3</th>
                    <td>
                        <a href="#">いま、会いにゆきます</a>
                    </td>
                    <td>★★★☆☆</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>






</div>

@endsection