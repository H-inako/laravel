@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="page-title">ログイン</h1>

                <div class="table">
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <table>
                    <tr>
                        <div class="form-group row">
                            <td class="form-label">{{ __('メールアドレス（ID）') }}</td>

                            <td class="form-item-input">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            </td>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group row">
                            <td class="form-label">{{ __('パスワード') }}</td>

                            <td class="form-item-input">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </td>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('パスワードを忘れた方はこちら') }}
                        </a>
                        @endif
                        </td>
                    </tr>
                        </table>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <div class="bottun">
                                    <input class="btn confirm" type="submit" value="ログイン">
                                </div>

                                <div class="bottun">
                                    <a class="btn former" href="{{ route('top') }}">トップへ戻る</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
