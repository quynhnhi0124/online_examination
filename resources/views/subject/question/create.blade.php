@extends('auth.layouts.app')
<title>Thêm câu hỏi</title>
<style>
    #add-question{
        display: none;
        text-align: end;
        padding: 0 1rem;
    }
    .question-list li {
        border:none;
    }
</style>
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-9">
            <div class="card mb-4">
                <div class="card-body">
                    <h3>Thêm câu hỏi</h3>
                    <div class="list-group-item" style="border:none; padding: 0 1rem;">
                        <div class="input-group row">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="question-quantity">Số câu hỏi</label>
                            </div>
                            <input name="question-quantity" class="form-control col-sm-10 ml-auto" id="question-quantity" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="numberQuestion()">Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{route('admin.subject.create-question',[$subject_id,$category_id])}}" method="post">
                        @csrf
                        <div id="question"></div>
                        <div id="add-question">
                            <hr>
                                <button class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-times"></i>
                                    </span>
                                    <span class="text"><a href="{{url()->previous()}}">Hủy</a></span>
                                </button>&nbsp&nbsp
                                <button class="btn btn-primary btn-icon-split" type="submit">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Thêm câu hỏi</span>
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function numberQuestion()
    {
        var x = document.getElementById('question-quantity').value;
        section = " ";
        for(i = 0; i < x; i++)
        {
            section += 
                        '<ul class="list-group list-group-flush question-list">'+
                            '<li class="list-group-item">'+
                                '<div class="form-cotrol row">'+
                                    '<label for="question-'+(i)+'">Câu hỏi '+(i+1)+':</label>'+
                                    '<textarea name="q['+(i)+'][question]" class="form-control col-sm-10 ml-auto" id="question-'+(i)+'" type="text"></textarea>'+
                                '</div>'+
                            '</li>'+
                            '<li class="list-group-item">'+
                                '<div class="form-cotrol row">'+
                                    '<div class="col-sm-6 mr-auto">'+
                                        '<label for="option-a-question-'+(i)+'">Đáp án A:</label>'+
                                        '<input name="q['+(i)+'][option_a]" class="form-control" id="option-a-question-'+(i)+'" type="text">'+
                                    '</div>'+
                                    '<div class="col-sm-6 ml-auto">'+
                                        '<label for="option-b-question-'+(i)+'">Đáp án B:</label>'+
                                        '<input name="q['+(i)+'][option_b]" class="form-control" id="option-b-question-'+(i)+'" type="text">'+
                                    '</div>'+
                                '</div>'+
                            '</li>'+
                            '<li class="list-group-item">'+
                                '<div class="form-cotrol row">'+
                                    '<div class="col-sm-6 mr-auto">'+
                                        '<label for="option-c-question-'+(i)+'">Đáp án C:</label>'+
                                        '<input name="q['+(i)+'][option_c]" class="form-control" id="option-c-question-'+(i)+'" type="text">'+
                                    '</div>'+
                                    '<div class="col-sm-6 ml-auto">'+
                                        '<label for="option-d-question-'+(i)+'">Đáp án D:</label>'+
                                        '<input name="q['+(i)+'][option_d]" class="form-control" id="option-d-question-'+(i)+'" type="text">'+
                                    '</div>'+
                                '</div>'+
                            '</li>'+
                            '<li class="list-group-item">'+
                                '<div class="form-cotrol row">'+
                                    '<div class="col-sm-6 mr-auto">'+
                                        '<label for="answer-question-'+(i)+'">Đáp án:</label>'+
                                        '<select name="q['+(i)+'][answer]" class="custom-select" id="answer-question-'+(i)+'">'+
                                            '<option selected>Chọn đáp án...</option>'+
                                            '<option value="A">A</option>'+
                                            '<option value="B">B</option>'+
                                            '<option value="C">C</option>'+
                                            '<option value="D">D</option>'+
                                        '</select>'+
                                    '</div>'+
                                    '<div class="col-sm-6 ml-auto">'+
                                        '<label for="img-file-question-'+(i)+'">Hình ảnh:</label>'+
                                        '<div class="custom-file" id="img-file-question-'+(i)+'">'+
                                            '<label class="custom-file-label" for="img-file-'+(i)+'">Choose file</label>'+
                                            '<input name="q['+(i)+'][image]" type="file" class="custom-file-input" id="img-file-'+(i)+'">'+'</div>'+
                                    '</div>'+
                                '</div>'+
                            '</li>'+
                        '</ul>';
        }

        document.getElementById("question").innerHTML = section;
        document.getElementById("add-question").style.display = "block";
    }


</script>
@endsection