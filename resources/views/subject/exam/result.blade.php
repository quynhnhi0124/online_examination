@extends('auth.layouts.app')
<title>Kết quả thi</title>
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kết quả bài thi</h1>
    <p class="mb-4">Bài thi: {{$exam->exam_name}}</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card header py-3">
            <div class="row" style="margin:0; padding:0 1rem;">
                <h6 class="m-0 font-weight-bold text-primary">Môn: {{$s[0]->subject}}</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    @if (session('submit_message'))
                    @php($messageKey = Session::get('submit_message'))
                    <div class="alert alert-{{ $messageKey }} " role="alert">
                        {{ __("message.submit_exam.{$messageKey}") }}
                    </div>
                    @endif
                    <div class="row col-md-9">
                        <div class="col-sm-4" style="padding: 0">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Câu</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Bài làm của bạn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0 ?>
                                        @foreach($choices as $key=>$choice)
                                        <tr>    
                                            <td>{{++$i}}</td>
                                            <td>{{$choice}}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-4" style="padding: 0">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Đáp án</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($answers as $key=>$ans)
                                        <tr>
                                            <td>{{$ans}}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row col">
                        <p>Điểm của bạn: {{number_format($score,2)}}/100</p>
                        <!-- <div class="result-export">
                        <button class="btn btn-primary btn-icon-split ml-auto">
                            <span class="icon text-white-50">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </span>
                            <span class="text">Tải về </span>
                        </buttom>
                        </div>   -->
                        <button class="btn btn-primary btn-icon-split ml-auto">
                            <span class="icon text-white-50">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </span>
                            <a href="{{route('home')}}">Trang chủ</a>                        
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection