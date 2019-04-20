@extends('movie.layouts.app')

@section('content')
<h1>レビュー投稿ページ</h1>

    <div class="container border-bottom pb-2">

    <hr>

        <div class="review">
            <table>
                <tr>
                    <th>ユーザー名</th>
                    <th style="color: #009900;">〇〇</th>
                </tr>
                <tr>
                    <td colspan="3">レビュー内容</td>                      
                </tr>
            </table>
        </div>

    </div>
          
    <div class="container mt-4">

    
        {{-- 投稿フォーム --}}
        <div class="posted_form">
            <form class="form" method="post">
                @csrf
                <input class="btn btn-info" type="submit" value="レビューする">
                名前：<input name="name">
                <br>
                <textarea class="mt-1" name="content" cols="60" rows="10"></textarea>
            </form>
        </div>

    </div>








@endsection