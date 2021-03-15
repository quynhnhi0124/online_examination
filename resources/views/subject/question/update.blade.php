@extends('auth.layouts.app')
<title>Sửa câu hỏi</title>
<style>
    #add-question{
        display:none;
        border:none !important;
    }
    .question-list li {
        border:none;
    }

</style>
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-9">
            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{route('admin.subject.update-question',[$subject_id,$category_id,$id])}}" method="post">
                        @csrf
                        <h3>Chỉnh sửa câu hỏi</h3>
                        <ul class="list-group list-group-flush question-list">
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="edit-lastname">Câu hỏi:</label>
                                    <textarea name="question" class="form-control col-sm-10 ml-auto" id="edit-lastname" type="text">{{$question->question}}</textarea>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="edit-username">Đáp án A:</label>
                                    <input name="option_a" class="form-control col-sm-10 ml-auto" id="edit-username" type="text" value="{{$question->option_a}}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="edit-email">Đáp án B:</label>
                                    <input name="option_b" class="form-control col-sm-10 ml-auto" id="edit-email" type="text" value="{{$question->option_b}}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="edit-mobile">Đáp án C:</label>
                                    <input name="option_c" class="form-control col-sm-10 ml-auto" id="edit-mobile" type="text" value="{{$question->option_c}}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="role">Đáp án D:</label>
                                    <input name="option_d" class="form-control col-sm-10 ml-auto" id="role" type="text" value="{{$question->option_d}}">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="answer">Đáp án:</label>
                                    <div id="answer" class="col-sm-10 ml-auto">
                                        <input type="radio" name="answer" value="A" {{ ($question->answer == "A") ? 'checked' : '' }}>&nbsp A: {{$question->option_a}} <br>
                                        <input type="radio" name="answer" value="B" {{ ($question->answer == "B") ? 'checked' : '' }}>&nbsp B: {{$question->option_b}} <br>
                                        <input type="radio" name="answer" value="C" {{ ($question->answer == "C") ? 'checked' : '' }}>&nbsp C: {{$question->option_c}} <br>
                                        <input type="radio" name="answer" value="D" {{ ($question->answer == "D") ? 'checked' : '' }}>&nbsp D: {{$question->option_d}} <br>
                                    </div>        
                                </div>
                            </li>
                            <div class="list-group-item">
                                <div class="row">
                                    <label for="file">Hình ảnh:</label>
                                    <div class="custom-file" id="file">
                                        <label class="custom-file-label" for="img-file">Choose file</label>
                                        <input type="file" name="image" class="custom-file-input" id="img-file">
                                    </div>
                                </div>
                            </div>
                            <li class="list-group-item ml-auto">
                                <button class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text"><a href="{{route('admin.subject.index-question',[$subject_id,$category_id])}}">Hủy</a></span>
                                </button>
                                <button class="btn btn-primary btn-icon-split" type="submit">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Chỉnh sửa</span>
                                </button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection