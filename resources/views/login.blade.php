<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ログイン</title>
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    </head>
    <body>
        <header>

        </header>
        <main>
            <h1 class="page-title">ログイン</h1>
            <form method="POST" action="{{ route('login_login') }}">
                @csrf
            <div class="table">
                <table>
                    <tr>
                        <td class="form-label">メールアドレス（ID）</td>
                        <td class="form-item-input"><input class="email" type="text" name="email" value="{{ old('email') }}"></td>
                    </tr>
                    <tr>
                        <td class="form-label">パスワード</td>
                        <td class="form-item-input"><input class="password" type="password" name="password"></td>
                    </tr>
                    @if (isset($login_error))
                    <tr>
                        <td></td>
                        <td>
                        <div id="error_explanation" class="error">
                        <ul>
                        <li>メールアドレスまたはパスワードが一致しません。</li>
                        </ul>
                        </div>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td class="form-label"></td>
                        <td class="form-item-input"><a href="#">パスワードを忘れた方はこちら</a></td>
                    </tr>
                </table>
            </div>
            <div class="button">
            <input class="btn confirm" type="submit" value="ログイン">
            </div>
            <div class="button">
                <a class="btn former" href="{{ route('top') }}">トップへ戻る</a>
            </div>
            </form> 
        </main>
    </body>
</html>
