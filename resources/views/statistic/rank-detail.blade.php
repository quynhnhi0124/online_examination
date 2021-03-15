@extends('auth.layouts.app')
<title>Xếp hạng</title>
<style>
    .card {
        margin: 1.5rem;
        padding: 0 !important;
    }

    .list-group-item .row{
        display: flex;
    }
</style>
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bảng xếp hạng theo bài thi mỗi môn</h1>
    <p class="mb-4">Xếp hạng theo toàn hệ thống và theo kết quả bài thi của từng môn thi</p>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="pills-system" href="{{route('rank')}}" role="tab">Toàn hệ thống</a>
        </li>
        @foreach($subject as $key=>$s)
        <li class="nav-item">
            <a class="nav-link {{ $su->id == $s->id? 'active' : '' }}" id="pills-{{$s->id}}" href="{{route('rank-subject', $s->id)}}" role="tab" aria-controls="pill-{{$s->id}}" aria-selected="true">{{$s->subject}}</a>
        </li>
        @endforeach
    </ul>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card header py-3">
                <div class="row" style="margin:0; padding:0 1rem;">
                    <h6 class="m-0 font-weight-bold text-primary">Bảng xếp hạng</h6>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group">
                @if(count($exams) == 0)
                    <li class="list-group-item">Hiện chưa có bài thi!</li>
                @else
                    <li class="list-group-item">
                        <div class="row">
                            <div class="rank col-md-4">
                                <b>Xếp hạng</b>
                            </div>
                            <div class="username col-md-4">
                                <b>Người dùng</b>
                            </div>
                            <div class="score col-md-4">
                                <b>Số điểm</b>
                            </div>
                        </div>
                    </li>
                    @foreach($attempts as $key=>$attempt)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="rank col-md-4">
                                    #{{$key+1}}
                                </div>
                                <div class="username col-md-4">
                                    {{$attempt->username}}
                                </div>
                                <div class="score col-md-4">
                                    {{$attempt->score}}
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
                </ul>
                <div class="row justify-content-center">
                    {{ $attempts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection