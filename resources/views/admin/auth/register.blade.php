@extends('admin.layouts.register')

@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form method="POST" action="{{ route('admin.register.store')}}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name"
                                       placeholder="Name">

                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email"
                                       placeholder="Email Address">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user"
                                           id="password"
                                           placeholder="Password">

                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="password_confirmation" class="form-control form-control-user"
                                           id="password_confirmation"
                                           placeholder="Repeat Password">

                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Register account">

                            <hr>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('admin.auth.login') }}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
