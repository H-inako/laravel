@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div clsss="page-title">
                    <h2>パスワード再設定用の URL を記載したメールを送信します。<br>
                        ご登録されたメールアドレスを入力してください。</h2>
                    </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <table>
                            <tr>
                        <div class="form-group row">
                            <td class="form-label">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
                            </td>
                            <div class="col-md-6">
                            <td class="form-item-input">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </td>
                            </div>
                        </div>
                            </tr>
                            <tr>
                                <td class="form-label"></td>
                                <td class="form-item-input">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <div class="error">{{ $message }}</div>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                        </table>

                        <div class="form-group row mb-0">
                            <div class="bottun">
                                <button type="submit" class="btn confirm">
                                    {{ __('送信する') }}
                                </button>
                            </div>
                            <div class="bottun">
                                <a class="btn former" href="{{ route('top') }}">トップへ戻る</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
