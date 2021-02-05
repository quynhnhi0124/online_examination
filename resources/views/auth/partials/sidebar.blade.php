
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route ('admin.user-manage.user-manage')}}">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">@if(Auth::user()->role == 0 || Auth::user()->role == 1)Admin 
                                        @else Trang cá nhân
                                        @endif</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Trang welcome-->
<li class="nav-item">
  <a class="nav-link" href="{{route ('welcome')}}">
    <i class="fas fa-fw fa-cog"></i>
    <span>Trang chủ </span>
  </a>
</li>

<!-- Nav Item - Dashboard quản lý người dùng cho superadmin va admin-->
@if(Auth::user()->role == 0 || Auth::user()->role == 1)
<li class="nav-item active">
  <a class="nav-link" href="{{route ('admin.user-manage.user-manage')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Quản lý người dùng</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->

<!-- Nav Item - Thay doi thong tin ca nhan-->
<li class="nav-item">
  <a class="nav-link" href="{{route ('view-edit' , ['id'=>Auth::user()->id])}}">
    <i class="fas fa-fw fa-cog"></i>
    <span>Thông tin cá nhân </span>
  </a>
</li>

<!-- Nav Item - Quản lý đề thi -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Quản lý đề thi</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Các môn thi:</h6>
      @foreach($subject as $key=>$s)
      <a class="collapse-item" href="{{route('admin.subject.index-subject',$s->id)}}">{{$s->subject}}</a>
      @endforeach
      <form action="{{route('admin.subject.create-subject')}}" method="post">
        @csrf
        <div class="form-group add-subject">
          <input type="text" class="form-control" name="subject" placeholder="Thêm môn thi..">
          <button class="btn add-btn btn-link"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>
      </form>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Pages</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Login Screens:</h6>
      <a class="collapse-item" href="login.html">Login</a>
      <a class="collapse-item" href="register.html">Register</a>
      <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
      <div class="collapse-divider"></div>
      <h6 class="collapse-header">Other Pages:</h6>
      <a class="collapse-item" href="404.html">404 Page</a>
      <a class="collapse-item" href="blank.html">Blank Page</a>
    </div>
  </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="charts.html">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Thống kê</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="tables.html">
    <i class="fas fa-fw fa-table"></i>
    <span>Danh sách</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
@else
    <!-- Nav Item - Thay doi thong tin ca nhan-->
  <li class="nav-item">
    <a class="nav-link" href="{{route ('view-edit' , ['id'=>Auth::user()->id])}}">
      <i class="fas fa-fw fa-cog"></i>
      <span>Thông tin cá nhân </span>
    </a>
  </li>
@endif



</ul>