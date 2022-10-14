@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        <!-- 
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        -->
                        </div>
<table>
    <tr>
                        <div class="form-group row">
                            <td class="form-label">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>
                            </td>
                            <td class="form-item-input">
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            </div>
                            </td>
                        </div>
    </tr>
    <tr>

    </tr>
    <td class="form-label"></td>
    <td class="form-item-input">                                
        @error('password')
        <span class="error" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror</td>
    <tr>
                            
                        <div class="form-group row">
                            <td class="form-label">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード確認') }}</label>
                            </td>
                            <td class="form-item-input">
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            </td>
                        </div>
    </tr>
</table>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="bottun">
                                <button type="submit" class="btn confirm">
                                    {{ __('パスワードリセット') }}
                                </button>
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
