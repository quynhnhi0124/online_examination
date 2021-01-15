<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.partials.head')
<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    @yield('content')

</div>
@include('admin.partials.main-js')
</body>

</html>