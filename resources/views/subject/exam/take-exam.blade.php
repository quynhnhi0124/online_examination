@extends('auth.layouts.app')
<title>Vào thi: {{$exam->exam_name}}</title>
@section('content')
<div class="icon-bar">
    <div class="col-xs-9">
        <div id="timerToggle" class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Thời gian còn lại: </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="timer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bạn đang làm đề thi: {{$exam->exam_name}}</h1>
    <p class="mb-4">Thời gian làm bài: <span id="time">{{$exam->time}}</span> phút</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card header py-3">
            <div class="row" style="margin:0; padding:0 1rem;">
                <h6 class="m-0 font-weight-bold text-primary">Đề thi này có {{$exam->number_of_questions}} câu hỏi</h6>
                <div class="ml-auto">
                    <h6 class="m-0 font-weight-bold text-primary">Thời gian bắt đầu làm bài: <span id="start-time">{{$time}}</span></h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (session('submit_message'))
            @php($messageKey = Session::get('submit_message'))
            <div class="alert alert-{{ $messageKey }} " role="alert">
                {{ __("message.submit_exam.{$messageKey}") }}
            </div>
            @endif
            <ul class="list-group list-group-flush">
                <form id="take-exam" action="{{route('submit-exam',[auth()->user()->id,$exam->id])}}" method="POST">
                    @csrf
                    @foreach($questions as $key=>$question)
                    <li class="list-group-item">
                        <p class="card-text">Câu {{$key + 1}}: &nbsp{{$question->question}}</p>
                        <span>{{$question->image}}</span>
                        <div class="row">
                            <div class="col-md-6 mr-auto">
                                <input type="radio" name="questions[{{$question->question_id}}]" value="A">&nbspA: &nbsp{{$question->option_a}}<br>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <input type="radio" name="questions[{{$question->question_id}}]" value="C">&nbspC: &nbsp{{$question->option_c}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mr-auto">
                                <input type="radio" name="questions[{{$question->question_id}}]" value="B">&nbspB: &nbsp{{$question->option_b}}<br>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <input type="radio" name="questions[{{$question->question_id}}]" value="D">&nbspD: &nbsp{{$question->option_d}}
                            </div>
                        </div>
                    </li>
                    @endforeach 
                    <div class="row justify-content-end" style="margin: 10px 0;">
                        <button id="submit-exam" class="btn btn-primary btn-icon-split" type="submit">
                            <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Nộp bài</span>
                        </button>
                    </div>
                </form>
            </ul>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var time = $("#time").text();
        var t = time *60;
        var x  = setInterval(function(){
            var min = Math.floor(t/60);
            var sec = t % 60;
            min = min < 10 ? '0' + min : min;
            sec = sec < 10 ? '0' + sec : sec;
            $("#timer").html(min+":"+sec);
            t--;
            if(min == 0 && sec == 0){
            clearInterval(x);
            $("input").prop("disabled",true);
            alert("Hết thời gian làm bài thi, mời bạn nộp bài.");
            }
        }, 1000);

        $('#submit-exam').click(function(event){
            event.preventDefault();
            swal({
                title: 'Bạn muốn nộp bài?',
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Nộp bài",
                cancelButtonText: "Hủy",
            }).then(function(){
                $("#take-exam").submit();
                // $("#take-exam").hide();
            });
            return false;
        });
    });
</script>
@endsection