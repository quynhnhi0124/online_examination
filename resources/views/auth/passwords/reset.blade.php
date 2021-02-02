<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đặt lại mật khẩu</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/admin/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Đặt lại mật khẩu</h1>
                                        <p class="mb-4">Nhập vào mật khẩu mới của bạn: </p>
                                    </div>
                                    @if(!empty($msg))
                                        <section class='alert alert-success'>{{$msg}}</section>
                                        <a class="small" href="{{route('auth.login')}}">Đi đến trang đăng nhập</a>
                                    @else
                                    <form class="user" action="{{route('reset-password', $token)}}"method="POST">
                                    @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-group row">
                                            <label for="password" class="col-form-label">{{ __('Mật khẩu mới') }}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-form-label">{{ __('Nhập lại mật khẩu') }}</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Đặt lại mật khẩu
                                        </button><br>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{route('auth.register')}}">Đăng ký tài khoản</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{route('auth.login')}}">Bạn đã có tài khoản? Đăng nhập tại đây!</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>