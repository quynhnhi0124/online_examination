@extends('auth.layouts.app')
<title>Môn thi</title>
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý đề thi môn</h1>
    <p class="mb-4">Thêm, sửa, xóa, tìm kiếm các chủ đề của câu hỏi</p>
    @if (session('notification'))
    @php($messageKey = Session::get('notification'))
    <div class="alert alert-{{ $messageKey }} " role="alert">
        {{ __("message.create-exam.{$messageKey}") }}
    </div>
    @endif
    @if (session('delete-message'))
    @php($messageKey = Session::get('delete-message'))
    <div class="alert alert-{{ $messageKey }} " role="alert">
        {{ __("message.delete_exam.{$messageKey}") }}
    </div>
    @endif
    @if (session('create_message'))
    @php($messageKey = Session::get('create_message'))
    <div class="alert alert-{{ $messageKey }} " role="alert">
        {{ __("message.create_category.{$messageKey}") }}
    </div>
    @endif
    @if (session('delete_message'))
    @php($messageKey = Session::get('delete_message'))
    <div class="alert alert-{{ $messageKey }} " role="alert">
        {{ __("message.delete_category.{$messageKey}") }}
    </div>
    @endif
    <div class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <a class="nav-link active" id="pills-exam-tab" data-toggle="pill" href="#exam" role="tab" aria-controls="pills-exam" aria-selected="true">Đề thi</a>
        <a class="nav-link" id="pills-category-tab" data-toggle="pill" href="#category" role="tab" aria-controls="pills-category" aria-selected="false">Các chủ đề</a>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="exam" role="tabpanel" aria-labelledby="pills-exam-tab">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card header py-3">
                    <div class="row" style="margin:0; padding:0 1rem;">
                        <h6 class="m-0 font-weight-bold text-primary">Danh sách đề thi</h6>
                        <a href="{{route('admin.subject.get-exam',[$id])}}" class="btn btn-primary btn-icon-split ml-auto">
                            <span class="icon text-white-50">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </span>
                            <span class="text">Thêm đề thi mới </span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('alert'))
                        <div class="alert alert-{{ Session::get('alert') }} " role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
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
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 60px;">STT</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 233px;">Tên đề thi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 143px;">Số câu hỏi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 138px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($exams)==0)
                                            <p>Chưa có đề thi nào! </p>
                                        @else
                                            @foreach($exams as $key=>$exam)
                                            <tr>
                                                <td scope="row" class="text-md-center">{{$exams->firstItem() + $key}}</td>
                                                <td><a href="#">{{$exam->exam_name}}</a></td>
                                                <td  class="text-md-center">{{$exam->number_of_questions}}</td>
                                                <td style="width:30%">
                                                <div class="option">
                                                    <button class="btn btn-primary" type="submit">
                                                        <span class="icon text-white-50">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </span>
                                                        <a href="#">
                                                            Sửa
                                                        </a>
                                                    </button>&nbsp
                                                    <form action="{{route('admin.subject.delete-exam',$exam->id)}}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit">
                                                            <span class="icon text-white-50">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </span>    
                                                            Xóa đề thi
                                                        </button>
                                                    </form>
                                                </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            {{$exams->links()}}
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="pills-category-tab">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row" style="margin:0;">
                        <h6 class="m-0 font-weight-bold text-primary">Danh sách chủ đề các câu hỏi </h6>
                        <a href="{{route('admin.subject.index-category', [$id])}}" class="btn btn-primary btn-icon-split ml-auto">
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
                                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 60px;">STT</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 233px;">Chủ đề</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 138px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($subject_category as $key=>$category)
                                                <tr>
                                                    <td scope="row" class="text-md-center">{{$subject_category->firstItem() + $key}}</td>
                                                    <td><a href="{{route('admin.subject.index-question',[$category->subject_id,$category->id])}}">{{$category->subject_category}}</a></td>
                                                    <td style="width:30%">
                                                    <div class="option">
                                                        <button class="btn btn-primary" type="submit">
                                                            <span class="icon text-white-50">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </span>
                                                            <a href="{{route('admin.subject.question',[$category->subject_id,$category->id])}}">
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
                                    {{$subject_category->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection