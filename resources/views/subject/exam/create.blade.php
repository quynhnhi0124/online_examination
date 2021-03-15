@extends('auth.layouts.app')
<title>Danh sách câu hỏi</title>
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý đề thi môn {{$questions[0]->subject}}</h1>
    <p class="mb-4">Chọn câu hỏi để thêm mới đề thi</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <form action="{{route('admin.subject.create-exam',$subject_id)}}" method="POST">
                @csrf
                <div class="row" style="margin: 10px 0 ;">
                    <label for="exam_name" class="m-0 font-weight-bold text-primary">Tên đề thi: </label>
                    <input name="exam_name" type="text"class="form-control col-sm-8 ml-auto">
                </div>
                <div class="row" style="margin: 10px 0;">
                    <label for="time" class="m-0 font-weight-bold text-primary">Thời gian thi: </label>
                    <select name="time" id="time" class="custom-select col-sm-8 ml-auto">
                        <option value="50">50 phút</option>
                        <option value="60">60 phút</option>
                        <option value="90">90 phút</option>
                    </select>   
                </div>
                <div class="row" style="margin: 10px 0;">
                    <label for="questions" class="m-0 font-weight-bold text-primary">Câu hỏi trong đề thi: </label>
                    <input name="question_id" id="questions" type="text"class="form-control col-sm-8 ml-auto" placeholder="--Chọn các câu hỏi bên dưới--" readonly="true">
                </div>
                <div class="row justify-content-end" style="margin: 10px 0;">
                    <button class="btn btn-primary btn-icon-split" type="submit">
                        <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Thêm</span>
                    </button>
                </div>
            </form>
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
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">Mã câu hỏi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 233px;">Câu hỏi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 143px;">Đáp án</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 138px;">Đáp án đúng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($questions as $question)
                                        <tr>
                                            <td><input type="checkbox" name="question_id" value="{{$question->id}}">&nbsp&nbsp{{$question->id}}</td>
                                            <td>{{$question->question}}</td>
                                            <td>A: &nbsp{{$question->option_a}}<br>
                                                B: &nbsp{{$question->option_b}}<br>
                                                C: &nbsp{{$question->option_c}}<br>
                                                D: &nbsp{{$question->option_d}}<br></td>
                                            <td>{{$question->answer}}</td>
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
</div>
<script>
    $(document).ready(function() {
        var question = [];
        $("input[type=checkbox][name=question_id]").change(function()
        {
            if($(this).is(':checked')){
                question.push($(this).val());
            }
            else{
                var index = question.indexOf($(this).val());
                if( index !== -1){
                    question.splice(index,1);
                }
            }
            $('#questions').val(question.join(", "));
        });
    });
</script>
@endsection