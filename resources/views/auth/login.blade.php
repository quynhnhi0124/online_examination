@extends('layouts.app')
<title>Đăng nhập</title>
<style>
    .login-form{
        margin: 150px 190px;
        padding: 2rem 2rem;
    }
    footer{
        bottom: 0;
    }
</style>
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class=" ">
            <div class="col-md-8 card login-form">

                <div class="card-body">
                    <h3 class="text-xs-center">{{ __('Đăng nhập') }}</h3>
                    @if (session('login_message'))
                    @php($messageKey = Session::get('login_message'))
                    <div class="alert alert-{{ $messageKey }} " role="alert">
                        {{ __("message.login.{$messageKey}") }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Tên đăng nhập') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="text-md-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng nhập') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('forgot-password') }}">
                                    {{ __('Quên mật khẩu?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
