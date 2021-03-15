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
            <a class="nav-link {{ $su->id == $s->id? 'active' : '' }}" id="pills-{{$s->id}}" href="{{route('rank-subject',$s->id)}}" role="tab" aria-controls="pill-{{$s->id}}" aria-selected="true">{{$s->subject}}</a>
        </li>
        @endforeach
    </ul>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row" style="padding: 0 1rem">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách các đề thi</h6>
                    <form class="d-none d-sm-inline-block form-inline ml-auto my-2 my-md-0 mw-100 navbar-search" action ="{{route('rank-subject-search',[$su->id])}}" method="GET">
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
                <ul class="list-group">
                @if(count($exams) == 0)
                    <li class="list-group-item">Hiện chưa có bài thi!</li>
                @else
                    @foreach($exams as $key=>$exam)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="subject-name">
                                    {{$exams->firstItem() + $key}}.&nbsp {{$exam->exam_name}}
                                </div>
                                <button type="button" class="btn btn-dark ml-auto"><a href="{{route('rank-detail', [$su->id,$exam->id])}}">Xem bảng xếp hạng</a></button>
                            </div>
                        </li>
                    @endforeach
                @endif
                </ul>
            </div>
            <div class="row justify-content-center">
                {{ $exams->links() }}
            </div>
        </div>
    </div>
</div>
@endsection