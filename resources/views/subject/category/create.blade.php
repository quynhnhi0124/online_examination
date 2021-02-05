@extends('auth.layouts.app')
<title>Chỉnh sửa thông tin</title>
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-9">
            <!-- Default Card Example -->
            <form action="{{route('admin.subject.create-category', $subject_category[0]->subject_id)}}" method="post">
                @csrf
                <div class="card mb-4">
                    <div class="card-body">
                        <h3>Thêm mới chủ đề</h3>
                        <p class="mb-4">Môn thi: {{ $subject_category[0]->subject}}</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="subject_category">Tên chủ đề:</label>
                                    <input name="subject_category" class="form-control col-sm-10 ml-auto" id="subject_category" type="text">
                                </div>
                            </li>
                            </li>
                            <li class="list-group-item ml-auto">
                                <button class="btn btn-primary btn-icon-split" type="submit">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Thêm chủ đề</span>
                                </button>
                                <button class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text"><a href="#">Hủy</a></span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection