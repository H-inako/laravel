<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>会員情報登録</title>
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    </head>
    <body>
        <header>

        </header>
        <main>
            <h1 class="page-title">会員情報登録</h1>
            <form action="{{ route('regist_post') }}" method="post">
            @csrf
            <div class="table">
                <table>
                    <tr>
                        <td class="form-label">氏名</td>
                        <td class="form-item-input">            
                            <span>姓<input class="name" type="text" name="name_sei" value="{{ old('name_sei') }}"></span>
                            <span>名<input class="name" type="text" name="name_mei" value="{{ old('name_mei') }}"></span>
                        </td>
                    </tr>
                    <tr>
                    <td></td>
                    <td>
                    @error('name_sei')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    @error('name_mei')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    </td>
                    </tr>
                    <tr>
                        <td class="form-label">ニックネーム</td>
                        <td class="form-item-input"><input class="nickname" type="text" name="nickname" value="{{ old('nickname') }}"></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td>
                    @error('nickname')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    </td>
                    </tr>
                    <tr>
                        <td class="form-label">性別</td>
                        <td class="form-item-input">
                            <input type="radio" name="gender" value="1" {{ old ('gender') == '1' ? 'checked' : '' }}> 男性
                            <input type="radio" name="gender" value="2" {{ old ('gender') == '2' ? 'checked' : '' }}> 女性
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        @error('gender')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        </td>
                    <tr>
                        <td class="form-label">パスワード</td>
                        <td class="form-item-input"><input class="password" type="password" name="password" value="{{ old('password') }}"></td>
                    </tr>
                    <tr>
                        <td></td> 
                        <td>
                        @error('password')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        </td>
                    <tr>
                        <td class="form-label">パスワード確認</td>
                        <td class="form-item-input"><input class="password" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>
                            
                        @error('password_confirmation')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        </td>
                    <tr>
                    
                        <td class="form-label">メールアドレス</td>
                        <td class="form-item-input"><input class="email" type="text" name="email" value="{{ old('email') }}"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        @error('email')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        </td>
                </table>
            </div>
            <div class="bottun">
            <input class="btn confirm" type="submit" value="確認画面へ">
            </div>
            </form> 
        </main>
    </body>
</html>
