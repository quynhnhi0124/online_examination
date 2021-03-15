<!DOCTYPE HTML>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('auth.partials.head')
    <body id="page-top">
        <div class="container-fluid">
        <!-- 404 Error Text -->
            <div class="text-center">
                <div class="error mx-auto" data-text="404">404</div>
                <p class="lead text-gray-800 mb-5">Không tìm thấy trang</p>
                <a href="{{ url()->previous() }}">&larr; Trở về trang trước</a>
            </div>
        </div>
    </body>
</html>