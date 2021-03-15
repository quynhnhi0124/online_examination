@extends('auth.layouts.app')
<title>Đổi mật khẩu</title>
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-9">
            <!-- Default Card Example -->
            <form action="{{route('change-password', [Auth::user()->id])}}" method="post">
                @csrf
                <div class="card mb-4">
                    <div class="card-body">
                        <h3>Đổi mật khẩu</h3>
                        @if (session('notification'))
                        @php($messageKey = Session::get('notification'))
                        <div class="alert alert-{{ $messageKey }} " role="alert">
                            {{ __("message.change_password.{$messageKey}") }}
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="current-password" class="col-form-label">Mật khẩu hiện tại:</label>
                            <input name="current-password" class="form-control" id="current-password" type="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Mật khẩu mới</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label">Nhập lại mật khẩu</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirm" required>
                            @error('password_confirm')
                            <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-danger btn-cancel btn-block">
                                        <a href="{{ url()->previous() }}">Hủy</a>
                                    </button>
                                </div>       
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Đặt lại mật khẩu
                                    </button> 
                                </div>                     
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection