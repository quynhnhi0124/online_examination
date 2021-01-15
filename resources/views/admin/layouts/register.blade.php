<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.partials.head')
<body class="bg-gradient-primary">

<div class="container">
    @yield('content')
</div>

@include('admin.partials.main-js')
</html>
