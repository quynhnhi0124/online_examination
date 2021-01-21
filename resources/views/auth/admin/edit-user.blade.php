@extends('auth.admin.layouts.app')
<title>Chỉnh sửa thông tin</title>
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-9">
            <!-- Default Card Example -->
            @foreach($users as $user)
            <form action="{{route ('admin.user-manage.edit-info', [$user->id]) }}" method="post">
                @csrf
                <div class="card mb-4">
                    <div class="card-body">
                        <h3>Chỉnh sửa thông tin</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                    Tham gia vào ngày: {{$user->created_at}}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="edit-firstname">Họ:</label>
                                    <input name="edit-firstname" class="form-control col-sm-10 ml-auto" id="edit-firstname" type="text" value="{{$user->firstname}}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="edit-lastname">Tên:</label>
                                    <input name="edit-lastname" class="form-control col-sm-10 ml-auto" id="lastname" type="text" value="{{$user->lastname}}">
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
                                    <input name="edit-email" class="form-control col-sm-10 ml-auto" id="edit-email" type="text" value="{{$user->email}}">
                                </div>
                            </li>
                            @if(Auth::user()->role == 0)
                            <li class="list-group-item">
                                <div class="row">
                                    <label for="edit-role">Quyền:</label>
                                    @if($user->role == 0)
                                        <select name="edit-role" id="edit-role" class="custom-select form-control col-sm-10 ml-auto" disabled>
                                            <option value="0" selected>Superadmin</option>
                                        </select>
                                    @elseif($user->role == 1)
                                        <select name="edit-role" id="edit-role" class="custom-select form-control col-sm-10 ml-auto">
                                            <option value="1" selected>Admin</option>
                                            <option value="2">Người dùng</option>
                                        </select>
                                    @elseif($user->role == 2)
                                        <select name="edit-role" id="edit-role" class="custom-select form-control col-sm-10 ml-auto">
                                            <option value="2" selected>Người dùng</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    @endif
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <label for="edit-status">Trạng thái:</label>
                                    @if($user->role == 0)
                                        <select name="edit-status" id="edit-status" class="custom-select form-control col-sm-10 ml-auto" disabled>
                                            <option value="1" selected>Kích hoạt</option>
                                        </select>
                                    @elseif($user->role == 1)
                                        <select name="edit-status" id="edit-status" class="custom-select form-control col-sm-10 ml-auto">
                                            @if($user->status == 1)
                                            <option value="1" selected>Kích hoạt</option>
                                            <option value="0">Vô hiệu hóa</option>
                                            @else
                                            <option value="0" selected>Vô hiệu hóa</option>
                                            <option value="1">Kích hoạt</option>
                                            @endif
                                        </select>
                                    @elseif($user->role == 2)
                                        <select name="edit-status" id="edit-status" class="custom-select form-control col-sm-10 ml-auto">
                                            <option value="2" selected>Người dùng</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    @endif
                                </div>
                            </li>
                            @elseif(Auth::user()->role == 1)
                            <li class="list-group-item">
                                <div class="row">
                                    <label for="edit-role">Quyền:</label>
                                    @if($user->role == 0)
                                        <select name="edit-role" id="edit-role" class="custom-select form-control col-sm-10 ml-auto" disabled>
                                            <option value="0" selected>Superadmin</option>
                                        </select>
                                    @elseif($user->role == 1)
                                        <select name="edit-role" id="edit-role" class="custom-select form-control col-sm-10 ml-auto" disabled>
                                            <option value="1" selected>Admin</option>
                                            <option value="2">Người dùng</option>
                                        </select>
                                    @elseif($user->role == 2)
                                        <select name="edit-role" id="edit-role" class="custom-select form-control col-sm-10 ml-auto">
                                            <option value="2" selected>Người dùng</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    @endif
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <label for="edit-status">Trạng thái:</label>
                                    @if($user->role == 0)
                                        <select name="edit-status" id="edit-status" class="custom-select form-control col-sm-10 ml-auto" disabled>
                                            <option value="1" selected>Kích hoạt</option>
                                        </select>
                                    @elseif($user->role == 1)
                                        <select name="edit-status" id="edit-status" class="custom-select form-control col-sm-10 ml-auto" disabled>
                                            @if($user->status == 1)
                                            <option value="1" selected>Kích hoạt</option>
                                            @else
                                            <option value="0" selected>Vô hiệu hóa</option>
                                            @endif
                                        </select>
                                    @elseif($user->role == 2)
                                        <select name="edit-status" id="edit-status" class="custom-select form-control col-sm-10 ml-auto">
                                            @if($user->status == 1)
                                            <option value="1" selected>Kích hoạt</option>
                                            <option value="0">Vô hiệu hóa</option>
                                            @else
                                            <option value="0" selected>Vô hiệu hóa</option>
                                            <option value="1">Kích hoạt</option>
                                            @endif
                                        </select>
                                    @endif
                                </div>
                            </li>
                            @endif
                            <li class="list-group-item ml-auto">
                                <button class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Chỉnh sửa</span>
                                </button>
                                <button class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Hủy</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection