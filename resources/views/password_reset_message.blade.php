<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>パスワード再設定</title>
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    </head>
    <body>
        <header>

        </header>
        <main>
            <div class="page-title">
            <p>パスワード再設定の案内メールを送信しました 。<br>
                （ まだパスワード再設定は完了しておりません ）<br>
                届きましたメールに記載されている <br>
                『パスワード再設定URL』 をクリックし、<br>
                パスワードの再設定を完了させてください。</p>
            </div>
                <div class="button">
                    <a class="btn former" href="{{ route('top') }}">トップへ戻る</a>
                </div>
        </main>
    </body>
</html>
