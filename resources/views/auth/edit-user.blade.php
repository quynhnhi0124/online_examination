@extends('auth.layouts.app')
<title>Chỉnh sửa thông tin</title>
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-9">
            <!-- Default Card Example -->
            <form action="{{route ('edit-info', [$user->id]) }}" method="post">
                @csrf
                <div class="card mb-4">
                    <div class="card-body">
                        <h3>Thay đổi thông tin cá nhân</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                    Tham gia vào ngày: {{$user->created_at}}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="edit-firstname">Họ:</label>
                                    <input name="firstname" class="form-control col-sm-10 ml-auto" id="edit-firstname" type="text" value="{{$user->firstname}}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="edit-lastname">Tên:</label>
                                    <input name="lastname" class="form-control col-sm-10 ml-auto" id="edit-lastname" type="text" value="{{$user->lastname}}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="edit-username">Tên đăng nhập:</label>
                                    <input name="username" class="form-control col-sm-10 ml-auto" id="edit-username" type="text" value="{{$user->username}}" disabled>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="edit-email">Email:</label>
                                    <input name="email" class="form-control col-sm-10 ml-auto" id="edit-email" type="text" value="{{$user->email}}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="edit-mobile">Số điện thoại:</label>
                                    <input name="mobile" class="form-control col-sm-10 ml-auto" id="edit-mobile" type="text" value="{{$user->mobile}}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="role">Quyền:</label>
                                    <input name="role" class="form-control col-sm-10 ml-auto" id="role" type="text" value="@if($user->role == 0)Superadmin
                                                                                                                            @elseif($user->role == 1)Admin
                                                                                                                            @elseif($user->role == 2)Người dùng
                                                                                                                            @endif" disabled>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="status">Trạng thái:</label>
                                    <input name="status" class="form-control col-sm-10 ml-auto" id="status" type="text" value="@if($user->status == 1)Kích hoạt
                                                                                                                                @elseif($user->status == 0)Vô hiệu hóa
                                                                                                                                @endif" disabled>
                                </div>
                            </li>
                            <li class="list-group-item ml-auto">
                                <button class="btn btn-primary btn-icon-split" type="submit">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Chỉnh sửa</span>
                                </button>
                                <button class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text"><a href="{{route ('admin.user-manage.user-manage')}}">Hủy</a></span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection