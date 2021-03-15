@extends('auth.layouts.app')
<title>Danh sách câu hỏi</title>
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách câu hỏi</h1>
    <p class="mb-4">Quản lý danh sách câu hỏi</p>
    @if (session('create_message'))
    @php($messageKey = Session::get('create_message'))
    <div class="alert alert-{{ $messageKey }} " role="alert">
        {{ __("message.create_question.{$messageKey}") }}
    </div>
    @endif
    @if (session('update_message'))
    @php($messageKey = Session::get('update_message'))
    <div class="alert alert-{{ $messageKey }} " role="alert">
        {{ __("message.update_question.{$messageKey}") }}
    </div>
    @endif
    @if (session('delete_message'))
    @php($messageKey = Session::get('delete_message'))
    <div class="alert alert-{{ $messageKey }} " role="alert">
        {{ __("message.delete_question.{$messageKey}") }}
    </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row" style="margin:0;">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách các câu hỏi </h6>
                <a href="{{route('admin.subject.create-question', [$subject_id,$category_id])}}" class="btn btn-primary btn-icon-split ml-auto">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </span>
                    <span class="text">Thêm câu hỏi </span>
                </a>
            </div>
        </div>
            <div class="card-body">
                <h6 class="m-0 font-weight-bold text-primary">Số câu hỏi: {{count($questions)}} </h6>
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
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 45px;">STT</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">Chủ đề </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 233px;">Câu hỏi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Hình ảnh</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 200px;">Đáp án </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 100px;">Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($questions as $key=>$question)
                                        <tr>
                                            <td class="text-md-center">{{$questions->firstItem() + $key}}</td>
                                            <td scope="row">{{$question->subject_category}}</td>
                                            <td>{{$question->question}}</td>
                                            <td>{{$question->image}}</td>
                                            <td>
                                                <input type="radio" name="option_a[{{$question->id}}]" value="A" {{ ($question->answer == "A") ? 'checked' : '' }}>&nbsp A. {{$question->option_a}} <br>
                                                <input type="radio" name="option_b[{{$question->id}}]" value="B" {{ ($question->answer == "B") ? 'checked' : '' }}>&nbsp B. {{$question->option_b}} <br>
                                                <input type="radio" name="option_c[{{$question->id}}]" value="C" {{ ($question->answer == "C") ? 'checked' : '' }}>&nbsp C. {{$question->option_c}} <br>
                                                <input type="radio" name="option_d[{{$question->id}}]" value="D" {{ ($question->answer == "D") ? 'checked' : '' }}>&nbsp D. {{$question->option_d}} <br>
                                            </td>
                                            <td style="width:30%">
                                            <div class="option">
                                                <form action="{{route('admin.subject.delete-question',[$subject_id,$category_id,$question->id])}}" method="POST">
                                                @csrf

                                                    <button class="btn btn-danger" type="submit">
                                                        <span class="icon text-white-50">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </span>    
                                                        Xóa câu hỏi
                                                    </button>
                                                </form>&nbsp
                                                <button class="btn btn-primary" type="submit">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </span>
                                                    <a href="{{route('admin.subject.get-update',[$subject_id,$category_id,$question->id])}}">
                                                        Sửa
                                                    </a>
                                                </button>
                                            </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            {{ $questions->links() }}
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection