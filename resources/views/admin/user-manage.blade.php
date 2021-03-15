@extends('auth.layouts.app')
<title>Quản lý người dùng</title>
<style>
    /* td input[type=radio] {
        display:block;
    } */
</style>
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý người dùng</h1>
    <p class="mb-4">Gán quyền, kích hoạt hoặc vô hiệu hóa người dùng</p>
    @if (session('notification'))
    @php($messageKey = Session::get('notification'))
    <div class="alert alert-{{ $messageKey }} " role="alert">
        {{ __("message.edit-user.{$messageKey}") }}
    </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row" style="padding: 0 1rem">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng hệ thống</h6>
                <a href="{{route('admin.user-export')}}" class="btn btn-primary ml-auto btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fa fa-download" aria-hidden="true"></i>
                    </span>
                    <span class="text">Xuất ra</span>
                </a>&nbsp&nbsp
                <form class="d-none d-sm-inline-block form-inline my-2 my-md-0 mw-100 navbar-search" action ="{{route('admin.user-manage.rank-search')}}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control border-0 small" placeholder="Tìm kiếm.." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 45px;">STT</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 233px;">Username</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 143px;">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 95px;">Quyền</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 200px;">Trạng thái</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 138px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0 ?>
                                        @foreach($users as $key => $user)
                                        <form action="{{route('admin.user-manage.edit-user', $user->id)}}" method="POST">
                                        @csrf
                                        <tr>
                                            <td scope="row" class="text-md-center">{{$users->firstItem() + $key }}</td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->email}}</td>
                                            
                                            <td>
                                                <input type="radio" name="role" id="superadmin" value="0" {{ ($user->role == 0) ? 'checked' : '' }}>&nbsp Superadmin <br>
                                                <input type="radio" name="role" id="admin" value="1" {{ ($user->role == 1) ? 'checked' : '' }}>&nbsp Admin <br>
                                                <input type="radio" name="role" id="user" value="2" {{ ($user->role == 2) ? 'checked' : '' }}>&nbsp Người dùng <br>
                                            </td>
                                            <td>
                                                <input type="radio" name="status" id="active" value="1" {{ ($user->status == 1) ? 'checked' : '' }}>&nbsp Kích hoạt <br>
                                                <input type="radio" name="status" id="ban" value="0" {{ ($user->status == 0) ? 'checked' : '' }}>&nbsp Vô hiệu hóa <br>
                                            </td>
                                            <td class="text-md-center"><button class="btn btn-primary" type="submit">Thay đổi</button></td>
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