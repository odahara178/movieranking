@extends('movie.layouts.app')

@section('content')
<h1>レビュー投稿ページ</h1>

    <div class="container pb-2">

    <hr>

        @foreach ($reviews as $review)
            <div class="review border-bottom py-3">
                <table>
                    <tr>
                        <th>ユーザー名:〇〇</th>
                        <h4>
                            {{-- ★★★★☆ --}}
                            {{-- @for ($review) --}}
                            {{$review->evaluation}}
                        </h4>
                    </tr>
                    <tr>
                        <td colspan="3">{{$review->content}}</td>
                    </tr>
                </table>
            </div>
        @endforeach


    </div>
          
    <div class="container mt-4">
        {{-- 投稿フォーム --}}
        <div class="posted_form">
            <form class="form" method="post">
                @csrf
                <div class="col-2">
                <input class="btn btn-info text-white mb-2" type="submit" value="レビューする">
                    <select class="form-control" name="evaluation">
                        <option value="1">★</option>
                        <option value="2">★★</option>
                        <option value="3">★★★</option>
                        <option value="4">★★★★</option>
                        <option value="5">★★★★★</option>
                    </select>
                </div>

                <br>

                <textarea class="mt-1" name="content" cols="60" rows="10"></textarea>
            </form>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif








@endsection