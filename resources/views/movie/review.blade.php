@extends('movie.layouts.app')

@section('content')
<h1>レビュー投稿ページ</h1>


    <div class="container">

    
        <div class="bbs">
                <table>
                    <tr>
                        <th>/th>
                        <th style="color: #009900;"></th>
                        <th>：</th>
                    </tr>
                    <tr>
                        <td colspan="3"></td>                      
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                </table>
        </div>
            
    {{-- 投稿フォーム --}}
        <div class="posted_form">
            <form class="form" method="post">
                @csrf
                <input type="submit" value="投稿する">
                名前：<input name="name">
                <br>
                <textarea name="content" cols="60" rows="10"></textarea>
            </form>
        </div>
    </div>








@endsection