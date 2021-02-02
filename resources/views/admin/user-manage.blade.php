@extends('auth.layouts.app')
<title>Quản lý người dùng</title>
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý người dùng</h1>
    <p class="mb-4">Gán quyền, kích hoạt hoặc vô hiệu hóa người dùng</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng hệ thống</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">STT</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 233px;">Username</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 143px;">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 95px;">Quyền</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 180px;">Trạng thái</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 138px;">Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $key => $user)
                                        <form action="{{route('admin.user-manage.edit-user', $user->id)}}" method="POST">
                                        @csrf
                                        <tr>
                                            <td scope="row">{{++$key}}</td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->email}}</td>
                                            
                                            <td>
                                                <input type="radio" name="role" id="role" value="0" {{ ($user->role == 0) ? 'checked' : '' }}>&nbsp Superadmin
                                                <input type="radio" name="role" id="role" value="1" {{ ($user->role == 1) ? 'checked' : '' }}>&nbsp Admin
                                                <input type="radio" name="role" id="role" value="2" {{ ($user->role == 2) ? 'checked' : '' }}>&nbsp Người dùng
                                            </td>
                                            <td>
                                                <input type="radio" name="status" id="status" value="1" {{ ($user->status == 1) ? 'checked' : '' }}>&nbsp Kích hoạt
                                                <input type="radio" name="status" id="status" value="0" {{ ($user->status == 0) ? 'checked' : '' }}>&nbsp Vô hiệu hóa
                                            </td>
                                            <td><button class="btn btn-primary" type="submit">Thay đổi</button>
                                            <a href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        </form>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection