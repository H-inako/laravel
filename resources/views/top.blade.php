<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>トップページ</title>
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    </head>
    <body>
        <header>
            <div class="header">
            <div class="hwrapper">
                @auth
                <div class="greet">
                    <?php $user = Auth::user(); ?>{{ $user->name_sei }} {{ $user->name_mei }}様
                </div>
                @endauth
                <ul class=bottun-list>
                    @guest
                <li class="list"><a class="list-btn" href="{{ route('regist_show') }}">新規会員登録</a></li>
                <li class="list"><a class="list-btn" href="{{ route('login') }}">ログイン</a></li>
                @endguest
                @auth
                <li class="list"><a class="list-btn" href="{{ route('logout') }}">ログアウト</a></li>
                @endauth
                </ul> 
            </div>
            </div>
        </header>
        <main>
        </main>
        <footer>
        </footer>
    </body>
</html>