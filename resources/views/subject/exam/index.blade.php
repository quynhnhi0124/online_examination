@extends('auth.layouts.app')
<title>Môn thi</title>
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách đề thi</h1>
    <p class="mb-4">Môn thi: @if(count($exams) > 0){{$exams[0]->subject}}@else @endif</p>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="exam" role="tabpanel" aria-labelledby="pills-exam-tab">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card header py-3">
                    <div class="row" style="margin:0; padding:0 1rem;">
                        <h6 class="m-0 font-weight-bold text-primary">Danh sách đề thi</h6>
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
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 90px;">STT</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 400px;">Tên đề thi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 130px;">Số câu hỏi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 150px;">Thời gian làm bài</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 60px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($exams)==0)
                                            <p>Chưa có đề thi nào! </p>
                                        @else
                                            @foreach($exams as $key=>$exam)
                                            <tr>
                                                <td scope="row" class="text-md-center">{{$exams->firstItem() + $key}}</td>
                                                <td>{{$exam->exam_name}}</td>
                                                <td class="text-md-center">{{$exam->number_of_questions}}</td>
                                                <td class="text-md-center">{{$exam->time}}</td>
                                                <td style="width:30%">
                                                <div class="option">
                                                    <form action="{{route('take-exam',[$student,$exam->id])}}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-primary" type="submit">
                                                            <span class="icon text-white-50">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </span>
                                                            Vào thi
                                                        </button>&nbsp
                                                    </form>
                                                </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            {{ $exams->links() }}
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection