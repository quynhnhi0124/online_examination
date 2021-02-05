@extends('auth.layouts.app')
<title>Môn thi {{$subject_category[0]->subject}}</title>
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý đề thi môn {{$subject_category[0]->subject}}</h1>
    <p class="mb-4">Thêm, sửa, xóa, tìm kiếm các chủ đề của câu hỏi</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row" style="margin:0;">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách chủ đề các câu hỏi </h6>
                <a href="{{route('admin.subject.index-category', $subject_category[0]->subject_id)}}" class="btn btn-primary btn-icon-split ml-auto">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </span>
                    <span class="text">Thêm chủ đề </span>
                </a>
            </div>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        @if(session('message'))
                            <section class='alert alert-success'>{{session('message')}}</section>
                        @endif 
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">STT</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 233px;">Chủ đề</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 143px;">Số câu hỏi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 138px;">Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subject_category as $key=>$category)
                                        <tr>
                                            <td scope="row">{{$key++}}</td>
                                            <td>{{$category->subject_category}}</td>
                                            <td>1</td>
                                            <td style="width:30%">
                                            <div class="option">
                                                <button class="btn btn-primary" type="submit">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </span>
                                                    <a href="{{route('admin.subject.index-question',$category->id)}}">
                                                        Thêm câu hỏi
                                                    </a>
                                                </button>&nbsp
                                                <form action="{{route('admin.subject.delete-category', $category->id)}}" method="POST">
                                                @csrf

                                                    <button class="btn btn-danger" type="submit">
                                                        <span class="icon text-white-50">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </span>    
                                                        Xóa chủ đề
                                                    </button>
                                                </form>
                                            </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection