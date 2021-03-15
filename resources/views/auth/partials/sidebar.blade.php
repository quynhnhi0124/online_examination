
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
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#quan-ly-de-thi" aria-expanded="true" aria-controls="quan-ly-de-thi">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Quản lý đề thi</span>
  </a>
  <div id="quan-ly-de-thi" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
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
          @error('subject')
              <strong>{{ $message }}</strong>
          @enderror
        </div>
      </form>
    </div>
  </div>
</li>


<!-- Heading -->
<!-- Nav Item - Pages Collapse Menu -->

@else
    <!-- Nav Item - Thay doi thong tin ca nhan-->
  <li class="nav-item">
    <a class="nav-link" href="{{route ('view-edit' , ['id'=>Auth::user()->id])}}">
      <i class="fas fa-fw fa-cog"></i>
      <span>Thông tin cá nhân </span>
    </a>
  </li>
  <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Môn thi</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      @foreach($subject as $key=>$s)
        <a class="collapse-item" href="{{route('index-exam',$s->id)}}">{{$s->subject}}</a>
      @endforeach
    </div>
  </div>
</li>
@endif
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="{{route('rank')}}">
    <i class="fas fa-fw fa-trophy"></i>
    <span>Xếp hạng</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#thong-ke" aria-expanded="true" aria-controls="thong-ke">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Thống kê</span>
  </a>
  <div id="thong-ke" class="collapse" aria-labelledby="thong-ke" data-parent="#thong-ke">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Thống kê theo:</h6>
      @if(Auth::user()->role==0 || Auth::user()->role == 1)
      <a class="collapse-item" href="{{route('admin.system')}}">Toàn hệ thống</a>
      @else
      <a class="collapse-item" href="{{route('personal',[Auth::user()->id])}}">Cá nhân</a>
      @endif
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>