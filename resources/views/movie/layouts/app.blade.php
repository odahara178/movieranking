<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MovieRanking</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        {{-- ヘッダー --}}
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        MovieRanking
                    </a>

                    <div class="">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">新規登録</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            ログアウト
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        

        {{-- 検索バー --}}
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="/">TOP</a>
                        </li>                     
                        <li class="nav-item">
                            <a class="nav-link" href="/ranking/0">ランキング</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/mypage">マイページ</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <form class="form-inline" action="/movie/search" method="GET">
                            <div class="form-group">
                            <input type="text" name="keyword" class="form-control">
                                <span class="input-group-btn">
                                    <input class="btn btn-default" type="submit" value="検索">
                                </span>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <div class="container bg-white p-4" style="width: 1375px; height: px;" >
        @yield('content')
    </div>
        

    {{-- フッター --}}
    <footer>
        <nav class="navbar navbar-expand-md navbar-dark pt-1 bg-dark">
            <div class="container">
                <div class="collapse navbar-collapse" id="">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="/">TOP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/ranking/0">ランキング</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/mypage">マイページ</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                    </ul>
                </div>
            </div>
        </nav>
    </footer>

    
</body>
</html>