@extends('auth.layouts.app')
<title>Thêm câu hỏi</title>
<style>
    .question-list li{
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
                    <div class="list-group-item" style="border:none;">
                        <div class="input-group row">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="question-quantity">Số câu hỏi</label>
                            </div>
                            <input name="question-quantity" class="form-control col-sm-10 ml-auto" id="question-quantity" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Card Example -->
            <form action="#" method="post">
                @csrf
                <div class="card mb-4">
                    <div class="card-body">
                        <!-- <h3>Thêm câu hỏi</h3> -->
                        <ul class="list-group list-group-flush question-list">
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="edit-lastname">Câu hỏi:</label>
                                    <textarea name="lastname" class="form-control col-sm-10 ml-auto" id="edit-lastname" type="text"></textarea>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="edit-username">Đáp án A:</label>
                                    <input name="username" class="form-control col-sm-10 ml-auto" id="edit-username" type="text">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="edit-email">Đáp án B:</label>
                                    <input name="email" class="form-control col-sm-10 ml-auto" id="edit-email" type="text" >
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="edit-mobile">Đáp án C:</label>
                                    <input name="mobile" class="form-control col-sm-10 ml-auto" id="edit-mobile" type="text" >
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <label for="role">Đáp án D:</label>
                                    <input name="role" class="form-control col-sm-10 ml-auto" id="role" type="text">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-cotrol row">
                                    <div class="col-sm-6 mr-auto">
                                        <label for="status">Đáp án:</label>
                                        <input name="status" class="form-control" id="status" type="text">
                                    </div>
                                    <div class="col-sm-6 ml-auto">
                                        <label for="file">Hình ảnh:</label>
                                        <div class="custom-file" id="file">
                                            <label class="custom-file-label" for="img-file">Choose file</label>
                                            <input type="file" class="custom-file-input" id="img-file">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item ml-auto">
                                <button class="btn btn-primary btn-icon-split" type="submit">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Chỉnh sửa</span>
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