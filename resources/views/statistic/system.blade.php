@extends('auth.layouts.app')
<title>Thống kê hệ thống</title>
<style>
    .panel {
        margin: 3rem;
    }
    .user-chart, .exam-chart {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thống kê: </h1>
    <p class="mb-4">Sơ bộ về người dùng và bài thi</p>
    <!-- DataTales Example -->
    <div class="row">
    <!-- Users Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Số người dùng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                            <!-- <i class="far fa-user"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Exams Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Số đề thi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$exams}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="user-chart">
        <div class="monthly-user">    
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Số người dùng mới hàng tháng</h3>
                </div>
                <div class="row justify-content-end panel-body">
                    <div class="chart" id="monthly-user">
                    </div>
                </div>
            </div>    
        </div>  
        <div class="user-role">    
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Số người dùng ở từng vị trí</h3>
                </div>
                <div class="row justify-content-end panel-body">
                    <div class="chart" id="user-role">
                    </div>
                </div>
            </div>    
        </div>   
    </div>
    <div class="exam-chart">
        <div class="exam">    
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Tỉ lệ các môn thi được vào thi</h3>
                </div>
                <div class="row justify-content-end panel-body">
                    <div class="chart" id="attempt">
                    </div>
                </div>
            </div>    
        </div>   
    </div>
</div>
<script>
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(userRole);
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawAttempt);
    
    function drawChart() {
        // var stringified = JSON.stringify(analytics);
        // console.log(analytics);
        var data = new google.visualization.arrayToDataTable(<?php echo $u; ?>);
        var options = {
            sliceVisibilityThreshold:0,
            title: 'Số người dùng trong tháng',
            curveType: 'function',
            legend: { position: 'bottom' },
            vAxis: {title: "Số người dùng (tài khoản)"},
            hAxis: {format: '#', title: "Tháng"},
            width: 600,
            height: 450,
        };
        var chart = new google.visualization.LineChart(document.getElementById('monthly-user'));
        chart.draw(data, options);
    }

    function userRole(){
        var data = new google.visualization.arrayToDataTable(<?php echo $r; ?>);
        var options = {
            sliceVisibilityThreshold:0,
            title: 'Số người dùng theo từng vị trí',
            curveType: 'function',
            legend: { position: 'bottom' },
            vAxis: {format:'#', title: "Số người dùng (tài khoản)"},
            hAxis: {format: '#'},
            width: 600,
            height: 450,
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('user-role'));
        chart.draw(data, options);
    }

    function drawAttempt(){
        var data = new google.visualization.arrayToDataTable(<?php echo $a; ?>);
        var options = { 
            pieHole: 0.4,
            sliceVisibilityThreshold:0,
            width: 600,
            height: 450,
        };
        var chart = new google.visualization.PieChart(document.getElementById('attempt'));
        chart.draw(data, options);
    }
</script>
@endsection