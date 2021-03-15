@extends('auth.layouts.app')
<title>Xếp hạng</title>
<style>
    .card {
        margin: 1.5rem;
        padding: 0 !important;
    }
</style>
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bảng xếp hạng</h1>
    <p class="mb-4">Xếp hạng theo toàn hệ thống và theo kết quả bài thi của từng môn thi</p>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-system" data-toggle="pill" href="#pill-system" role="tab" aria-controls="pill-system" aria-selected="true">Toàn hệ thống</a>
        </li>
        @foreach($subject as $key=>$s)
        <li class="nav-item">
            <a class="nav-link " id="pills-{{$s->id}}" href="{{route('rank-subject',$s->id)}}" role="tab">{{$s->subject}}</a>
        </li>
        @endforeach
    </ul>
    <div class="tab-content" id="pills-tab">
        <div class="tab-pane fade show active" id="pills-system" role="tabpanel" aria-labelledby="pills-system">
            <div class="container">
                <div class="row justify-content-between top-3">
                    <!-- @foreach($data as $key=>$rank)
                    <div class="card border-primary col-lg-3 col-md-6">
                        <div class="card-header">
                            <i class="fas fa-fw fa-trophy"></i>
                            &nbsp#{{$data->firstItem() + $key}}: {{$rank->username}}
                        </div>
                        <div class="card-body text-primary">
                            <p class="card-text">Số bài thi đã thực hiện: {{$rank->number}}</p>
                            <p class="card-text">Điểm trung bình: {{number_format($rank->score, 2)}}</p>
                        </div>
                    </div>
                    @endforeach -->
                </div>
                <div class="card shadow mb-4">
                    <div class="card header py-3">
                        <div class="row" style="margin:0; padding:0 1rem;">
                            <h6 class="m-0 font-weight-bold text-primary">Bảng xếp hạng toàn hệ thống</h6>
                        </div>
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
                                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 45px;">Hạng</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 233px;">Username</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 143px;">Số bài thi đã thực hiện</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 138px;">Điểm trung bình</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $key=>$rank)
                                                <tr>
                                                    <td scope="row" class="text-md-center">&nbsp#{{$data->firstItem() + $key}}</td>
                                                    <td>{{$rank->username}}</td>
                                                    <td class="text-md-center">{{$rank->number}}</td>
                                                    <td class="text-md-center">{{number_format($rank->score, 2)}}</td>
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
        <!-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div> -->
    </div>

</div>
@endsection