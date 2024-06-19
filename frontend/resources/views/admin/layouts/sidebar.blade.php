<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{asset('ownercss/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Admin</h1>
        {{-- <p>Owner</p> --}}
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"><a href="{{url('admin/dashboard')}}"> <i class="icon-home"></i>Home </a></li>
            <li class="{{ request()->is('admin/order_list') ? 'active' : '' }}">
              <a href="{{url('admin/order_list')}}">
              <i class="icon-grid"></i>Order List</a>
            </li>
            <li class="{{ request()->is('owner/view_category') ? 'active' : '' }}">
              <a href="{{url('admin/view_category')}}">
              <i class="icon-grid"></i>Kategori</a>
            </li>
            
  </nav>