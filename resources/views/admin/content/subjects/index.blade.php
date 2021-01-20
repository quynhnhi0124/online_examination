@extends('admin.layouts.sbadmin')
@section('title')
    Quản trị môn học
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Môn học</h6>
        </div>
        <div class="card-body">
            <div>
                <a href="{{ route('admin.subject.create')}}" class="btn btn-success">Thêm môn học</a>
                <select class="btn btn-success" id="action" name="action">
                    <option value="import">Import</option>
                    <option value="export">Export</option>
                </select>
            </div>
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length">
                                <label>Show entries </label>
                                <select name="dataTable_length" aria-controls="dataTable"
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search"
                                                                                                      class="form-control form-control-sm"
                                                                                                      placeholder=""
                                                                                                      aria-controls="dataTable"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                   role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 50px;">#
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending" style="width: 80px;">
                                        <input type="checkbox" style="float: none;display: block; margin: auto;">
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending" style="width: 150px;">
                                        Môn học
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Salary: activate to sort column ascending" style="width: 100px;">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($subjects as $subject)
                                    <tr role="row">
                                        <td>{{ $subject->id }}</td>
                                        <td>{{ $subject->subject }}</td>
                                        <td>
                                            <a href="{{ route('admin.subject.edit', $subject->id)}}"
                                               class="btn btn-warning">Sửa</a>
                                            <a href="{{ route('admin.subject.delete', $subject->id) }}"
                                               class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
