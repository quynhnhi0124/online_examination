@extends('auth.layouts.app')
<title>Thống kê cá nhân</title>
<style>
    .personal-chart .personal,.attempt {
        margin: 3rem 0;
    }
</style>
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thống kê của cá nhân</h1>
    <p class="mb-4">Về điểm số và các hoạt động của tài khoản</p>

    <div class="personal-chart">
        <div class="personal">    
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Khoảng điểm số cá nhân</h3>
                </div>
                <div class="row justify-content-center panel-body">
                    <div class="chart" id="personal">
                    </div>
                </div>
            </div>    
        </div> 
        <div class="attempt">    
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Thống kê cá nhân: Số bài thi đã thực hiện, điểm số</h3>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row" style="margin:0; padding:0 1rem;">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách đề thi</h6>
                            <form action="{{route('personal-export')}}" method="GET">
                                <button class="btn btn-primary btn-icon-split ml-auto">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </span>
                                    <span class="text">Tải về </span>
                                </buttom>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 60px;">STT</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 233px;">Đề thi</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 143px;">Số lần thực hiện</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 143px;">Điểm số nhỏ nhất</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 138px;">Điểm số lớn nhất</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($attempts)==0)
                                                    <p>Bạn chưa thực hiện bài thi nào! </p>
                                                @else
                                                    @foreach($attempts as $key=>$attempt)
                                                    <tr>
                                                        <td scope="row" class="text-md-center">{{$key+1}}</td>
                                                        <td>{{$attempt->exam_name}}</td>
                                                        <td class="text-md-center">{{$attempt->attempt}}</td>
                                                        <td class="text-md-center">{{$attempt->min}}</td>
                                                        <td class="text-md-center">{{$attempt->max}}</td>
                                                    </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    {{ $attempts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>    
    </div>
</div>
<script>
google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawPersonal);


    function drawPersonal(){
        var data = new google.visualization.arrayToDataTable(<?php echo $personal; ?>);
        var options = {
            pieHole: 0.4,
            sliceVisibilityThreshold:0,
            width: 650,
            height: 450,
        };
        var chart = new google.visualization.PieChart(document.getElementById('personal'));
        chart.draw(data, options);
    }
</script>
@endsection